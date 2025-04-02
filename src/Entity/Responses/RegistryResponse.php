<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

/**
 * Class RegistryResponse
 * Информация о реестре НП
 */
class RegistryResponse extends Source
{
    /**
     * Список реестров НП
     *
     * @var array
     */
    protected $registries;

    /**
     * Получить список реестров НП
     *
     * @return array
     */
    public function getRegistries()
    {
        return $this->registries;
    }
}
