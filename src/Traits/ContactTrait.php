<?php
/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

use AntistressStore\CdekSDK2\Entity\Requests\Phone;

/**
 * Class Contact.
 */
trait ContactTrait
{
    /**
     * Название компании.
     *
     * @var string
     */
    protected $company;

    /**
     * ФИО контактного лица.
     *
     * @var string
     */
    protected $name;

    /**
     * Электронный адрес
     *
     * @var string
     */
    protected $email;

    /**
     * Список телефонов.
     *
     * @var Phone[]
     */
    protected $phones;

    /**
     * Серия паспорта получателя(только для международных заказов).
     *
     * @var string
     */
    protected $passport_series;

    /**
     * Номер паспорта получателя (только для международных заказов).
     *
     * @var string
     */
    protected $passport_number;

    /**
     * Дата выдачи паспорта получателя (только для международных заказов).
     *
     * @var string
     */
    protected $passport_date_of_issue;

    /**
     * Орган выдачи паспорта получателя (только для международных заказов).
     *
     * @var string
     */
    protected $passport_organization;

    /**
     * Дата рождения получателя (только для международных заказов).
     *
     * @var string
     */
    protected $passport_date_of_birth;

    /**
     * ИНН получателя (только для международных заказов).
     *
     * @var string
     */
    protected $tin;

    /**
     * Устанавливает название компании.
     *
     * @param string $company Название компании
     *
     * @return self
     */
    public function setCompany(string $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Устанавливает ФИО контактного лица.
     *
     * @param string $name ФИО контактного лица
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Устанавливает электронный адрес
     *
     * @param string $email Электронный адрес
     *
     * @return self
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Устанавливает список телефонов.
     *
     * @param string      $number     - Основной телефон
     * @param string|null $additional - Дополнительный телефон
     *
     * @return self
     */
    public function setPhones($number, $additional = null)
    {
        $args = \get_defined_vars();
        $this->phones[] = Phone::express($args);

        return $this;
    }

    /**
     * Устанавливает серия паспорта получателя (только для международных заказов).
     *
     * @param string $passport_series Серия паспорта получателя (только для международных заказов)
     *
     * @return self
     */
    public function setPassportSeries(string $passport_series)
    {
        $this->passport_series = $passport_series;

        return $this;
    }

    /**
     * Устанавливает номер паспорта получателя (только для международных заказов).
     *
     * @param string $passport_number Номер паспорта получателя (только для международных заказов)
     *
     * @return self
     */
    public function setPassportNumber(string $passport_number)
    {
        $this->passport_number = $passport_number;

        return $this;
    }

    /**
     * Устанавливает дата выдачи паспорта получателя (только для международных заказов).
     *
     * @param string $passport_date_of_issue Дата выдачи паспорта получателя (только для международных заказов)
     *
     * @return self
     */
    public function setPassportDateOfIssue(string $passport_date_of_issue)
    {
        $this->passport_date_of_issue = $passport_date_of_issue;

        return $this;
    }

    /**
     * Устанавливает орган выдачи паспорта получателя (только для международных заказов).
     *
     * @param string $passport_organization Орган выдачи паспорта получателя (только для международных заказов)
     *
     * @return self
     */
    public function setPassportOrganization(string $passport_organization)
    {
        $this->passport_organization = $passport_organization;

        return $this;
    }

    /**
     * Устанавливает дата рождения получателя (только для международных заказов).
     *
     * @param string $passport_date_of_birth Дата рождения получателя (только для международных заказов)
     *
     * @return self
     */
    public function setPassportDateOfBirth(string $passport_date_of_birth)
    {
        $this->passport_date_of_birth = $passport_date_of_birth;

        return $this;
    }

    /**
     * Устанавливает иНН получателя (только для международных заказов).
     *
     * @param string $tin ИНН получателя (только для международных заказов)
     *
     * @return self
     */
    public function setTin(string $tin)
    {
        $this->tin = $tin;

        return $this;
    }
}
