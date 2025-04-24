<?php

/**
 * Copyright (c) 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2;

/**
 * Class Constants.
 */
class Constants
{
    /**
     * Адрес сервиса интеграции.
     *
     * @var string
     */
    public const API_URL = 'https://api.cdek.ru/v2/';

    /**
     * Адрес сервиса интеграции для тестов.
     *
     * @var string
     */
    public const API_URL_TEST = 'https://api.edu.cdek.ru/v2/';

    /**
     * Адрес сервиса интеграции для тестов.
     *
     * @var string
     */
    public const OAUTH_URL = 'oauth/token?parameters';

    /**
     * Аккаунт для тестовой среды.
     *
     * @var string
     */
    public const TEST_ACCOUNT = 'wqGwiQx0gg8mLtiEKsUinjVSICCjtTEP';

    /**
     * Секретный ключ для тестовой среды.
     *
     * @var string
     */
    public const TEST_SECURE = 'RmAmgvSgSl1yirlz9QupbzOJVqhCxcP5';
    /**
     * Хук: статусы.
     *
     * @var string
     */
    public const HOOK_TYPE_STATUS = 'ORDER_STATUS';

    /**
     * Хук: задел на будущее.
     *
     * @var string
     */
    public const HOOK_TYPE_OTHER = 'ANYTHING_OTHER';

    /**
     * Ошибка авторизации.
     *
     * @var string
     */
    public const AUTH_FAIL = 'Аутентификация не удалась, пожалуйста, проверьте переданные логин и пароль';

    /**
     * Параметр типа аутентификации.
     *
     * @var string
     */
    public const AUTH_PARAM_CREDENTIAL = 'client_credentials';

    /**
     * Ключ авторизации: тип аутентификации, доступное значение: client_credentials.
     *
     * @var string
     */
    public const AUTH_KEY_TYPE = 'grant_type';

    /**
     * Ключ авторизации: идентификатор клиента, равен Account.
     *
     * @var string
     */
    public const AUTH_KEY_CLIENT_ID = 'client_id';

    /**
     * Ключ авторизации: секретный ключ клиента, равен Secure password.
     *
     * @var string
     */
    public const AUTH_KEY_SECRET = 'client_secret';

    /**
     * URL для поиска списка ПВЗ.
     *
     * @var string
     */
    public const DELIVERY_POINTS_URL = 'deliverypoints';

    /**
     * URL для расчета стоимости и сроков доставки по конкретному коду тарифа.
     *
     * @var string
     */
    public const CALC_TARIFF_URL = 'calculator/tariff';

    /**
     * URL для расчета стоимости и сроков доставки по всем доступным тарифам.
     *
     * @var string
     */
    public const CALC_TARIFFLIST_URL = 'calculator/tarifflist';

    /**
     * URL для запросов к API договоренностей по времени доставки\приезда курьера, а так же изменять адрес доставки.
     *
     * @var string
     */
    public const COURIER_AGREEMENTS_URL = 'delivery';

    /**
     * URL для запросов к API Регистрация заявки на вызов курьера.
     *
     * @var string
     */
    public const INTAKES_URL = 'intakes';

    /**
     * URL для создания\поиска\удаления заказов.
     *
     * @var string
     */
    public const ORDERS_URL = 'orders';

    /**
     * URL для получения детальной информации о населенных пунктах.
     *
     * @var string
     */
    public const CITIES_URL = 'location/cities';

    /**
     * URL для получения детальной информации о регионах.
     *
     * @var string
     */
    public const REGIONS_URL = 'location/regions';

    /**
     * URL для поиска города по неполному названию.
     *
     * @var string
     */
    public const CITIES_SUGGEST_URL = 'location/suggest/cities';

    /**
     * URL для запросов к API на формирование ШК.
     *
     * @var string
     */
    public const BARCODES_URL = 'print/barcodes';

    /**
     * URL для запросов к API на формирование квитанции.
     *
     * @var string
     */
    public const INVOICE_URL = 'print/orders';

    /**
     * URL для запросов к API.
     *
     * @var string
     */
    public const WEBHOOKS_URL = 'webhooks';

    /**
     * Список корректных параметров, которые разрешено передавать для поиска офисов.
     *
     * @var array
     */
    public const DELIVERY_POINTS_FILTER = [
        'postal_code' => '',
        'city_code' => '',
        'type' => '',
        'country_code' => '',
        'region_code' => '',
        'have_cashless' => '',
        'have_cash' => '',
        'allowed_cod' => '',
        'is_dressing_room' => '',
        'weight_max' => '',
        'lang' => '',
        'take_only' => '',
        'is_handout' => '',
        'is_reception' => '',
        'size' => '',
        'page' => '',
    ];

