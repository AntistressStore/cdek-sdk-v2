<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

/**
 * Class OfficeImageResponse
 * Фото ПВЗ.
 */
class OfficeImageResponse extends Source
{
    protected $url;
    protected $number;

    /**
     * Получает номер фото.
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Получает ссылку на фото и преобразует ее в адрес фото.
     */
    public function getUrl()
    {
        return str_replace('edu.api-pvz.imageRepository.service.cdek.tech:8008', 'pvzimage.cdek.ru', $this->url);
    }
}
