<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\Entity\Responses\AvailableTariffsResponse;
use AntistressStore\Test\AntistressStoreTestCase;

class AvailableTariffsTest extends AntistressStoreTestCase
{
    public function testAvailableTariffs(): void
    {
        $response = $this->setCdekClient()->getAvailableTariffs();

        $this->assertNotEmpty($response);
        $this->assertInstanceOf(
            AvailableTariffsResponse::class,
            $response[0]
        );
    }
}