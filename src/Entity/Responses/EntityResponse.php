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
     * @var array
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
     * @return string
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Get сущность и ее идентификатор.
     *
     * @return string
     */
    public function getEntityUuid()
    {
        return $this->entity['uuid'];
    }

    /**
     * Get сущность и ее идентификатор.
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }
}
