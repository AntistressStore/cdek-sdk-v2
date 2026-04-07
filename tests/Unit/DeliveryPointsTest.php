<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Requests\DeliveryPoints;
use AntistressStore\CdekSDK2\Entity\Responses\{DeliveryPointsResponse, LocationResponse};
use AntistressStore\CdekSDK2\Exceptions\CdekV2RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\{Client as GuzzleClient, HandlerStack};
use PHPUnit\Framework\TestCase;

class DeliveryPointsTest extends TestCase
{
    public function testGetDeliveryPointsSuccess(): void
    {
        // 1. Готовим фейковые ответы API
        $mock = new MockHandler([
            // Ответ 1: Авторизация
            new Response(200, [], json_encode([
                'access_token' => 'fake_test_token',
                'expires_in' => 3600,
            ])),
            // Ответ 2: Список ПВЗ (согласно apidoc.cdek.ru)
            new Response(200, [], json_encode([
                [
                    'code' => 'ORX1',
                    'name' => 'Орехово-Зуево, ул. Ленина, 84',
                    'uuid' => '72120412-25e1-489e-862a-0f9c3e981985',
                    'address_comment' => 'Вход со двора',
                    'nearest_station' => 'ст. Орехово-Зуево',
                    'work_time' => 'Пн-Пт 10:00-20:00, Сб-Вс 10:00-18:00',
                    'phones' => [
                        ['number' => '+79001234567'],
                    ],
                    'location' => [
                        'country_code' => 'RU',
                        'region_code' => 1,
                        'region' => 'Московская область',
                        'city_code' => 270,
                        'city' => 'Орехово-Зуево',
                        'address' => 'ул. Ленина, д.84',
                        'longitude' => 38.9789,
                        'latitude' => 55.8106,
                    ],
                    'type' => 'PVZ',
                    'owner_code' => 'CDEK',
                    'take_only' => false,
                    'is_dressing_room' => true,
                    'have_cashless' => true,
                    'have_cash' => true,
                    'allowed_cod' => true,
                    'site' => 'https://www.cdek.ru',
                ],
            ])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $httpClient = new GuzzleClient(['handler' => $handlerStack]);

        $client = new CdekClientV2('TEST');
        $client->setHttp($httpClient);

        // 2. Формируем запрос
        $request = (new DeliveryPoints())
            ->setCityCode(270)
            ->setType('PVZ')
            ->setHaveCashless(true)
        ;

        // 3. Выполнение запроса
        $response = $client->getDeliveryPoints($request);

        // 4. Проверки
        $this->assertIsArray($response);
        $this->assertCount(1, $response);

        $item = $response[0];
        $this->assertInstanceOf(DeliveryPointsResponse::class, $item);

        // Проверка основных полей
        $this->assertEquals('ORX1', $item->getCode());
        $this->assertEquals('PVZ', $item->getType());
        $this->assertTrue($item->getIsDressingRoom());

        // Проверка вложенного объекта локации (LocationResponse)
        $this->assertInstanceOf(LocationResponse::class, $item->getLocation());
        $this->assertEquals('Орехово-Зуево', $item->getLocation()->getCity());
        $this->assertEquals(38.9789, $item->getLocation()->getLongitude());

        // Проверка массивов (телефоны)
        $this->assertIsArray($item->getPhones());
        $this->assertEquals('+79001234567', $item->getPhones()[0]->getNumber());
    }

    public function testGetDeliveryPointsEmpty(): void
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(['access_token' => 'token', 'expires_in' => 3600])),
            new Response(200, [], json_encode([])), // Пустой список ПВЗ
        ]);

        $handlerStack = HandlerStack::create($mock);
        $httpClient = new GuzzleClient(['handler' => $handlerStack]);

        $client = new CdekClientV2('TEST');
        $client->setHttp($httpClient);

        $this->expectException(CdekV2RequestException::class);
        $this->expectExceptionMessage('От API CDEK при вызове метода deliverypoints пришел пустой ответ');

        $response = $client->getDeliveryPoints(new DeliveryPoints());
    }
}
