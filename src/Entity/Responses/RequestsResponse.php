<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

/**
 * Class Requests Информация о запросе/запросах над заказом
 */
class RequestsResponse extends Source
{
    /**
     * Идентификатор запроса в ИС СДЭК.
     *
     * @var string
     */
    protected $request_uuid;

    /**
     * Причина недозвона.
     *
     * @var string
     */
    protected $type;

    /**
     * Дата и время установки текущего состояния запроса (формат yyyy-MM-dd'T'HH:mm:ssZ).
     *
     * @var string
     */
    protected $date_time;

    /**
     * Текущее состояние запроса.
     *
     * @var string
     */
    protected $state;

    /**
     * Ошибки, возникшие в ходе выполнения запроса.
     *
     * @var array
     */
    protected $errors;

    /**
     * Предупреждения, возникшие в ходе выполнения запроса.
     *
     * @var array
     */
    protected $warnings;

    /**
     * Получить идентификатор запроса в ИС СДЭК.
     *
     * @return string
     */
    public function getRequestUuid()
    {
        return $this->request_uuid;
    }

    /**
     * Получить причина недозвона.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Получить дата и время установки текущего состояния запроса (формат yyyy-MM-dd'T'HH:mm:ssZ).
     *
     * @return string
     */
    public function getDateTime()
    {
        return $this->date_time;
    }

    /**
     * Получить текущее состояние запроса.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Получить ошибки, возникшие в ходе выполнения запроса.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Получить предупреждения, возникшие в ходе выполнения запроса.
     *
     * @return array
     */
    public function getWarnings()
    {
        return $this->warnings;
    }
}