    /**
     * Список корректных параметров, которые разрешено передавать для поиска населенных пунктов.
     *
     * @var array
     */
    public const CITIES_FILTER = [
        'country_codes' => '',
        'region_code' => '',
        'kladr_region_code' => '',
        'fias_region_guid' => '',
        'kladr_code' => '',
        'fias_guid' => '',
        'postal_code' => '',
        'code' => '',
        'city' => '',
        'size' => '',
        'page' => '',
        'lang' => '',
    ];

    /**
     * Список корректных параметров, которые разрешено передавать для поиска населенных пунктов по названию.
     *
     * @var array
     */
    public const CITIES_SUGGEST_FILTER = [
        'country_code' => '',
        'name' => '',
    ];

    /**
     * Список корректных параметров, которые разрешено передавать для поиска регионов.
     *
     * @var array
     */
    public const REGIONS_FILTER = [
        'country_codes' => '',
        'region_code' => '',
        'kladr_region_code' => '',
        'fias_region_guid' => '',
        'size' => '',
        'page' => '',
        'lang' => '',
    ];

    /**
     * Сопоставление полей ответа и классов.
     *
     * @var array
     */
    public const SDK_CLASSES = [
        'to_location' => 'Location',
        'from_location' => 'Location',
        'location' => 'Location',
        'delivery_recipient_cost' => 'Money',
        'delivery_detail' => 'DeliveryDetail',
        'sender' => 'Contact',
        'seller' => 'Seller',
        'recipient' => 'Contact',
        'payment' => 'Money',
    ];

    /**
     * Сопоставление полей ответа, содержащих массивы классов.
     *
     * @var array
     */
    public const SDK_ARRAY_RESPONSE_CLASSES = [
        'delivery_recipient_cost_adv' => 'Threshold',
        'statuses' => 'Statuses',
        'services' => 'Services',
        'packages' => 'Packages',
        'items' => 'Items',
        'office_image_list' => 'OfficeImage',
        'work_time_list' => 'WorkTimeList',
        'requests' => 'Requests',
        'phones' => 'Phone',
        'check_info' => 'Check',
    ];

    public const SERVICE_CODES = [
        'INSURANCE' => 'Страхование',
        'TAKE_SENDER' => 'Забор в городе отправителе',
        'DELIV_RECEIVER' => 'Доставка в городе получателе',
        'TRYING_ON' => 'Примерка на дому',
        'PART_DELIV' => 'Частичная доставка',
        'INSPECTION_CARGO' => 'Осмотр вложения',
        'REVERSE' => 'Реверс',
        'DANGER_CARGO' => 'Опасный груз',
        'PACKAGE_1' => 'Упаковка 1',
        'PACKAGE_2' => 'Упаковка 2',
        'WAIT_FOR_RECEIVER' => 'Ожидание более 15 мин. у получателя',
        'WAIT_FOR_SENDER' => 'Ожидание более 15 мин. у отправителя',
        'REPEATED_DELIVERY' => 'Повторная поездка',
        'SMS' => 'Смс уведомление',
        'GET_UP_FLOOR_BY_HAND' => 'Подъем на этаж ручной',
        'GET_UP_FLOOR_BY_ELEVATOR' => 'Подъем на этаж лифтом',
        'CALL' => 'Прозвон',
        'THERMAL_MODE' => 'Тепловой режим',
        'COURIER_PACKAGE_A2' => 'Пакет курьерский А2',
        'SECURE_PACKAGE_A2' => 'Сейф пакет А2',
        'SECURE_PACKAGE_A3' => 'Сейф пакет А3',
        'SECURE_PACKAGE_A4' => 'Сейф пакет А4',
        'SECURE_PACKAGE_A5' => 'Сейф пакет А5',
        'NOTIFY_ORDER_CREATED' => 'Уведомление о создании заказа в СДЭК',
        'NOTIFY_ORDER_DELIVERY' => 'Уведомление о приеме заказа на доставку',
        'CARTON_BOX_XS' => 'Коробка XS (0,5 кг 17х12х9 см)',
        'CARTON_BOX_S' => 'Коробка S (2 кг 21х20х11 см)',
        'CARTON_BOX_M' => 'Коробка M (5 кг 33х25х15 см)',
        'CARTON_BOX_L' => 'Коробка L (12 кг 34х33х26 см)',
        'CARTON_BOX_500GR' => 'Коробка (0,5 кг 17х12х10 см)',
        'CARTON_BOX_1KG' => 'Коробка (1 кг 24х17х10 см)',
        'CARTON_BOX_2KG' => 'Коробка (2 кг 34х24х10 см)',
        'CARTON_BOX_3KG' => 'Коробка (3 кг 24х24х21 см)',
        'CARTON_BOX_5KG' => 'Коробка (5 кг 40х24х21 см)',
        'CARTON_BOX_10KG' => 'Коробка (10 кг 40х35х28 см)',
        'CARTON_BOX_15KG' => 'Коробка (15 кг 60х35х29 см)',
        'CARTON_BOX_20KG' => 'Коробка (20 кг 47х40х43 см)',
        'CARTON_BOX_30KG' => 'Коробка (30 кг 69х39х42 см)',
        'BUBBLE_WRAP' => 'Воздушно-пузырчатая пленка',
        'WASTE_PAPER' => 'Макулатурная бумага',
        'CARTON_FILLER' => 'Прессованный картон "филлер" (55х14х2,3 см)',
        'BAN_ATTACHMENT_INSPECTION' => 'Запрет осмотра вложения',
    ];

