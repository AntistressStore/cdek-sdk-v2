<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

use AntistressStore\CdekSDK2\Entity\Requests\Item;

trait PackageTrait
{
    /**
     * Номер упаковки.
     *
     * @var string
     */
    protected $number;

    /**
     * Общий вес (в граммах).
     *
     * @var int
     */
    protected $weight;

    /**
     * Габариты упаковки. Длина (в сантиметрах).
     *
     * @var int
     */
    protected $length;

    /**
     * Габариты упаковки. Ширина (в сантиметрах).
     *
     * @var int
     */
    protected $width;

    /**
     * Габариты упаковки. Высота (в сантиметрах).
     *
     * @var int
     */
    protected $height;

    /**
     * Комментарий к упаковке.
     *
     * @var string
     */
    protected $comment;

    /**
     * Позиции товаров в упаковке.
     *
     * @var Item[]
     */
    protected $items;

    /**
     * Устанавливает номер упаковки.
     *
     * @param string $number Номер упаковки
     *
     * @return self
     */
    public function setNumber(string $number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Устанавливает позиции товаров в упаковке.
     *
     * @param Item[] $items Массив Item Позиции товаров в упаковке
     *
     * @return self
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Получить значение - общий вес (в граммах).
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Экспресс-метод установки адреса.
     *
     * @param int $weight общий вес (в граммах)
     *
     * @return self
     */
    public static function withWeight($weight)
    {
        $instance = new self();

        $instance->weight = $weight;

        return $instance;
    }

    /**
     * Установить значение - общий вес (в граммах).
     *
     * @param int $weight общий вес (в граммах)
     *
     * @return self
     */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Получить значение - габариты упаковки. Длина (в сантиметрах).
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Установить значение - габариты упаковки. Длина (в сантиметрах).
     *
     * @param int $length Габариты упаковки. Длина (в сантиметрах).
     *
     * @return self
     */
    public function setLength(int $length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Получить значение - габариты упаковки. Ширина (в сантиметрах).
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Установить значение - габариты упаковки. Ширина (в сантиметрах).
     *
     * @param int $width Габариты упаковки. Ширина (в сантиметрах).
     *
     * @return self
     */
    public function setWidth(int $width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Получить значение - габариты упаковки. Высота (в сантиметрах).
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Установить значение - габариты упаковки. Высота (в сантиметрах).
     *
     * @param int $height Габариты упаковки. Высота (в сантиметрах).
     *
     * @return self
     */
    public function setHeight(int $height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Получить значение - комментарий к упаковке.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Установить значение - комментарий к упаковке.
     *
     * @param string $comment комментарий к упаковке
     *
     * @return self
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;

        return $this;
    }
}
