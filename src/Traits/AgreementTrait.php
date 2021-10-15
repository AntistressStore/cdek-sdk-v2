<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

use AntistressStore\CdekSDK2\Entity\Requests\Location;

trait AgreementTrait
{
    /**
     * Дата доставки, согласованная с получателем
     *
     * @var string
     */
    protected $date;

    /**
     * Время доставки С, согласованное с получателем (формат H:i).
     *
     * @var string
     */
    protected $time_from;

    /**
     * Время доставки ПО, согласованное с получателем (формат H:i).
     *
     * @var string
     */
    protected $time_to;

    /**
     * Новый код ПВЗ СДЭК, на который будет доставлена посылка (если требуется изменить)
     * Не может быть заполнено одновременно с to_location.
     *
     * @var string
     */
    protected $delivery_point;

    /**
     * Новый адрес доставки (если требуется изменить)
     * Не может быть заполнено одновременно с delivery_point.
     *
     * @var Location
     */
    protected $to_location;

    /**
     * Устанавливает дата доставки, согласованная с получателем
     *
     * @param string $date Дата доставки, согласованная с получателем
     *                     дата в формате 'Y-m-d', пример: 2001-02-03
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Устанавливает время доставки С, согласованное с получателем (формат H:i).
     *
     * @param string $time_from Время доставки С, согласованное с получателем (формат H:i)
     *                          время в формате ISO 8601: hh:mm, пример: 18:15
     *
     * @return self
     */
    public function setTimeFrom(string $time_from)
    {
        $this->time_from = $time_from;

        return $this;
    }

    /**
     * Устанавливает время доставки ПО, согласованное с получателем (формат H:i).
     *
     * @param string $time_to Время доставки ПО, согласованное с получателем (формат H:i)
     *
     * @return self
     */
    public function setTimeTo(string $time_to)
    {
        $this->time_to = $time_to;

        return $this;
    }

    /**
     * Устанавливает значение delivery_point.
     *
     * @param string $delivery_point
     *
     * @return self
     */
    public function setDeliveryPoint($delivery_point)
    {
        if (!isset($this->to_location)) {
            $this->delivery_point = $delivery_point;

            return $this;
        }
        throw new \InvalidArgumentException('Код ПВЗ delivery_point 
            нельзя передавать одновременно с параметром Адрес доставки');
    }

    /**
     * Устанавливает to_location - не может быть заполнено одновременно с delivery_point.
     *
     * @param Location $to_location не может быть заполнено одновременно с delivery_point
     *
     * @return self
     */
    public function setToLocation(Location $to_location)
    {
        if (!isset($this->delivery_point)) {
            $this->to_location = $to_location;

            return $this;
        }
        throw new \InvalidArgumentException('Адрес доставки
            Нельзя передавать одновременно с параметром кода ПВЗ delivery_point');
    }
}
