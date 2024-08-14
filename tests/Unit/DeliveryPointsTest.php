<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\Entity\Requests\{DeliveryPoints, Tariff};
use AntistressStore\CdekSDK2\Entity\Responses\LocationResponse;
use AntistressStore\Test\AntistressStoreTestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class DeliveryPointsTest extends AntistressStoreTestCase
{
    public function testGetDeliveryPoints(): void
    {
        $requestPvz = (new DeliveryPoints())
            ->setType('PVZ')
            ->setCityCode(270)
            ->setCodAllowed(true)
        ;

        $responsePvz = $this->client->getDeliveryPoints($requestPvz);

        $spliced = array_splice($responsePvz, 3);

        foreach ($responsePvz as $item) {
            $this->assertTrue(is_string($item->getCode()));
            $this->assertTrue(is_string($item->getName()));
            $this->assertTrue(is_string($item->getLocation()->getAddress()));
            $this->assertTrue(is_string($item->getWorkTime()));
            $this->assertTrue($item->getLocation() instanceof LocationResponse);
            $this->assertTrue(is_array($item->getWorkTimeList()));
            $this->assertTrue(is_array($item->getPhones()));
            $this->assertTrue(is_string($item->getType()));
            $this->assertTrue(is_string($item->getOwnerCode()));
            $this->assertTrue(is_bool($item->getHaveCashless()));
            $this->assertTrue(is_bool($item->getHaveCash()));
            $this->assertTrue(is_bool($item->getAllowedCod()));
            $this->assertTrue(is_bool($item->getIsDressingRoom()));
            $this->assertTrue(is_bool($item->getIsHandout()));
            $this->assertTrue(is_bool($item->getIsReception()));
            $this->assertTrue(is_bool($item->getTakeOnly()));
        }
    }
}