    /**
     * Список ошибок.
     *
     * @var array
     */
    public const ERRORS = [
        'v2_internal_error' => 'Запрос выполнился с системной ошибкой',
        'v2_similar_request_still_processed' => 'Предыдущий запрос такого же типа над этой же сущностью еще не выполнился',
        'v2_bad_request' => 'Передан некорректный запрос',
        'v2_invalid_format' => 'Передано некорректное значение',
        'v2_field_is_empty' => 'Не передано обязательное поле',
        'v2_parameters_empty' => 'Все параметры запроса пустые или не переданы',
        'v2_invalid_value_type' => 'Передан некорректный тип данных',
        'v2_entity_not_found' => 'Сущность (заказ, заявка и т.д.) с указанным идентификатором не существует либо удалена',
        'v2_entity_forbidden' => 'Сущность (заказ, заявка и т.д.) с указанным идентификатором существует, но принадлежит другому клиенту',
        'v2_entity_invalid' => 'Сущность (заказ, заявка и т.д.) с указанным идентификатором существует, но некорректна',
        'v2_order_not_found' => 'Заказ с указанным номером не существует либо удален',
        'v2_order_forbidden' => 'Заказ с указанным номером существует, но принадлежит другому клиенту',
        'v2_order_number_empty' => 'Не переданы номер и идентификатор заказа',
        'v2_shipment_address_multivalued' => 'Одновременно переданы ПВЗ отправителя и адрес отправителя. Необходимо указать 1 параметр',
        'v2_delivery_address_multivalued' => 'Одновременно переданы ПВЗ получателя и адрес получателя. Необходимо указать 1 параметр.',
        'v2_sender_location_not_recognized' => 'Не удалось определить город отправителя',
        'v2_recipient_location_not_recognized' => 'Не удалось определить город получателя',
        'v2_number_items_is_more_126' => 'Количество позиций товаров в заказе свыше 126',
        'orders_number_is_empty' => 'Все заказы с указанными номерами и идентификаторами некорректны',
        'shipment_location_is_not_recognized' => 'Передан некорректный код ПВЗ отправителя',
        'delivery_location_is_not_recognized' => 'Передан некорректный код ПВЗ получателя',
        'v2_entity_not_found_im_number' => 'Сущность с указанным идентификатором не существует либо удалена',
        'v2_order_location_from_and_shipment_point_empty' => 'Адрес отправителя и ПВЗ отправителя пустые',
        'v2_order_location_to_and_delivery_point_empty' => 'Адрес получателя и ПВЗ получателя пустые',
        'v2_number_items_is_more_126' => 'Позиций в товаре более 126',
        'v2_package_id_is_empty' => 'Не передан идентификатор уже существующей упаковки заказа',
        'v2_required_param_empty' => 'Не заполнено обязательное поле',
        'v2_city_can_not_be_changed' => 'Передан новый город в адресе доставки (для регистрации договоренности)',
        'v2_impossible_register_date' => 'Истинный режим переданного заказа - "До постамата"',
        'v2_intake_exists_by_order' => 'К переданному заказу уже привязана заявка',
        'v2_intake_exists_by_date_address' => 'На переданную дату и в переданный адрес уже есть заявка',
        'v2_webhook_type_incorrect' => 'Передан некорректный тип события',
        'v2_entity_empty' => 'Все заказы с указанными номерами и идентификаторами некорректны',
        'v2_wrong_interval' => 'Передан некорректный промежуток времени',
        'v2_entity_expired' => 'Истек срок хранения квитанции с указанным идентификатором',
        'v2_entity_empty' => 'Квитанция с указанным идентификатором не сформировалась, так как все заказы некорректны',
        'v2_entity_expired' => 'Истек срок хранения печатной формы с указанным идентификатором',
        'v2_entity_empty' => 'Печатная форма с указанным идентификатором не сформировалась, так как все заказы некорректны',
        'v2_unable_add_service' => 'Не удалось добавить услугу к заказу.',
    ];
}
