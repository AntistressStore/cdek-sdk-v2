<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\Entity\Requests\{DeliveryPoints, Tariff};
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
        $requestPvz = (new DeliveryPoints())->setType('PVZ')->setCityCode(44);

        $responsePvz = $this->client->getDeliveryPoints($requestPvz);

        foreach ($responsePvz as $item) {
            $this->assertTrue(is_string($item->getCode()));
            $this->assertTrue(is_string($item->getName()));
            $this->assertTrue(is_string($item->getLocation()->getAddress()));
            // TODO
            // $item->getWorkTime();
            // $item->getLocation()->getPostalCode();
            // $item->getWorkTimeList();
            // $item->getWorkTimeExceptions();
            // $item->getNote();
            // $item->getOwnerCode();
            // $item->getNearestStation();
            // $item->getNearestMetroStation();
            // $item->getSite();
            // $item->getEmail();
            // $item->getAddressComment();
            // $item->getOfficeImageList();
            // $item->getDimensions();
            // $item->getHaveCashless();
            // $item->getHaveCash();
            // $item->getAllowedCod();
            // $item->getIsDressingRoom();
            // $item->getIsHandout();
            // $item->getIsReception();
            // $item->getWeightMax();
            // $item->getWeightMin();
            // $item->getTakeOnly();
        }
    }
}
