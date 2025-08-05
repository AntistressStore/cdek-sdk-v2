<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

trait SellerTrait
{
    /**
     * Наименование истинного продавца.
     *
     * @var string
     */
    public $name;

    /**
     * ИНН истинного продавца.
     *
     * @var string
     */
    public $inn;

    /**
     * Телефон истинного продавца.
     *
     * @var string
     */
    public $phone;

    /**
     * Код формы собственности.
     *
     * @var int
     */
    public $ownership_form;

    /**
     * Адрес истинного продавца.
     * Используется при печати инвойсов для отображения адреса настоящего продавца товара, либо торгового названия.
     * Только для международных заказов.
     *
     * @var string
     */
    public $address;

    /**
     * Устанавливает наименование истинного продавца.
     *
     * @param string $name Наименование истинного продавца
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Устанавливает ИНН истинного продавца.
     *
     * @param string $inn ИНН истинного продавца
     *
     * @return self
     */
    public function setInn(string $inn)
    {
        $this->inn = $inn;

        return $this;
    }

    /**
     * Устанавливает телефон истинного продавца.
     *
     * @param string $phone Телефон истинного продавца
     *
     * @return self
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Устанавливает код формы собственности.
     *
     * @param int $ownership_form Код формы собственности
     *
     * @return self
     */
    public function setOwnershipForm(int $ownership_form)
    {
        $this->ownership_form = $ownership_form;

        return $this;
    }

    /**
     * Устанавливает только для международных заказов.
     *
     * @param string $address Только для международных заказов
     *
     * @return self
     */
    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }
}
