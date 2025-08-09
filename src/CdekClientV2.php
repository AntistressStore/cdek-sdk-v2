<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2;

use AntistressStore\CdekSDK2\Entity\Requests\Check;
use AntistressStore\CdekSDK2\Entity\Requests\{Agreement,
    Barcode,
    DeliveryPoints,
    Intakes,
    Invoice,
    Location,
    LocationSuggest,
    Order,
    Tariff,
    Webhooks};
use AntistressStore\CdekSDK2\Entity\Responses\{
    AgreementResponse,
    CitiesResponse,
    DeliveryPointsResponse,
    EntityResponse,
    IntakesResponse,
    OrderResponse,
    PrintResponse,
    RegionsResponse,
    TariffListResponse,
    TariffResponse,
    WebhookListResponse
};

use AntistressStore\CdekSDK2\Entity\Responses\{CheckResponse, CitiesSuggestResponse, PaymentResponse, RegistryResponse};

use AntistressStore\CdekSDK2\Exceptions\{CdekV2AuthException, CdekV2RequestException};
use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\StreamInterface;

/**
 * Class CdekClientV2 - клиент взаимодействия с api cdek 2.0.
 */
final class CdekClientV2
{
    /**
     * Аккаунт сервиса интеграции.
     *
     * @var string
     */
    private $account;

    /**
     * Тип аккаунта.
     *
     * @var string
     */
    private $account_type;

    /**
     * Секретный пароль сервиса интеграции.
     *
     * @var string
     */
    private $secure;

    /**
     * Authorization: Bearer Токен.
     *
     * @var string
     */
    private $token;

    /**
     * Настройки массив сохранения.
     *
     * @var array
     */
    private $memory;

    /**
     * Коллбэк сохранения токена.
     *
     * @var callable
     */
    private $memory_save_fu;

    /** @var int */
    private $expire = 0;

    /** @var GuzzleClient */
    private $http;

    /**
     * Конструктор клиента Guzzle.
     *
     * @param $account - Логин Account в сервисе Интеграции
     * @param $secure  - Пароль Secure password в сервисе Интеграции
     * @param $timeout - Настройка клиента задающая общий тайм-аут запроса в секундах. При использовании 0 ждать бесконечно долго (поведение по умолчанию)
     */
    public function __construct(string $account, ?string $secure = null, ?float $timeout = 5.0)
    {
        if ($account == 'TEST') {
            $this->http = new GuzzleClient([
                'base_uri' => Constants::API_URL_TEST,
                'timeout' => $timeout,
                'http_errors' => false,
            ]);
            $this->account = Constants::TEST_ACCOUNT;
            $this->secure = Constants::TEST_SECURE;
            $this->account_type = 'TEST';
        } else {
            $this->http = new GuzzleClient([
                'base_uri' => Constants::API_URL,
                'timeout' => $timeout,
                'http_errors' => false,
            ]);
            $this->account = $account;
            $this->secure = $secure;
            $this->account_type = 'COMBAT';
        }
    }

    /**
     * Выполняет вызов к API.
     *
     * @param string|null $type   - Метод запроса
     * @param string|null $method - url path запроса
     * @param array|null  $params - массив данных параметров запроса
     *
     * @return array|StreamInterface
     *
     * @throws CdekV2RequestException
     */
    private function apiRequest(string $type, string $method, $params = null)
    {
        // Авторизуемся или получаем данные из кэша\сессии
        if ($this->checkSavedToken() == false) {
            $this->authorize();
        }

        // Проверяем является ли запрос на файл pdf
        $is_pdf_file_request = strpos($method, '.pdf');

        if ($is_pdf_file_request !== false) {
            $headers['Accept'] = 'application/pdf';
        } else {
            $headers['Accept'] = 'application/json';
        }

        $headers['Authorization'] = 'Bearer '.$this->token;

        if ( ! empty($params) && is_object($params)) {
            $params = $params->prepareRequest();
        }

        switch ($type) {
            case 'GET':
                $response = $this->http->get($method, ['query' => $params, 'headers' => $headers]);
                break;
            case 'DELETE':
                $response = $this->http->delete($method, ['headers' => $headers]);
                break;
            case 'POST':
                $response = $this->http->post($method, ['json' => $params, 'headers' => $headers]);
                break;
            case 'PATCH':
                $response = $this->http->patch($method, ['json' => $params, 'headers' => $headers]);
                break;
        }
        // Если запрос на файл pdf был успешным, сразу отправляем его в ответ
        if ($is_pdf_file_request) {
            if ($response->getStatusCode() == 200) {
                if (strpos($response->getHeader('Content-Type')[0], 'application/pdf') !== false) {
                    return $response->getBody();
                }
            }
        }
        $json = $response->getBody()->getContents();
        $apiResponse = json_decode($json, true);

        $this->checkErrors($method, $response, $apiResponse);

        return $apiResponse;
    }

