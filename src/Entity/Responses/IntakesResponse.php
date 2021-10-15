<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\IntakesTrait;
use AntistressStore\CdekSDK2\Traits\{CommonTrait, PackageTrait};

/**
 * Class Intakes.
 */
class IntakesResponse extends Source
{
    use CommonTrait, PackageTrait {
        CommonTrait::getComment insteadof PackageTrait;
        CommonTrait::setComment insteadof PackageTrait; }
    use IntakesTrait;

    /**
     * Номер заявки СДЭК на вызов курьера.
     *
     * @var string
     */
    protected $intake_number;

    /**
     * Статус по заявке на вызов курьера.
     *
     * @var StatusesResponse[]
     */
    protected $statuses;

    /**
     * Получить параметр - номер заявки СДЭК на вызов курьера.
     *
     * @return string
     */
    public function getIntakeNumber()
    {
        return $this->intake_number;
    }

    /**
     * Получить статусы по заявке на вызов курьера.
     *
     * @return StatusesResponse[]
     */
    public function getStatuses()
    {
        return $this->statuses;
    }
}
