<?php
/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\CommonTrait;

/**
 * Class Check.
 * используется для получения информации о чеке по заказу или за выбранный день.
 */
class CheckResponse extends Source
{
    use CommonTrait;

    /**
     * Дата, за которую необходимо вернуть данные по чекам (дата в формате ISO 8601: YYYY-MM-DD).
     *
     * @var string
     */
    protected $date;

    /**
     * Номер фискального накопителя.
     *
     * @var string
     */
    protected $fiscal_storage_number;

    /**
     * Порядковый номер фискального документа.
     *
     * @var string
     */
    protected $document_number;

    /**
     * Фискальный признак документа.
     *
     * @var string
     */
    protected $fiscal_sign;

    /**
     * Тип чека.
     *
     * @var string
     */
    protected $type;

    /**
     * Тип чека.
     *
     * @var array
     */
    protected $payment_info;

    /**
     * Получить параметр - дата, за которую необходимо вернуть данные по чекам (дата в формате ISO 8601: YYYY-MM-DD).
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Получить параметр - номер фискального накопителя.
     *
     * @return string
     */
    public function getFiscalStorageNumber()
    {
        return $this->fiscal_storage_number;
    }

    /**
     * Получить параметр - порядковый номер фискального документа.
     *
     * @return string
     */
    public function getDocumentNumber()
    {
        return $this->document_number;
    }

    /**
     * Получить параметр - порядковый номер фискального документа.
     *
     * @return string
     */
    public function getFiscalSign()
    {
        return $this->fiscal_sign;
    }

    /**
     * Получить параметр - тип чека.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Получить параметр - тип чека.
     *
     * @return array
     */
    public function getPaymentInfo()
    {
        return $this->payment_info;
    }
}
