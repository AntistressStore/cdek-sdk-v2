<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

/**
 * Class EntityResponse Информация о сущности.
 */
class EntityResponse extends Source
{
    /**
     * Идентификатор запроса в ИС СДЭК.
     *
     * @var RequestsResponse[]
     */
    protected $requests;

    /**
     * Сущность и ее идентификатор.
     *
     * @var array
     */
    protected $entity;

    /**
     * Получить идентификатор запроса в ИС СДЭК.
     *
     * @return RequestsResponse[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Получить сущность и ее идентификатор.
     *
     * @return string
     */
    public function getEntityUuid()
    {
        return $this->entity['uuid'];
    }

    /**
     * Получить массив сущности.
     *
     * @return array
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
