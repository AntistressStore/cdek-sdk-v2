<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\Entity\Requests\Tariff;
use AntistressStore\Test\AntistressStoreTestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class CalculateTariffTest extends AntistressStoreTestCase
{
    public function testCalculateTariff(): void
    {
        $tariff = (new Tariff())
            ->setCityCodes(172, 172)
            ->setTariffCode(136)
            ->setPackageWeight(500)
        ;

        $tariffResponse = $this->setCdekClient()->calculateTariff($tariff);
        $this->assertTrue(is_float($tariffResponse->getTotalSum()));
        $this->assertTrue(is_string($tariffResponse->getCurrency()));
        $this->assertTrue(is_float($tariffResponse->getDeliverySum()));
        $this->assertTrue(is_integer($tariffResponse->getPeriodMin()));
        $this->assertTrue(is_integer($tariffResponse->getPeriodMax()));
        $this->assertTrue(is_integer($tariffResponse->getWeightCalc()));
        $this->assertTrue(is_array($tariffResponse->getServices()));
    }

    public function testCalculateTariffWithFilledInsurance(): void
    {
        $tariff = (new Tariff())
            ->setCityCodes(172, 172)
            ->setTariffCode(136)
            ->setPackageWeight(500)
            ->addServices(['INSURANCE' => 1000])
        ;

        $tariffResponse = $this->setCdekClient()->calculateTariff($tariff);

        $this->assertTrue($tariffResponse->getServices()[0]->getCode() == 'INSURANCE');

        $this->assertTrue(is_float($tariffResponse->getServices()[0]->getSum()));
    }
}
