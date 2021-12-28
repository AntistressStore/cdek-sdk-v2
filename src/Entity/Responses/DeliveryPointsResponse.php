<?php

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\DeliveryPointsTrait;

/**
 * Список действующих офисов СДЭК.
 */
class DeliveryPointsResponse extends Source
{
    use DeliveryPointsTrait;
    /**
     * Название ПВЗ.
     *
     * @var string|null
     */
    protected $name;

    /**
     * Код ПВЗ.
     *
     * @var string|null
     */
    protected $code;

    /**
     * Адрес ПВЗ.
     *
     * @var array
     */
    protected $location;

    /**
     * Режим работы, строка вида «пн-пт 9-18, сб 9-16».
     *
     * @var string|null
     */
    protected $work_time;

    /** График работы на неделю. */
    protected $work_time_list;

    /** Исключения в графике работы офиса. */
    protected $work_time_exceptions;

    /**
     * Примечание по ПВЗ.
     *
     * @var string|null
     */
    protected $note;

    /**
     * Принадлежность ПВЗ компании.
     *
     * @var string|null
     */
    protected $owner_code;

    /**
     * Ближайшая станция/остановка транспорта.
     *
     * @var string|null
     */
    protected $nearest_station;

    /**
     * Ближайшая станция метро.
     *
     * @var string|null
     */
    protected $nearest_metro_station;

    /**
     * Ссылка на данный ПВЗ на сайте СДЭК.
     *
     * @var string|null
     */
    protected $site;

    /**
     * Адрес электронной почты.
     *
     * @var string|null
     */
    protected $email;

    /**
     * Описание местоположения.
     *
     * @var string|null
     */
    protected $address_comment;

    /** Все фото офиса. */
    protected $office_image_list;

    /**
     * Перечень максимальных размеров ячеек (только для type = POSTAMAT).
     *
     * @var array
     */
    protected $dimensions;

    /**
     * Наличие зоны фулфилмента.
     *
     * @var bool
     */
    protected $fulfillment;

    /**
     * Номера телефона.
     *
     * @var array
     */
    protected $phones;

    /**
     * Тип пункта выдачи.
     *
     * @var string|null
     */
    protected $type;

    /**
     * Получить параметр - название ПВЗ.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Получить параметр - адрес ПВЗ.
     *
     * @return LocationResponse
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Получить параметр - режим работы, строка вида «пн-пт 9-18, сб 9-16».
     *
     * @return string|null
     */
    public function getWorkTime()
    {
        return $this->work_time;
    }

    /**
     * Получить параметр - график работы на неделю.
     *
     * @return WorkTimeListResponse[]
     */
    public function getWorkTimeList()
    {
        return $this->work_time_list;
    }

    /**
     * Получить параметр - исключения в графике работы офиса.
     */
    public function getWorkTimeExceptions()
    {
        return $this->work_time_exceptions;
    }

    /**
     * Получить параметр - примечание по ПВЗ.
     *
     * @return string|null
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Получить параметр - принадлежность ПВЗ компании.
     *
     * @return string|null
     */
    public function getOwnerCode()
    {
        return $this->owner_code;
    }

    /**
     * Получить параметр - ближайшая станция/остановка транспорта.
     *
     * @return string|null
     */
    public function getNearestStation()
    {
        return $this->nearest_station;
    }

    /**
     * Получить параметр - ближайшая станция метро.
     *
     * @return string|null
     */
    public function getNearestMetroStation()
    {
        return $this->nearest_metro_station;
    }

    /**
     * Получить параметр - ссылка на данный ПВЗ на сайте СДЭК.
     *
     * @return string|null
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Получить параметр - адрес электронной почты.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Получить параметр - описание местоположения.
     *
     * @return string|null
     */
    public function getAddressComment()
    {
        return $this->address_comment;
    }

    /**
     * Получить параметр - все фото офиса.
     */
    public function getOfficeImageList()
    {
        return $this->office_image_list;
    }

    /**
     * Получить параметр - перечень максимальных размеров ячеек (только для type = POSTAMAT).
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Получить параметр - код ПВЗ.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Получить номера телефона
     *
     * @return PhoneResponse[]
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Получить тип пункта выдачи
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }
}
