<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

trait CommonTrait
{
    /**
     * Идентификатор.
     *
     * @var string
     */
    protected $uuid;

    /**
     * Номер заказа в ИС Клиента.
     *
     * @var string
     */
    protected $number;

    /**
     * Идентификатор заказа.
     *
     * @var string
     */
    protected $order_uuid;

    /**
     * Номер заказа СДЭК.
     *
     * @var int
     */
    protected $cdek_number;

    /**
     * Отправитель.
     *
     * @var Contact
     */
    protected $sender;

    /**
     * Комментарий к заказу.
     *
     * @var string
     */
    protected $comment;

    /**
     * Устанавливает идентификатор.
     *
     * @param string $uuid Идентификатор заявки
     *
     * @return self
     */
    public function setUuid(string $uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Устанавливает идентификатор заказа.
     *
     * @param string $order_uuid Идентификатор заказа
     *
     * @return self
     */
    public function setOrderUuid(string $order_uuid)
    {
        $this->order_uuid = $order_uuid;

        return $this;
    }

    /**
     * Устанавливает номер заказа СДЭК.
     *
     * @param int $cdek_number Номер заказа СДЭК
     *
     * @return self
     */
    public function setCdekNumber(int $cdek_number)
    {
        $this->cdek_number = $cdek_number;

        return $this;
    }

    /**
     * Экспресс-метод установки order_uuid.
     *
     * @return self
     */
    public static function withOrderUuid(string $order_uuid)
    {
        $instance = new self();

        $instance->order_uuid = $order_uuid;

        return $instance;
    }

    /**
     * Экспресс-метод установки cdek_number.
     *
     * @return self
     */
    public static function withCdekNumber(string $cdek_number)
    {
        $instance = new self();

        $instance->cdek_number = $cdek_number;

        return $instance;
    }

    /**
     * Получить значение - идентификатор заявки.
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Получить значение - идентификатор заказа.
     *
     * @return string
     */
    public function getOrderUuid()
    {
        return $this->order_uuid;
    }

    /**
     * Получить значение - номер заказа СДЭК.
     *
     * @return int
     */
    public function getCdekNumber()
    {
        return $this->cdek_number;
    }

    /**
     * Получить значение - отправитель.
     *
     * @return Contact
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Получить параметр - номер заказа в ИС Клиента.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Получить параметр - комментарий к заказу.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Установить параметр - комментарий к заказу.
     *
     * @param string $comment комментарий к заказу
     *
     * @return self
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;

        return $this;
    }
}
