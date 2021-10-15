<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

/**
 * Class Barcodes.
 */
class Barcode extends Invoice
{
    /**
     * Формат печати. Может принимать значения: A4, A5, A6. По умолчанию A4.
     *
     * @var string
     */
    public $format;

    /**
     * Язык печатной формы. Возможные языки в кодировке ISO - 639-3:.
     *
     * @var string
     */
    public $lang;

   

    /**
     * Устанавливает параметр формат печати. Может принимать значения: A4, A5, A6. По умолчанию A4.
     *
     * @param string $format Формат печати. Может принимать значения: A4, A5, A6. По умолчанию A4
     *
     * @return self
     */
    public function setFormat(string $format = 'A4')
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Устанавливает параметр язык печатной формы. Возможные языки в кодировке ISO - 639-3:.
     *
     * @param string $lang Язык печатной формы. Возможные языки в кодировке ISO - 639-3:
     *
     * @return self
     */
    public function setLang(string $lang)
    {
        $this->lang = $lang;

        return $this;
    }
}
