<table>
  <tr>
  <td><a href="https://antistress.store/"><img align="left" width="230" src="https://antistress.store/mediafiles/logo.png"></a></td>
    <td style="font-size:1.2em"><strong> antistress-store/cdek-sdk-v2 </strong></td>
  </tr>
 
</table>

# SDK для интеграции с API 2.0 CDEK от Antistress.Store®
Перед вами полное SDK для API v2.0 для [интеграции со службой доставки СДЭК](https://www.cdek.ru/clients/integrator.html).

Вопросы по интеграции вашим php \ Laravel вебсайтом, crm [написать руководителю](https://antistress.store/about).

Список возможностей и содержание SDK:

- [SDK для интеграции с API 2.0 CDEK от Antistress.Store®](#sdk-для-интеграции-с-api-20-cdek-от-antistressstore)
  - [Перечень доступных методов класса `CdekClientV2`](#перечень-доступных-методов-класса-cdekclientv2)
  - [Требования](#требования)
  - [Установка](#установка)
  - [Документация](#документация)
  - [Руководство к действию](#руководство-к-действию)
    - [Авторизация](#авторизация)
    - [Сохранение токена](#сохранение-токена)
    - [Информация о доступных геттерах и сеттерах SDK](#информация-о-доступных-геттерах-и-сеттерах-sdk)
    - [Расчёт стоимости доступных тарифов](#расчёт-стоимости-доступных-тарифов)
    - [Расчёт стоимости тарифа](#расчёт-стоимости-тарифа)
    - [Список методов для получения ответа сущности класса TariffResponse](#список-методов-для-получения-ответа-сущности-класса-tariffresponse)
    - [Получение списка ПВЗ](#получение-списка-пвз)
    - [Список методов для установки сущности класса DeliveryPoints](#список-методов-для-установки-сущности-класса-deliverypoints)
    - [Получение списка регионов](#получение-списка-регионов)
    - [Получение списка городов](#получение-списка-городов)
    - [Регистрация заказа](#регистрация-заказа)
    - [Информация о заказе по id заказа в ИМ](#информация-о-заказе-по-id-заказа-в-им)
    - [Информация о заказе по cdek_number (номеру накладной)](#информация-о-заказе-по-cdek_number-номеру-накладной)
    - [Информация о заказе по uuid](#информация-о-заказе-по-uuid)
    - [Список методов для получения ответа сущности класса OrderResponse](#список-методов-для-получения-ответа-сущности-класса-orderresponse)
    - [Список методов для установки сущности класса Order](#список-методов-для-установки-сущности-класса-order)
    - [Печать квитанции](#печать-квитанции)
    - [Список методов для установки сущности класса Invoice](#список-методов-для-установки-сущности-класса-invoice)
    - [Список методов для получения данных сущности класса PrintResponse](#список-методов-для-получения-данных-сущности-класса-printresponse)
    - [Удаление заказа](#удаление-заказа)
    - [Отмена заказа](#отмена-заказа)
    - [Регистрация договоренностей о доставке](#регистрация-договоренностей-о-доставке)
    - [Получение информации договоренности о доставке](#получение-информации-договоренности-о-доставке)
    - [Список методов для получения данных сущности класса AgreementResponse](#список-методов-для-получения-данных-сущности-класса-agreementresponse)
    - [Регистрация заявки на вызов курьера](#регистрация-заявки-на-вызов-курьера)
    - [Получение заявки на вызов курьера](#получение-заявки-на-вызов-курьера)
    - [Удаление заявки на вызов курьера](#удаление-заявки-на-вызов-курьера)
    - [Получение информации о переводе наложенного платежа](#получение-информации-о-переводе-наложенного-платежа)
    - [Получение информации о чеках](#получение-информации-о-чеках)
    - [Подписка на вебхуки (Webhooks)](#подписка-на-вебхуки-webhooks)
    - [Получение реестров наложенных платежей](#получение-реестров-наложенных-платежей)
  - [Известные проблемы](#известные-проблемы)
  - [Лицензия](#лицензия)
  
В разработке:
- Регистрация преалерта
- Информация о преалерте
- Информация о паспортных данных


## Перечень доступных методов класса `CdekClientV2`

| Задача                                                                                                         | Метод                      | Аргументы      | Ответ                    |
|----------------------------------------------------------------------------------------------------------------| -------------------------- |----------------| ------------------------ |
| [Сохранение токена](#cохранение-токена)                                                                        | `setMemory`                | `memory`, `fu` | CdekClientV2             |
| [Получение списка ПВЗ](#получение-списка-пвз)                                                                  | `getDeliveryPoints`        | `filter`       | DeliveryPointsResponse[] |
| [Получение списка регионов](#получение-списка-регионов)                                                        | `getRegions`               | `filter`       | RegionsResponse[]        |
| [Получение списка городов](#получение-списка-городов)                                                          | `getCities`                | `filter`       | CitiesResponse[]         |
| [Поиск города по названию](#поиск-города-по-названию)                                                          | `suggestCity`              | `query`        | CitiesSuggestResponse[]  |
| [Расчёт стоимости тарифа](#расчёт-стоимости-тарифа)                                                            | `calculateTariff`          | `tariff`       | TariffResponse           |
| [Расчёт стоимости списка тарифов](#расчёт-стоимости-доступных-тарифов)                                         | `calculateTariffList`      | `tariff`       | TariffListResponse[]     |
| [Регистрация заказа](#регистрация-заказа)                                                                      | `createOrder`              | `order`        | EntityResponse           |
| [Удаление заказа](#удаление-заказа)                                                                            | `deleteOrder`              | `uuid`         | false                    |
| [Отмена заказа](#отмена-заказа)                                                                                | `deleteOrder`              | `uuid`         | EntityResponse           |
| [Изменение заказа](#updateOrder)                                                                               | `updateOrder`              | `order`        | EntityResponse           |
| [Информация о заказе по трек-номеру](#getOrderInfoByCdekNumber)                                                | `getOrderInfoByCdekNumber` | `cdek_number`  | OrderResponse            |
| [Информация о заказе по ID заказа ИМ](#getOrderInfoByImNumber)                                                 | `getOrderInfoByImNumber`   | `im_number`    | OrderResponse            |
| [Информация о заказе по uuid](#информация-о-заказе-по-uuid)                                                    | `getOrderInfoByUuid`       | `uuid`         | OrderResponse            |
| [Формирование ШК-места к заказу](#setBarcode)                                                                  | `setBarcode`               | `barcode`      | EntityResponse           |
| [Получение сущности накладной к заказу](#getBarcode)                                                           | `getBarcode`               | `uuid`         | PrintResponse            |
| [Печать pdf файла ШК-места к заказу](#getBarcodePdf)                                                           | `getBarcodePdf`            | `uuid`         | StreamInterface          |
| [Формирование квитанции к заказу](#список-методов-для-установки-сущности-класса-invoice)                       | `setInvoice`               | `invoice`      | EntityResponse           |
| [Получение сущности накладной к заказу](#список-методов-для-получения-данных-сущности-класса-invoicepresponse) | `getInvoice`               | `uuid`         | PrintResponse            |
| [Печать pdf файла накладной(квитанции) к заказу](#печать-квитанции)                                            | `getInvoicePdf`            | `uuid`         | StreamInterface          |
| [Регистрация договоренности о доставке](#регистрация-договоренностей-о-доставке)                               | `createAgreement`          | `agreement`    | EntityResponse           |
| [Получение договоренности о доставке](#получение-информации-договоренности-о-доставке)                         | `getAgreement`             | `uuid`         | AgreementResponse        |
| [Регистрация заявки на вызов курьера](#регистрация-заявки-на-вызов-курьера)                                    | `createIntakes`            | `intakes`      | EntityResponse           |
| [Получение информации о заявке на вызов курьера](#получение-заявки-на-вызов-курьера)                           | `getIntakes`               | `uuid`         | IntakesResponse          |
| [Удаление заявки на вызов курьера](#удаление-заявки-на-вызов-курьера)                                          | `deleteIntakes`            | `uuid`         | false                    |
| [Получение информации о наложенных платежах](#получение-информации-о-переводе-наложенного-платежа)             | `getPayments`              | `date`         | PaymentResponse          |
| [Получение информации о чеках](#получение-информации-о-чеках)                                                  | `getChecks`                | `check`        | CheckResponse            |
| [Подписка на вебхуки (Webhooks)](#подписка-на-вебхуки-webhooks)                                                | `setWebhooks`              | `webhooks`     | EntityResponse           |
| [Получение реестров наложенных платежей](#получение-реестров-наложеных-платежей)                               | `getRegistries`            | `date`         | RegistryResponse         |
****
## История
### С версии v1.2.3 детальная информация об истории содержится в [релизах](https://github.com/AntistressStore/cdek-sdk-v2/releases)
- v1.2.2 В CdekClientV2 добавлены строгие типы возврата значений (будьте внимательны). Исправлен метод getWebhooks (спасибо [Ilya Brilev](https://github.com/ilyabrilev)). Добавлены класс и его тесты WebhookListResponse
- v1.2 Добавлены первые тесты DeliveryPoints и Tariff, исправлены тестовые логин и пароль (обновились у сдэк)
- v1.1.1 Обновили ссылку на документацию. Спасибо [Nikolay Lapay](https://github.com/iamwildtuna)
- v1.1 
+ Добавлена возможность изменять таймаут соединения.
+ Добавлены новые методы для работы с вебхуками Спасибо [lor08](https://github.com/lor08)  
+ Добавлены Позиции товаров в упаковке, параметр page при запросе городов Спасибо [Vladimir Noskov](https://github.com/kovspace)
+ Добавлены address_full в LocationResponse Спасибо [vaii](https://github.com/vaii)

- v1.0.6 - Добавили delivery_recipient_cost теперь может быть нулевое значение. Спасибо [AndreyArtamonov](https://github.com/AndreyArtamonov)
- v1.0.5 - Добавили новые свойства в Response по Пунктам выдачи. Спасибо [Mexaanik](https://github.com/Mexaanik)
- v1.0.4 - Исправлена совместимость с php 7. За исправление спасибо [Anton Yadokhin](https://github.com/yadokhin)
- v1.0.3 - Добавлен утвержденный со СДЭК ключ разработчика.
- v1.0.2 - Добавлена процедура проверки синтаксиса. За исправление спасибо [sanmai Alexey Kopytko](https://github.com/sanmai)
- v1.0.1 - Добавлен Метод получения чеков

## Требования
Автор старался сделать наиболее функциональный и универсальный SDK. Необходимы: 
PHP 7.2 и выше, расширение "ext-json", и клиент Guzzlehttp. Тесты проводились на guzzlehttp 7.3. 

***
## Установка
Установка осуществляется с помощью менеджера пакетов Composer

```bash
composer require antistress-store/cdek-sdk-v2
```


***
## Документация

Пригодится справочная информация по [Протоколу обмену данными (v2.0)](https://api-docs.cdek.ru/29923741.html) 


***
## Руководство к действию
### Авторизация

Для интеграции с ИС СДЭК по протоколу обмена данными (v2.0) необходимо:

Заключить договор со СДЭК. Получить логин и пароль для доступа к API или создать ключ для доступа к боевой учетной записи. Для этого нужно в личном кабинете в разделе ["Интеграция"](https://lk.cdek.ru/integration) нажать кнопку "Создать ключ", затем в этом разделе появится идентификатор аккаунта и пароль.

Данный программный комплекс поддерживает как тестовую, так и боевую (полнофункциональную) среду.

Для того чтобы воспользоваться Тестовой средой, нужно в первом аргументе передать 'TEST'. 
Все необходимые настройки SDK загрузит автоматически. 
```php
$cdek_client = new \AntistressStore\CdekSDK2\CdekClientV2('TEST');
```
Полнофункциональная "боевая" авторизация осуществляется с использованием логина и пароля для api. Опционально можно устанавливать таймаут соединения 3 аргументом $timeout (по умолчанию 5.0), как на тестовом, так и на боевом аккаунте.
```php
$cdek_client = new \AntistressStore\CdekSDK2\CdekClientV2($account, $secure);
```
После успешной авторизации сервер выдает токен, срок действия токена по умолчанию 3600 секунд. Сохранять не обязательно, вы можете авторизироваться каждый раз заново. 
Сохранив в сессии или в файле этот токен, вы избавите себя от повторной авторизации на указанный срок. 

### Сохранение токена
В этом вам поможет сеттер setMemory класса клиента. Аргументами сеттера являются - массив данных, в котором должен быть ключ 'cdekAuth' и ваша функция колл бэк. Ваша функция колл бэк должна принимать массив, передавать его на сохранение в нужное место. Пример реализации для Laravel

```php
$cdekSdkAuthSaver = function (array $memory) {
session($memory); // сохраняем в сессии возвращенный массив с данными авторизации
return true;
        };
```
Передаваемый вами массив должен иметь вид:
```php
 ['cdekAuth'=>
[
'expires_in' => '', // здесь будет сохранено время до исчерпания срока действия токена
"access_token" => '', // здесь будет сохранен токен
'account_type' => '', // здесь будет тип среды
] 
];
```
Готовый массив и функцию колл бэк передаем в сеттер:
```php
// Например, в Laravel можно указать ключ сессии session('cdekAuth')
$cdek_client->setMemory(session('cdekAuth'), $cdekSdkAuthSaver);
```
Все проверки на время действия токена, который вы передали в массиве, на соответствие его используемой в данный момент среде (тестовой или боевой) проходят "под капотом". Вам не нужно об этом беспокоиться. Например, если вы пользовались тестовой средой и после решили перейти на боевую, SDK автоматически авторизуется заново и сохранит новый токен.

### Информация о доступных геттерах и сеттерах SDK
> Каждый метод геттер и сеттер соответствует одноименному свойству ответа сервера СДЭК в camel case (Верблюжий регистр). Если свойство сложное, например, Seller, Location, то у него как правило есть объект ответа sdk SellerResponse, Location и т.п. Соответственно обратившись к этому свойству через геттер вы получите объект данного класса.

### Расчёт стоимости доступных тарифов
> Большинство сеттеров сущностей sdk возвращают $this, поэтому вы можете использовать их последовательно, один за другим.
```php
$tariff = (new Tariff())
            ->setCityCodes(172, 44) // Экспресс-метод установки кодов отправителя и получателя
            ->setPackageWeight(500)
            ->addServices(['PART_DELIV'])
                ;

$tariffList = $cdek_client->calculateTariffList($tariff);
```
$tariffList это массив TariffListResponse[] со списком тарифов, которые являются объектами класса TariffListResponse. 
Пример получения данных со всеми доступными методами:
```php
foreach ($tariffList as $result) {
$result->getTariffName(); // Код тарифа
$result->getTariffCode(); // Название тарифа
$result->getTariffDescription(); // Описание тарифа
$result->getDeliverySum(); // Стоимость доставки	
$result->getDeliveryMode(); // Режим тарифа
$result->getPeriodMin(); // Минимальное время доставки (в рабочих днях)	
$result->getPeriodMax(); // Максимальное время доставки (в рабочих днях)	
$result->getCalendarMin()
$result->getCalendarMax()
}

```

### Расчёт стоимости тарифа

Разница с предыдущим методом состоит лишь в том, что объекту тариф нужно задать конкретный код тарифа для расчета. Этот параметр обязателен, без него sdk вернет ошибку.
```php
$tariff = (new Tariff())
            ->setTariffCode(136) // Указывает код тарифа для расчета
            ->setCityCodes(172, 44) // Экспресс-метод установки кодов отправителя и получателя
            ->setPackageWeight(500)
            ->addServices(['PART_DELIV'])
                ;

$tariff_response = $cdek_client->calculateTariff($tariff); // TariffResponse
```
Ответ объект класса TariffResponse
### Список методов для получения ответа сущности класса TariffResponse

```php
->getDeliverySum()
->getPeriodMin()
->getPeriodMax()
->getCalendarMin()
->getCalendarMax()
->getWeightCalc()
->getTotalSum()
->getCurrency()
->getServices()
```

Расчет стоимости тарифа + Страховка
```php
  $tariff = (new Tariff())
            ->setCityCodes(172, 172)
            ->setTariffCode(136)
            ->setPackageWeight(500)
            ->addServices(['INSURANCE' => 10000])
        ;

  $tariffResponse = $cdek_client->->calculateTariff($tariff);
 
 //... При таких установках на выходе имеем рассчитанную суммы страховки, см  object = AntistressStore\CdekSDK2\Entity\Responses\ServicesResponse
 
 $tariffResponce object = AntistressStore\CdekSDK2\Entity\Responses\TariffResponse
    delivery_sum float = 1505
    period_min int = 2
    period_max int = 3
    weight_calc int = 6000
    calendar_min int = 2
    calendar_max int = 3
    total_sum float = 246
    currency string = "RUB"
  services array = array(1)
   0 object = AntistressStore\CdekSDK2\Entity\Responses\ServicesResponse
      code string = "INSURANCE"
      sum float = 45
      total_sum float = 54
      discount_percent float = 0
      discount_sum float = 0
      vat_rate float = 0
      vat_sum float = 0
      parameter null = null

```
### Получение списка ПВЗ

Устанавливаем нужные параметры. Отдаем объект в метод клиента. Метод при успешном запросе возвращает объект класса DeliveryPointsResponse, ниже представлен пример со всеми доступными методами.

```php
$requestPvz = (new DeliveryPoints())->setType('PVZ')->setCityCode(44);
$responsePvz = $cdek_client->getDeliveryPoints($requestPvz);
        
        foreach ($responsePvz as $item) {
        $item->getCode();
        $item->getName();
        $item->getLocation()->getAddress();
        $item->getWorkTime();
        $item->getLocation()->getPostalCode();
        $item->getWorkTimeList();
        $item->getWorkTimeExceptions();
        $item->getNote();
        $item->getOwnerCode();
        $item->getNearestStation();
        $item->getNearestMetroStation();
        $item->getSite();
        $item->getEmail();
        $item->getAddressComment();
        $item->getOfficeImageList();
        $item->getDimensions();
        $item->getHaveCashless();
        $item->getHaveCash();
        $item->getAllowedCod();
        $item->getIsDressingRoom();
        $item->getIsHandout();
        $item->getIsReception();
        $item->getWeightMax();
        $item->getWeightMin();
        $item->getTakeOnly();
        }
```
### Список методов для установки сущности класса DeliveryPoints
Поддерживается установка следующих параметров запроса:
```php
     ->setAllowedCod()
     ->setCityCode()
     ->setCountryCode()
     ->setHaveCash()
     ->setHaveCashless()
     ->setIsDressingRoom()
     ->setIsHandout()
     ->setIsReception()
     ->setLang()
     ->setPickupOnly()
     ->setRegionCode()
     ->setRegionCode()
     ->setTakeOnly()
     ->setType()
     ->setWeightMax()
     ->setWeightMin()
     ->withCode()
     ->withPostalCode()
  ```
  
### Получение списка регионов
Поддерживается установка следующих параметров запроса:
```php
     ->setCountryCodes()
     ->setFiasRegionGuid()
     ->setKladrRegionCode()
     ->setLang()
     ->setPage()
     ->setRegionCode()
     ->setSize()
  ``` 
Пример запроса: 
  ```php
$request = (new Location())->setCountryCodes('RU,TR');
$response = $cdek_client->getRegions($request);
```
Ответом будет массив RegionsResponse[], итерируясь по которому можно запрашивать нужные вам параметры от экземпляра объекта RegionsResponse.
Список получаемых параметров можно посмотреть [здесь](https://apidoc.cdek.ru/#tag/location/operation/regions). Для каждого из них есть геттер. Например, чтобы получить kladr_region_code, воспользуйтесь методом ->getKladrRegionCode.

### Получение списка городов
Поддерживается установка следующих параметров запроса:
```php
     ->setCity()
     ->setCode()
     ->setCountryCodes()
     ->setFiasGuid()
     ->setFiasRegionGuid()
     ->setKladrCode()
     ->setKladrRegionCode()
     ->setLang()
     ->setPage()
     ->setPaymentLimit()
     ->setPostalCode()
     ->setRegionCode()
     ->setSize()
     ->withCode()
     ->withPostalCode()
  ```  
Пример запроса: 
  ```php
$request = (new Location())->setCountryCodes('RU,TR')->setCode(44);
$response = $cdek_client->getCities($request);
```
Ответом будет массив CitiesResponse[], итерируясь по которому можно запрашивать нужные вам параметры от экземпляра объекта CitiesResponse.
Список получаемых параметров можно посмотреть [здесь](https://apidoc.cdek.ru/#tag/location/operation/cities). Для каждого из них есть геттер. Например, чтобы получить kladr_region_code, воспользуйтесь методом ->getKladrRegionCode.

| При использовании тестового аккаунта возможны ошибочные ответы\пустые от сервера СДЭК по независящим от SDK причинам. На боевом аккаунте (с вашими паролем и логином такого быть не должно) |
|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|

### Поиск города по названию
Поддерживается установка следующих параметров запроса:
```php
     ->setName()
     ->setCountryCode()
  ```  
Пример запроса: 
  ```php
$request = (new LocationSuggest())->setName('Екатеринб')->setCountryCode('RU'); //Название города в запросе может быть не полным.
$response = $cdek_client->suggestCity($query);
```

Ответом будет массив CitiesSuggestResponse[], итерируясь по которому можно запрашивать нужные вам параметры от экземпляра объекта CitiesSuggestResponse.

Геттеры для параметров ответа:
```php
     ->getUuid()
     ->getCode()
     ->getFullName()
  ```
### Регистрация заказа
Пример установки заказа, с описанием:
```php
// запрос всех данных формы (Laravel)

$cdek_data = $request->except('_token'); 

// Создание объекта заказа

$order = (new \AntistressStore\CdekSDK2\Entity\Requests\Order())
            ->setNumber('НовыйЗаказ1') // Номер заказа
            ->setType(1)                      // Тип заказа (ИМ)
            ->setComment('Оплата по карте') // Комментарий
            ->setTariffCode(136) // Код тарифа
            ->setDeliveryRecipientCost(150,55) // Стоимость доставки
            ->setPrint('waybill') // Запрос создать файл накладной вместе с заказом
    ;

// Добавление информации о продавце

$seller = (new \AntistressStore\CdekSDK2\Entity\Requests\Seller())
            ->setName('Antistress.Store')
            ->setInn(77777777777)
            ->setPhone('88002017708')
            ->setOwnershipForm(63)
        ;
$order->setSeller($seller);

// Добавление информации о получателе

$recipient = (new \AntistressStore\CdekSDK2\Entity\Requests\Contact())
            ->setName('Мастер Йода')
            ->setEmail('yoda@antistress.store')
            ->setPhones('911')
        ;
$order->setRecipient($recipient);

// Адрес отправителя только для тарифов "от двери"

            $order->setShipmentAddress('ул.Люка Скайоукера, д.1') 
                ->setShipmentCityCode(1204)
                ->setRecipientAddress('ул.Джедаев, д.3')
                ->setRecipientCityCode(44)
            ;

// Создаем данные посылки. Место

        $packages =
            (new \AntistressStore\CdekSDK2\Entity\Requests\Package())
            ->setNumber('1')
            ->setWeight(500)->setHeight(10)->setWidth(10)
            ->setLength(10)
        ;
```

Исправлено в версии 1.2.3, следующие функции принимают mixed для обратной совместимости
```
AntistressStore\CdekSDK2\Entity\Requests\Order::setServices()
public function setServices(mixed $services) 

AntistressStore\CdekSDK2\Entity\Requests\Order::setPackages() 
setPackages(mixed $packages)
```
Можно передавать как раньше один экземпляр класса Package или Services в этом случае добавится единичная упаковка или сервис, можно передавать целым массивом, тогда массив элементов добавиться к существующим.
Важно помнить, что массив должен содержать подготовленные классы Package `[Package,Package,...]` или Services `[Services,Services,...]`, пример для $packages:
```php
 \\ вариант 1 Один экземпляр класса
        $packages =
        (new \AntistressStore\CdekSDK2\Entity\Requests\Package())
            ->setNumber('1')
            ->setWeight(500)
            ->setHeight(10)
            ->setWidth(10)
            ->setLength(10)
        ;

      $order->setPackages($packages);

 \\ массив c экземплярами класса
        $packages = [];

        $packages[] =
        (new \AntistressStore\CdekSDK2\Entity\Requests\Package())
            ->setNumber('1')
            ->setWeight(500)
            ->setHeight(10)
            ->setWidth(10)
            ->setLength(10)
        ;

      $order->setPackages($packages);
```
Для добавления сервисов есть более удобная экспресс функция `->addServices(['INSURANCE' => 1000])` в которую передается массив ключ - значение, а функция сама подготовит правильный класс.


```
// Создаем товары

        $items = [];
        $items[] = (new Item())
            ->setName('name')
            ->setWareKey('articul') // Идентификатор/артикул товара/вложения
            ->setPayment(1500.00, 0) // Оплата за товар при получении, без НДС (за единицу товара)
            ->setCost((1500.00) // Объявленная стоимость товара (за единицу товара)
            ->setWeight(100) // Вес в граммах
            ->setAmount(1) // Количество
        ;

$packages->setItems($items);
$order->setPackages($packages);
    
// Добавление доп.услуг (бесплатных) частичная доставка

        if (count($items) < 1) {
            $order->addServices(['PART_DELIV']);
        }

// Заказ подготовлен отправляем в ранее объявленный клиент

$response = $cdek_client->createOrder($order);
            
```
Ответом будет сущность класса **AntistressStore\CdekSDK2\Entity\Responses\EntityResponse**
Получить uuid созданного заказа нужно методом:
```php
$uuid = $response->getEntityUuid();
```
### Информация о заказе по id заказа в ИМ
```php
$cdek_client->getOrderInfoByImNumber('НовыйЗаказ1');
```  
### Информация о заказе по cdek_number (номеру накладной)
```php
$cdek_client->getOrderInfoByCdekNumber('1105661402');
```  
### Информация о заказе по uuid  
```php
$cdek_client->getOrderInfoByUuid($uuid);
```  
Ответом будет сущность класса **AntistressStore\CdekSDK2\Entity\Responses\OrderResponse**
все необходимые данные можно получить используя методы геттеры этой сущности
### Список методов для получения ответа сущности класса OrderResponse
```php
     ->getCdekNumber()
     ->getComment()
     ->getDeliveryDetail()
     ->getDeliveryMode()
     ->getDeliveryPoint()
     ->getDeliveryProblem()
     ->getDeliveryRecipientCost()
     ->getDeliveryRecipientCostAdv()
     ->getDeveloperKey()
     ->getFromLocation()
     ->getIsReturn()    
     ->getIsReverse()   
     ->getItemsCostCurrency()
     ->getLastRelated()
     ->getNumber()
     ->getOrderUuid()
     ->getPackages()
     ->getRecipient()
     ->getRecipientCurrency()
     ->getRelatedEntities()
     ->getRequests()
     ->getSeller()
     ->getSender()
     ->getServices()
     ->getShipmentPoint()
     ->getShipperAddress()
     ->getShipperName()
     ->getStatuses()
     ->getTariffCode()  
     ->getToLocation()
     ->getTransactedPayment()
     ->getType()        
     ->getUuid()
 ```
### Список методов для установки сущности класса Order
```php
     ->addServices()
     ->setAddresses()
     ->setCdekNumber()
     ->setCities()
     ->setCityCodes()
     ->setComment()
     ->setCurrency()
     ->setDate()
     ->setDateInvoice()
     ->setDeliveryPoint()
     ->setDeliveryRecipientCost()
     ->setDeliveryRecipientCostAdv()
     ->setDeveloperKey()
     ->setFromLocation()
     ->setItemsСostСurrency()
     ->setNumber()
     ->setOrderUuid()
     ->setPackages()
     ->setPackageWeight()
     ->setPostalCodes()
     ->setPrint()
     ->setRecipient()
     ->setRecipientAddress()
     ->setRecipientCityCode()
     ->setRecipientCurrency()
     ->setSeller()
     ->setSender()
     ->setSenderCityCode()
     ->setServices()
     ->setShipmentAddress()
     ->setShipmentCityCode()
     ->setShipmentPoint()
     ->setShipperAddress()
     ->setShipperName()
     ->setTariffCode()
     ->setToLocation()
     ->setType()
     ->setUuid()
     ->withCdekNumber()
     ->withOrderUuid()
     
  ```
  ### Печать квитанции
  Существует два способа получить квитанцию к заказу.
  Первый. Если (как в примере выше) вы запросили ее вместе с созданием заказа. Используя ->setPrint('waybill'). В этом случае информация о заказе будет содержать свойство related_entities	- связанные с заказом сущности. 
  > Это массив, содержащий такие параметры как:
- return_order - возвратный заказ (возвращается для прямого, если заказ не вручен и по нему уже был сформирован возвратный заказ)
- direct_order - прямой заказ (возвращается для возвратного и реверсного заказа)
- waybill - квитанция к заказу (возвращается для заказа, по которому есть сформированная квитанция)
- barcode - ШК места к заказу (возвращается для заказа, по которому есть сформированный ШК места)
- reverse_order - реверсный заказ (возвращается для прямого заказа, если подключен реверс)
- delivery - актуальная договоренность о доставке

> Если ни одна из этих сущностей не привязана к заказу (не запрашивалась квитанция, заказ не возвратный и т.д.) массив будет пустой.


Получить данные о связанных с заказом сущностей можно:
```php
$cdek_client->getOrderInfoByUuid($uuid)->getRelatedEntities();
```
Получить данные о самой новой, последней созданной накладной к заказу можно используя удобный экспресс-метод:
```php
$newest = $cdek_client->getOrderInfoByUuid($uuid)->getLastRelated('waybill');
```
Аргументом функции является строка с названием типа сущности (см. выше). Поскольку мы передали 'waybill' 
getLastRelated метод получает uuid квитанции, который нужно направить в метод getInvoicePdf.
Получить pdf файл с квитанцией можно: 
```php
$cdek_client->getInvoicePdf($newest);
```
Второй способ. Это направить запрос на создание квитанции и получить ее uuid отдельным методом:
```php
$invoice = $cdek_client->setInvoice(Invoice::withOrdersUuid($uuid)); // $uuid - uuid заказа
$invoice_uuid = $invoice->getEntityUuid();
$cdek_client->getInvoicePdf($invoice_uuid);
```
>ВАЖНО! Файл квитанции не всегда будет готов сразу. Как правило, необходимо некоторое время для подготовки квитанции. Если направить запрос на получение квитанции сразу после ее создания вы можете получить ошибку или пустой ответ.

### Список методов для установки сущности класса Invoice
```php
->setOrders()      
->setCopyCount()   
->setType()        
->withOrdersUuid() 
->withCdekNumbers()
```
### Список методов для получения данных сущности класса PrintResponse
```php
$cdek_client->getInvoice($invoice_uuid); // PrintResponse
```
```php
->getOrderUuid()
->getUrl()      
->getCopyCount()
->getLang()     
->getFormat()   
->getStatuses()  
```
### Удаление заказа
Заказы удаляются только по наличию ранее полученного uuid
```php
  $cdek_client->deleteOrder($uuid);
```
> Если все "ок" метод **вернет false**. Если какие-то сложности - возвратит ошибку.
  ### Отмена заказа
Заказы отменяются только до получения статуса "Вручен" или "Не вручен", и только по наличию ранее полученного uuid
```php
  $cdek_client->сancelOrder($uuid);
```

### Регистрация договоренностей о доставке
```php
$cdek_data = $request->except('_token'); // запрос всех данных формы
$agreement = (new Agreement())
            ->setCdekNumber((int) $cdek_data['DispatchNumber'])
            ->setDate($cdek_data['deliveryDate'])
            ->setTimeFrom($cdek_data['timeFrom'])
            ->setTimeTo($cdek_data['timeTo'])
            ->setComment('Позвонить за 2 часа')
            ->setToLocation(
                (new Location())
                    ->setCode((int) $cdek_data['RecCityCode'])
                    ->setAddress($cdek_data['Street'])
                    )
        ;
    
$response = $cdek_client->createAgreement($agreement);
```
Кроме представленных в примере доступно также:
->setUuid() для установки uuid заказа

Ответом будет сущность класса **AntistressStore\CdekSDK2\Entity\Responses\EntityResponse**
Получить uuid созданной договоренности нужно методом:
```php
$response->getEntityUuid();
```
### Получение информации договоренности о доставке
```php
$cdek_client->getAgreement($agreement);
```
### Список методов для получения данных сущности класса AgreementResponse
```php
->getUuid()
->getOrderUuid()
->getCdekNumber()
->getSender()
->getNumber()
->getComment()
  ```
### Регистрация заявки на вызов курьера
```php
$cdek_data = $request->except('_token'); // запрос всех данных формы
$agreement = (new Intakes())
            ->setCdekNumber((int) $cdek_data['DispatchNumber'])
            ->setIntakeDate($cdek_data['IntakeDate'])
            ->setIntakeTimeFrom($cdek_data['timeFrom'])
            ->setIntakeTimeTo($cdek_data['timeTo'])
            ->setName('световой меч джедая') // название товара, груза
            ->setSender((new Contact())
            ->setCompany('Орден джедаев')
            ->setName('Люк Скайоукер')
            ->setPhones('911')
            )
            ->setFromLocation(
                (new Location())
                    ->setCode((int) $cdek_data['RecCityCode'])
                    ->setAddress($cdek_data['Street'])
                    )
        ;
    
$response = $cdek_client->createIntakes($intakes);
```
### Получение заявки на вызов курьера
```php
$cdek_client->getIntakes($uuid);
```
```php
->getIntakeNumber()
->getStatuses()
->getUuid()
->getOrderUuid()
->getCdekNumber()
->getSender()
->getNumber()
->getComment()
->getWeight()
->getLength()
->getWidth()
->getHeight()
->getIntakeDate()
->getIntakeTimeFrom()
->getIntakeTimeTo()
->getLunchTimeFrom()
->getLunchTimeTo()
->getName()
->getNeedCall()
->getFromLocation()
```
### Удаление заявки на вызов курьера
```php
$cdek_client->deleteIntakes($uuid);
```

### Получение информации о переводе наложенного платежа
```php
$date = '2021-03-25';
$orders = $cdek_client->getPayments($date)->getOrders();
// возвращается массив с оплаченными, итерируемся, получаем данные об отдельном чеке
  foreach($orders as $order) {
     $order["uuid"]; // Идентификатор заказа в ИС СДЭК	
     $order["numberOrder"]; // Номер заказа СДЭК	
     $order["imNumber"]; // Номер заказа в ИС Клиента	
  }
```
### Получение информации о чеках
```php
$checks = $cdek_client->getChecks((new Check())
  ->setCdekNumber('123456789')
  ->setDate('2021-03-25')));
// возвращается массив с чеками, итерируемся, получаем данные об отдельном чеке
  foreach($checks as $check) {
    $check->getCdekNumber();
    $check->getOrderUuid();
    $check->getDate();
    $check->getFiscalStorageNumber();
    $check->getDocumentNumber();
    $check->getFiscalSign();
    $check->getType();
    $check->getPaymentInfo();
  }
```
### Подписка на вебхуки (Webhooks)
>'ORDER_STATUS' - событие по статусам
'PRINT_FORM' - готовность печатной формы
```php
$webhook = $cdek_client->setWebhooks(
  (new Webhooks())
  ->setUrl('https://antistress.store')
  ->setType('ORDER_STATUS'));
  $webhook->getEntityUuid();
```
### Получение реестров наложенных платежей
WIP
## Известные проблемы
> - При использовании тестового сервера может приходить ошибка определения города получателя или отправителя. В данном случае ошибка возникает из-за отсутствия ПВЗ с кодом на тестовой среде. Данные на тестовой и боевой среде могут отличаться, так как тестовая среда обновляется гораздо реже боевой. В связи с этим для корректного тестирования информацию по населенным пунктам и ПВЗ необходимо запрашивать и использовать в рамках одной среды.
> - На тестовом сервере иногда приходят внутренние ошибки Internal Error не связанные с правильностью работы sdk.
> - Если запрос на тестовый сервер выполнился с ошибкой, но заказ при этом создался, может произойти ситуация дублирования (неуникальности) uuid или некорректно сформированного заказа, как правило, удалить такой заказ не представляется возможным.

## Лицензия
Автор antistress-store/cdek-sdk-v2 Сергей Гусев.
Данный проект распространяется [под лицензией MIT](LICENSE).
