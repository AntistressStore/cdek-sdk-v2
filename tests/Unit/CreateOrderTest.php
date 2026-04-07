<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Requests\{Item, Order};
use AntistressStore\CdekSDK2\Entity\Responses\{EntityResponse, OrderResponse};
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\{Client as GuzzleClient, HandlerStack};
use PHPUnit\Framework\TestCase;

class CreateOrderTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateOrderSuccess()
    {
        // 1. Готовим фейковые ответы API (в порядке их вызова)

        $orderUuid = '72120412-25e1-489e-862a-0f9c3e981985';

        $mock = new MockHandler([
            // Ответ 1: Авторизация
            new Response(200, [], json_encode([
                'access_token' => 'fake_test_token',
                'expires_in' => 3600,
            ])),
            // Ответ 2: Создание заказа (метод createOrder)
            new Response(200, [], json_encode([
                'entity' => ['uuid' => $orderUuid],
                'requests' => [
                    [
                        'request_uuid' => 'req-123',
                        'type' => 'CREATE',
                        'state' => 'ACCEPTED',
                        'date_time' => '2024-01-01T12:00:00+0000',
                    ],
                ],
            ])),
            // Ответ 3: Авторизация
            new Response(200, [], json_encode([
                'access_token' => 'fake_test_token',
                'expires_in' => 3600,
            ])),
            // Ответ 4: Информация о заказе (метод getOrderInfoByUuid)
            new Response(200, [], json_encode([
                'uuid' => $orderUuid,
                'type' => 1,
                'tariff_code' => 136,
                'shipment_point' => 'ORX1',
                'delivery_point' => 'ORX1',
                'packages' => [
                    [
                        'package_id' => 'pkg-123',
                        'weight' => 500,
                    ],
                ],
            ])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $httpClient = new GuzzleClient(['handler' => $handlerStack]);

        $client = new CdekClientV2('TEST');
        // Внедряем мок-клиент
        $client->setHttp($httpClient);

        // Создание объекта заказа
        $order = (new Order())
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

        $response = $client->createOrder($order);

        $uuid = $response->getEntityUuid();

        $this->assertTrue($response instanceof EntityResponse);
        $this->assertTrue(is_string($uuid));
        $this->assertEquals($orderUuid, $uuid);
        $this->assertTrue(is_array($response->getRequests()));

        // Получение инфо о заказе (второй запрос к API)
        $neworder = $client->getOrderInfoByUuid($uuid);

        // Проверка возвращаемого типа и данных из OrderResponse
        $this->assertInstanceOf(OrderResponse::class, $neworder);
        $this->assertEquals(1, $neworder->getType());
        $this->assertEquals('ORX1', $neworder->getShipmentPoint());
        $this->assertEquals(136, $neworder->getTariffCode());
    }
}