    /**
     * Авторизация клиента в сервисе Интеграции.
     *
     * @throws CdekV2AuthException
     */
    private function authorize(): bool
    {
        $param = [
            Constants::AUTH_KEY_TYPE => Constants::AUTH_PARAM_CREDENTIAL,
            Constants::AUTH_KEY_CLIENT_ID => $this->account,
            Constants::AUTH_KEY_SECRET => $this->secure,
        ];
        $headers['Content-Type'] = 'application/x-www-form-urlencoded';

        $response = $this->http->post(
            Constants::OAUTH_URL,
            [
                'form_params' => $param,
                'headers' => $headers,
            ]
        );

        if ($response->getStatusCode() == 200) {
            $token_info = json_decode($response->getBody());
            $this->token = $token_info->access_token ?? '';
            $this->expire = $token_info->expires_in ?? 0;
            $this->expire = (int) (time() + $this->expire - 10);
            if ( ! empty($this->memory_save_fu)) {
                $this->saveToken($this->memory_save_fu);
            }

            return true;
        }
        throw new CdekV2AuthException(Constants::AUTH_FAIL);
    }

    /**
     * Проверяет соответствует ли переданный
     * массив сохраненный данных авторизации требованиям
     *
     * @return string|bool|null
     */
    private function checkSavedToken()
    {
        $check_memory = $this->getMemory();

        // Если не передан верный сохраненный массив данных для авторизации, функция возвратит false

        if ( ! isset($check_memory['account_type'])
        || empty($check_memory)
        || ! isset($check_memory['expires_in'])
        || ! isset($check_memory['access_token'])) {
            return false;
        }

        // Если не передан верный сохраненный массив данных для авторизации,
        // но тип аккаунта не тот, который был при прошлой сохраненной авторизации, функция возвратит false

        if (isset($check_memory['account_type'])) {
            if ($check_memory['account_type'] !== $this->account_type) {
                return false;
            }
        }

        return ($check_memory['expires_in'] > time() && ! empty($check_memory['access_token']))
            ? $this->setToken($check_memory['access_token'])
            : false;
    }

    /**
     * Сохранить токен через колл бэк сохранения.
     *
     * @param callable $fu - колл бэк сохранения
     */
    private function saveToken(callable $fu)
    {
        return $fu(['cdekAuth' => [
            'expires_in' => $this->expire,
            'access_token' => $this->token,
            'account_type' => $this->account_type, ]]);
    }

    /**
     * Установить параметр настройки сохранения.
     *
     * @param array    $memory - массив настройки сохранения
     * @param callable $fu     - колл бэк сохранения
     */
    public function setMemory(?array $memory, callable $fu): CdekClientV2
    {
        $this->memory = $memory;
        $this->memory_save_fu = $fu;

        return $this;
    }

    /**
     * Проверяет передан ли сохраненный массив данных авторизации.
     */
    private function getMemory(): ?array
    {
        return $this->memory;
    }

    private function getToken(): ?string
    {
        if (empty($this->token)) {
            throw new \InvalidArgumentException('Не передан API-токен!');
        }

        return $this->token;
    }

