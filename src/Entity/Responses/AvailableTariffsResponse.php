<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

class AvailableTariffsResponse extends Source
{
    /**
     * Имя сервиса (тарифа).
     *
     * @var string|null
     */
    protected $tariff_name;

    /**
     * Минимальный вес отправления.
     *
     * @var float|null
     */
    protected $weight_min;

    /**
     * Максимальный вес отправления.
     *
     * @var float|null
     */
    protected $weight_max;

    /**
     * Максимальный расчетный вес.
     *
     * @var float|null
     */
    protected $weight_calc_max;

    /**
     * Минимальная длина упаковки.
     *
     * @var int|null
     */
    protected $length_min;

    /**
     * Максимальная длина упаковки.
     *
     * @var int|null
     */
    protected $length_max;

    /**
     * Минимальная ширина упаковки.
     *
     * @var int|null
     */
    protected $width_min;

    /**
     * Максимальная ширина упаковки.
     *
     * @var int|null
     */
    protected $width_max;

    /**
     * Минимальная высота упаковки.
     *
     * @var int|null
     */
    protected $height_min;

    /**
     * Максимальная высота упаковки.
     *
     * @var int|null
     */
    protected $height_max;

    /**
     * Список доступных типов заказов для тарифа (пустой список означает, что доступны все).
     *
     * @var array
     */
    protected $order_types = [];

    /**
     * Применимо с контрагентами плательщиками.
     *
     * Возможные значения:
     * - LEGAL_ENTITY (юридическое лицо)
     * - INDIVIDUAL (физическое лицо)
     *
     * Пустой список означает, что доступны все.
     *
     * @var array
     */
    protected $payer_contragent_type = [];

    /**
     * Применимо с контрагентами отправителями.
     *
     * Возможные значения:
     * - LEGAL_ENTITY (юридическое лицо)
     * - INDIVIDUAL (физическое лицо)
     *
     * Пустой список означает, что доступны все.
     *
     * @var array
     */
    protected $sender_contragent_type = [];

    /**
     * Применимо с контрагентами получателями.
     *
     * Возможные значения:
     * - LEGAL_ENTITY (юридическое лицо)
     * - INDIVIDUAL (физическое лицо)
     *
     * Пустой список означает, что доступны все.
     *
     * @var string[]
     */
    protected $recipient_contragent_type = [];

    /**
     * Режимы доставки.
     *
     * @var TariffDeliveryModeResponse[]
     */
    protected $delivery_modes = [];

    /**
     * Доп. типы заказа, применимые к тарифу.
     *
     * @var TariffAdditionalOrderTypesParamResponse|null
     */
    protected $additional_order_types_param;

    /**
     * Получить параметр - имя сервиса (тарифа).
     *
     * @return string|null
     */
    public function getTariffName()
    {
        return $this->tariff_name;
    }

    /**
     * Получить параметр - минимальный вес отправления.
     *
     * @return float|null
     */
    public function getWeightMin()
    {
        return $this->weight_min;
    }

    /**
     * Получить параметр - максимальный вес отправления.
     *
     * @return float|null
     */
    public function getWeightMax()
    {
        return $this->weight_max;
    }

    /**
     * Получить параметр - максимальный расчетный вес.
     *
     * @return float|null
     */
    public function getWeightCalcMax()
    {
        return $this->weight_calc_max;
    }

    /**
     * Получить параметр - минимальная длина упаковки.
     *
     * @return int|null
     */
    public function getLengthMin()
    {
        return $this->length_min;
    }

    /**
     * Получить параметр - максимальная длина упаковки.
     *
     * @return int|null
     */
    public function getLengthMax()
    {
        return $this->length_max;
    }

    /**
     * Получить параметр - минимальная ширина упаковки.
     *
     * @return int|null
     */
    public function getWidthMin()
    {
        return $this->width_min;
    }

    /**
     * Получить параметр - максимальная ширина упаковки.
     *
     * @return int|null
     */
    public function getWidthMax()
    {
        return $this->width_max;
    }

    /**
     * Получить параметр - минимальная высота упаковки.
     *
     * @return int|null
     */
    public function getHeightMin()
    {
        return $this->height_min;
    }

    /**
     * Получить параметр - максимальная высота упаковки.
     *
     * @return int|null
     */
    public function getHeightMax()
    {
        return $this->height_max;
    }

    /**
     * Получить параметр - список доступных типов заказов для тарифа.
     *
     * Пустой список означает, что доступны все.
     *
     * @return array
     */
    public function getOrderTypes()
    {
        return $this->order_types;
    }

    /**
     * Получить параметр - типы контрагента плательщика.
     *
     * Пустой список означает, что доступны все.
     *
     * Возможные значения:
     * - LEGAL_ENTITY (юридическое лицо)
     * - INDIVIDUAL (физическое лицо)
     *
     * @return array
     */
    public function getPayerContragentType()
    {
        return $this->payer_contragent_type;
    }

    /**
     * Получить параметр - типы контрагента отправителя.
     *
     * Пустой список означает, что доступны все.
     *
     * Возможные значения:
     * - LEGAL_ENTITY (юридическое лицо)
     * - INDIVIDUAL (физическое лицо)
     *
     * @return array
     */
    public function getSenderContragentType()
    {
        return $this->sender_contragent_type;
    }

    /**
     * Получить параметр - типы контрагента получателя.
     *
     * Пустой список означает, что доступны все.
     *
     * Возможные значения:
     * - LEGAL_ENTITY (юридическое лицо)
     * - INDIVIDUAL (физическое лицо)
     *
     * @return array
     */
    public function getRecipientContragentType()
    {
        return $this->recipient_contragent_type;
    }

    /**
     * Получить параметр - режимы доставки.
     *
     * @return TariffDeliveryModeResponse[]
     */
    public function getDeliveryModes()
    {
        return $this->delivery_modes;
    }

    /**
     * Получить параметр - доп. типы заказа, применимые к тарифу.
     *
     * @return TariffAdditionalOrderTypesParamResponse|null
     */
    public function getAdditionalOrderTypesParam()
    {
        return $this->additional_order_types_param;
    }
}
