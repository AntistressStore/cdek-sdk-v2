<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

class DeliveryDetailResponse extends Source
{
    /** @var string - Дата доставки */
    protected $date;
    /** @var string - Получатель при доставке */
    protected $recipient_name;
    /** @var float - Сумма наложенного платежа, которую взяли с получателя, в валюте страны получателя с учетом частичной доставки */
    protected $payment_sum;
    /** @var array - Тип оплаты наложенного платежа получателем */
    protected $payment_info;

    /**
     * Получает параметр - date.
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Получает параметр - recipient_name.
     */
    public function getRecipientName()
    {
        return $this->recipient_name;
    }

    /**
     * Получает параметр - payment_sum.
     */
    public function getPaymentSum()
    {
        return $this->payment_sum;
    }

    /**
     * Получает параметр - payment_info.
     */
    public function getPaymentInfo()
    {
        return $this->payment_info;
    }
}