    /**
     * Устанавливает токен из данных авторизации сервера
     * или из переданной памяти.
     */
    private function setToken(string $token): CdekClientV2
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Проверка ответа на ошибки.
     *
     * @throws CdekV2RequestException
     */
    private function checkErrors($method, $response, $apiResponse): bool
    {
        if (empty($apiResponse)) {
            throw new CdekV2RequestException('От API CDEK при вызове метода '.$method.' пришел пустой ответ', $response->getStatusCode());
        }
        if (
            $response->getStatusCode() > 202 && isset($apiResponse['requests'][0]['errors'])
            || isset($apiResponse['requests'][0]['state']) && $apiResponse['requests'][0]['state'] == 'INVALID'
        ) {
            $message = CdekV2RequestException::getTranslation(
                $apiResponse['requests'][0]['errors'][0]['code'],
                $apiResponse['requests'][0]['errors'][0]['message']
            );
            throw new CdekV2RequestException('От API CDEK при вызове метода '.$method.' получена ошибка: '.$message, $response->getStatusCode());
        }
        if (
            $response->getStatusCode() == 200 && isset($apiResponse['errors'])
            || isset($apiResponse['state']) && $apiResponse['state'] == 'INVALID' || $response->getStatusCode() !== 200 && isset($apiResponse['errors'])
        ) {
            $message = CdekV2RequestException::getTranslation(
                $apiResponse['errors'][0]['code'],
                $apiResponse['errors'][0]['message']
            );
            throw new CdekV2RequestException('От API CDEK при вызове метода '.$method.' получена ошибка: '.$message, $response->getStatusCode());
        }
        if ($response->getStatusCode() > 202 && ! isset($apiResponse['requests'][0]['errors'])) {
            throw new CdekV2RequestException('Неверный код ответа от сервера CDEK при вызове метода 
             '.$method.': '.$response->getStatusCode(), $response->getStatusCode());
        }

        return false;
    }
    /**
     * Поиск городов по неполному названию.
     *
     * @return CitiesSuggestResponse[]
     */
    public function suggestCity(?LocationSuggest $filter = null): array
    {
        $params = ( ! empty($filter)) ? $filter->citiesSuggest() : [];
        $resp     = [];
        $response = $this->apiRequest('GET', Constants::CITIES_SUGGEST_URL, $params);

        foreach ($response as $key => $value) {
            $resp[] = new CitiesSuggestResponse($value);
        }

        return $resp;
    }
    /**
     * Получение списка регионов.
     *
     * @return RegionsResponse[]
     */
    public function getRegions(?Location $filter = null): array
    {
        $params = ( ! empty($filter)) ? $filter->regions() : [];
        $resp = [];
        $response = $this->apiRequest('GET', Constants::REGIONS_URL, $params);

        foreach ($response as $key => $value) {
            $resp[] = new RegionsResponse($value);
        }

        return $resp;
    }

    /**
     * Получение списка городов.
     *
     * @return CitiesResponse[]
     */
    public function getCities(?Location $filter = null): array
    {
        $params = ( ! empty($filter)) ? $filter->cities() : [];

        $resp = [];
        $response = $this->apiRequest('GET', Constants::CITIES_URL, $params);
        foreach ($response as $key => $value) {
            $resp[] = new CitiesResponse($value);
        }

        return $resp;
    }

    /**
     * Получение списка ПВЗ СДЭК.
     *
     * @return DeliveryPointsResponse[]
     */
    public function getDeliveryPoints(?DeliveryPoints $filter = null): array
    {
        $resp = [];
        $response = $this->apiRequest('GET', Constants::DELIVERY_POINTS_URL, $filter);
        foreach ($response as $key => $value) {
            $resp[] = new DeliveryPointsResponse($value);
        }

        return $resp;
    }

    /**
     * Расчет стоимости и сроков доставки по коду тарифа.
     *
     * @param $tariff - Объект класса Tariff установки запроса для тарифа
     *
     * @return TariffResponse Ответ
     *
     * @throws \InvalidArgumentException
     */
    public function calculateTariff(Tariff $tariff): TariffResponse
    {
        if ($tariff->getTariffCode()) {
            return new TariffResponse($this->apiRequest('POST', Constants::CALC_TARIFF_URL, $tariff));
        }
        throw new \InvalidArgumentException('Не установлен обязательный параметр  tariff_code');
    }

    /**
     * Метод используется для расчета стоимости и сроков доставки по всем доступным тарифам.
     *
     * @param $tariff - Объект класса Tariff установки запроса для тарифа
     *
     * @return TariffListResponse[] Ответ
     */
    public function calculateTariffList(Tariff $tariff): array
    {
        $response = $this->apiRequest('POST', Constants::CALC_TARIFFLIST_URL, $tariff);

        $resp = [];
        foreach ($response['tariff_codes'] as $key => $value) {
            $resp[] = new TariffListResponse($value);
        }

        return $resp;
    }

    /**
     * Создание заказа.
     *
     * @param Order $order - Параметры заказа
     *
     * @throws CdekV2RequestException
     */
    public function createOrder(Order $order): EntityResponse
    {
        return new EntityResponse($this->apiRequest('POST', Constants::ORDERS_URL, $order));
    }

    /**
     * Позволяет удалить заказ по uuid.
     *
     * @param string $uuid - Идентификатор сущности, связанной с заказом
     *
     * @throws CdekV2RequestException
     */
    public function deleteOrder(string $uuid): bool
    {
        $request = new EntityResponse($this->apiRequest('DELETE', Constants::ORDERS_URL.'/'.$uuid));

        if ($request->getRequests()[0]->getState() != 'INVALID') {
            return false;
        }
    }

    /**
     * Регистрация отказа.
     *
     * @param string $order_uuid - Идентификатор заказа в ИС СДЭК, по которому необходимо зарегистрировать отказ
     *
     * @throws CdekV2RequestException
     */
    public function cancelOrder(string $order_uuid): EntityResponse
    {
        return new EntityResponse($this->apiRequest('POST', Constants::ORDERS_URL.'/'.$order_uuid.'/refusal'));
    }

    /**
     * Обновление заказа.
     *
     * @param Order $order - Параметры заказа
     */
    public function updateOrder(Order $order): EntityResponse
    {
        return new EntityResponse($this->apiRequest('PATCH', Constants::ORDERS_URL, $order));
    }

    /**
     * Полная информация о заказе по трек номеру.
     *
     * @param string $cdek_number - Номер заказа(накладной) СДЭК
     */
    public function getOrderInfoByCdekNumber(string $cdek_number): OrderResponse
    {
        return new OrderResponse($this->apiRequest('GET', Constants::ORDERS_URL, ['cdek_number' => $cdek_number]));
    }

    /**
     * Полная информация о заказе по ID заказа в магазине.
     *
     * @param string $im_number - Номер заказа
     */
    public function getOrderInfoByImNumber(string $im_number): OrderResponse
    {
        return new OrderResponse($this->apiRequest('GET', Constants::ORDERS_URL, ['im_number' => $im_number]));
    }

    /**
     * Полная информация о заказе по ID заказа в магазине.
     *
     * @param string $uuid - Идентификатор сущности, связанной с заказом
     */
    public function getOrderInfoByUuid(string $uuid): OrderResponse
    {
        return new OrderResponse($this->apiRequest('GET', Constants::ORDERS_URL.'/'.$uuid));
    }

    /**
     * Запрос на формирование ШК-места к заказу.
     */
    public function setBarcode(Barcode $barcode): EntityResponse
    {
        return new EntityResponse($this->apiRequest('POST', Constants::BARCODES_URL, $barcode));
    }

    /**
     * Получение сущности ШК к заказу.
     *
     * @param string $uuid - Идентификатор сущности ШК
     */
    public function getBarcode(string $uuid): PrintResponse
    {
        return new PrintResponse($this->apiRequest('GET', Constants::BARCODES_URL.'/'.$uuid));
    }

    /**
     * Получение Pdf ШК-места к заказу.
     *
     * @param string $uuid - Идентификатор сущности ШК
     *
     * @return StreamInterface
     */
    public function getBarcodePdf(string $uuid)
    {
        return $this->apiRequest('GET', Constants::BARCODES_URL.'/'.$uuid.'.pdf');
    }

    /**
     * Запрос на формирование накладной к заказу.
     */
    public function setInvoice(Invoice $invoice): EntityResponse
    {
        return new EntityResponse($this->apiRequest('POST', Constants::INVOICE_URL, $invoice));
    }

    /**
     * Получение сущности накладной к заказу.
     */
    public function getInvoice(string $uuid): PrintResponse
    {
        return new PrintResponse($this->apiRequest('GET', Constants::INVOICE_URL.'/'.$uuid));
    }

    /**
     * Получение Pdf накладной к заказу.
     *
     * @return StreamInterface
     */
    public function getInvoicePdf(string $uuid)
    {
        return $this->apiRequest('GET', Constants::INVOICE_URL.'/'.$uuid.'.pdf');
    }

    /**
     * Создание договоренностей для курьера.
     */
    public function createAgreement(Agreement $agreement): EntityResponse
    {
        return new EntityResponse($this->apiRequest('POST', Constants::COURIER_AGREEMENTS_URL, $agreement));
    }

    /**
     * Получение договоренностей для курьера.
     */
    public function getAgreement(string $uuid): AgreementResponse
    {
        return new AgreementResponse($this->apiRequest('GET', Constants::COURIER_AGREEMENTS_URL.'/'.$uuid));
    }

    /**
     * Создание заявки на вызов курьера.
     */
    public function createIntakes(Intakes $intakes): EntityResponse
    {
        return new EntityResponse($this->apiRequest('POST', Constants::INTAKES_URL, $intakes));
    }

    /**
     * Информация о заявке на вызов курьера.
     */
    public function getIntakes(string $uuid): IntakesResponse
    {
        return new IntakesResponse($this->apiRequest('GET', Constants::INTAKES_URL.'/'.$uuid));
    }

    /**
     * Удаление заявки на вызов курьера.
     */
    public function deleteIntakes(string $uuid): bool
    {
        $this->apiRequest('DELETE', Constants::INTAKES_URL.'/'.$uuid);

        return false;
    }

    /**
     * Запрос на получение информации о реестрах НП.
     *
     * @param string $date - Дата, за которую необходимо вернуть реестры наложенных платежей, по которым был переведен наложенный платеж.
     *                     пример: '2021-03-25'
     */

    public function getRegistries(string $date): RegistryResponse
    {
        return new RegistryResponse($this->apiRequest('GET', 'registries', ['date' => $date]));
    }

    /**
     * Запрос на получение информации о переводе наложенного платежа.
     *
     * @param string $date - Дата, за которую необходимо вернуть список заказов, по которым был переведен наложенный платеж
     *                     пример: '2021-03-25'
     */
    public function getPayments(string $date): PaymentResponse
    {
        return new PaymentResponse($this->apiRequest('GET', 'payment', ['date' => $date]));
    }

    /**
     * Метод используется для получения информации о чеке по заказу или за выбранный день.
     *
     * @param Check $check - данные о заказах, по которым нужно получить чеки
     */
    public function getChecks(Check $check): CheckResponse
    {
        return new CheckResponse($this->apiRequest('GET', 'check', $check));
    }

    /**
     * Добавление нового слушателя webhook.
     *
     * @param Webhooks $webhooks - настройки вебхуков
     */
    public function setWebhooks(Webhooks $webhooks): EntityResponse
    {
        return new EntityResponse($this->apiRequest('POST', Constants::WEBHOOKS_URL, $webhooks));
    }

    /**
     * Информация о слушателях webhook.
     *
     * @return WebhookListResponse[] Ответ
     */
    public function getWebhooks(): array
    {
        $response = $this->apiRequest('GET', Constants::WEBHOOKS_URL);

        $resp = [];
        foreach ($response as $key => $value) {
            $resp[] = new WebhookListResponse($value);
        }

        return $resp;
    }

    /**
     * Информация о слушателе webhook.
     */
    public function getWebhook(string $uuid): EntityResponse
    {
        return new EntityResponse($this->apiRequest('GET', Constants::WEBHOOKS_URL.'/'.$uuid));
    }

    /**
     * Удаление слушателя webhook.
     */
    public function deleteWebhooks(string $uuid): EntityResponse
    {
        return new EntityResponse($this->apiRequest('DELETE', Constants::WEBHOOKS_URL.'/'.$uuid));
    }
}
