<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\Entity\Requests\Item;
use AntistressStore\CdekSDK2\Entity\Responses\{EntityResponse, PackagesResponse};
use AntistressStore\CdekSDK2\Entity\Responses\OrderResponse;
use AntistressStore\Test\AntistressStoreTestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class CreateOrderTest extends AntistressStoreTestCase
{
    public function testCreateOrder(): void
    {
        // Создание объекта заказа

        $order = (new \AntistressStore\CdekSDK2\Entity\Requests\Order())
            ->setNumber('НовыйЗаказ'.rand(2, 999)) // Номер заказа
            ->setType(1)                      // Тип заказа (ИМ)
            ->setComment('Оплата по карте') // Комментарий
            ->setTariffCode(136) // Код тарифа
            ->setDeliveryRecipientCost(150) // Стоимость доставки
            ->setShipmentPoint('ORX1')
            ->setDeliveryPoint('ORX1')
        ;

        // Добавление информации о продавце

        $seller = (new \AntistressStore\CdekSDK2\Entity\Requests\Seller())
            ->setName('Antistress.Store')
            ->setInn(777777777777)
            ->setPhone('84950090405')
            ->setOwnershipForm(63)
        ;

        $order->setSeller($seller);

        // Добавление информации о получателе

        $recipient = (new \AntistressStore\CdekSDK2\Entity\Requests\Contact())
            ->setName('Мастер Йода')
            ->setEmail('yoda@antistress.store')
            ->setPhones('+79134637228')
        ;

        $order->setRecipient($recipient);

        // // Адрес отправителя только для тарифов "от двери"
        //
        // $order->setShipmentAddress('ул.Люка Скайоукера, д.1')
        //     ->setShipmentCityCode(1204)
        //     ->setRecipientAddress('ул.Джедаев, д.3')
        //     ->setRecipientCityCode(44)
        // ;

        // Создаем данные посылки. Место

        $packages =
        (new \AntistressStore\CdekSDK2\Entity\Requests\Package())
            ->setNumber('1')
            ->setWeight(500)
            ->setHeight(10)
            ->setWidth(10)
            ->setLength(10)
        ;

        // Создаем товары

        $items = [];

        $items[] = (new Item())
            ->setName('name')
            ->setWareKey('articul') // Идентификатор/артикул товара/вложения
            ->setPayment(1500.00) // Оплата за товар при получении, без НДС (за единицу товара)
            ->setCost(1500.00) // Объявленная стоимость товара (за единицу товара)
            ->setWeight(100) // Вес в граммах
            ->setAmount(1) // Количество
        ;

        $packages->setItems($items);
        $order->setPackages($packages);

        // Заказ подготовлен отправляем в ранее объявленный клиент

        $response = $this->client->createOrder($order);

        $uuid = $response->getEntityUuid();

        $this->assertTrue($response instanceof EntityResponse);
        $this->assertTrue(is_string($uuid));
        $this->assertTrue(is_array($response->getRequests()));

        sleep(1);

        $neworder = $this->client->getOrderInfoByUuid($uuid);

        $this->assertTrue($neworder instanceof OrderResponse);
        $this->assertTrue($neworder->getType() == 1);
        $this->assertTrue($neworder->getShipmentPoint() == 'ORX1');
        $this->assertTrue($neworder->getDeliveryPoint() == 'ORX1');
        $this->assertTrue($neworder->getTariffCode() == 136);
        $this->assertTrue($neworder->getPackages()[0] instanceof PackagesResponse);
    }
}
