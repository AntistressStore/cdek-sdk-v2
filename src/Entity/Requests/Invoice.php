<?php
/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

/**
 * Class Invoices квитанции к заказу.
 */
class Invoice extends Source
{
    /**
     * Список заказов.
     *
     * @var Order[]
     */
    protected $orders;

    /**
     * Число копий. По умолчанию 1.
     *
     * @var int
     */
    protected $copy_count;

    /**
     * Число копий. По умолчанию 1.
     *
     * @var string
     */
    protected $type;

    /**
     * Установить параметр - список заказов.
     *
     * @param Order $orders Список заказов
     *
     * @return self
     */
    public function setOrders(Order $orders)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Установить параметр - число копий. По умолчанию 1.
     *
     * @param int $copy_count Число копий. По умолчанию 1
     *
     * @return self
     */
    public function setCopyCount(int $copy_count = 1)
    {
        $this->copy_count = $copy_count;

        return $this;
    }

    /**
     * Установить параметр - Форма квитанции.
     *
     * @param string $type форма квитанции
     *
     * @return self
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Экспресс-метод установки адреса.
     *
     * @param array|string $orders_uuid - массив с orders_uuid или один uuid строкой
     *
     * @return self
     */
    public static function withOrdersUuid($orders_uuid)
    {
        $instance = new static();
        if (is_array($orders_uuid)) {
            foreach ($orders_uuid as $order_uuid) {
                $instance->orders[] = Order::withOrderUuid($order_uuid);
            }
        } else {
            $instance->orders[] = Order::withOrderUuid($orders_uuid);
        }

        return $instance;
    }

    /**
     * Экспресс-метод установки адреса.
     *
     * @param array|string $cdek_numbers - массив с orders_uuid или один uuid строкой
     *
     * @return self
     */
    public static function withCdekNumbers($cdek_numbers)
    {
        $instance = new static();
        if (is_array($cdek_numbers)) {
            foreach ($cdek_numbers as $cdek_number) {
                $instance->orders[] = Order::withCdekNumber($cdek_number);
            }
        } else {
            $instance->orders[] = Order::withCdekNumber($cdek_numbers);
        }

        return $instance;
    }
}
