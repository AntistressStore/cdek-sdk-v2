<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Responses\AvailableTariffsResponse;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\{Client as GuzzleClient, HandlerStack};
use PHPUnit\Framework\TestCase;

class AvailableTariffsTest extends TestCase
{
    public function testGetAvailableTariffsSuccess(): void
    {
        // 1. Готовим фейковые ответы API
        $mock = new MockHandler([
            // Ответ 1: Авторизация
            new Response(200, [], json_encode([
                'access_token' => 'fake_test_token',
                'expires_in' => 3600,
            ])),
            // Ответ 2: Список доступных тарифов (согласно apidoc.cdek.ru)
            new Response(200, [], json_encode([
                'tariff_codes' => [
                    [
                        'tariff_name' => 'Посылка склад-склад',
                        'tariff_description' => 'Услуга экономичной доставки',
                        'weight_min' => 0.1,
                        'weight_max' => 30.0,
                        'length_min' => 1,
                        'length_max' => 150,
                        'width_min' => 1,
                        'width_max' => 150,
                        'height_min' => 1,
                        'height_max' => 150,
                        'delivery_modes' => [
                            [
                                'delivery_mode' => 1,
                                'delivery_mode_name' => 'Название режима доставки 1',
                                'tariff_code' => 132,
                            ],
                        ],
                        'payer_contragent_type' => ['LEGAL_ENTITY', 'INDIVIDUAL'],
                    ],
                    [
                        'tariff_name' => 'Посылка склад-дверь',
                        'weight_min' => 0.2,
                        'weight_max' => 32.0,
                        'delivery_modes' => [
                            [
                                'delivery_mode' => 2,
                                'delivery_mode_name' => 'Название режима доставки 2',
                                'tariff_code' => 134,
                            ],
                        ],
                    ],
                ],
            ])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $httpClient = new GuzzleClient(['handler' => $handlerStack]);

        $client = new CdekClientV2('TEST');
        $client->setHttp($httpClient);

        // 2. Выполнение запроса
        $response = $client->getAvailableTariffs();

        // 3. Проверки
        $this->assertIsArray($response);
        $this->assertCount(2, $response);

        $tariff = $response[0];
        $this->assertInstanceOf(AvailableTariffsResponse::class, $tariff);

        // Проверка данных первого тарифа
        // $this->assertEquals(136, $tariff->getTariffCode());
        $this->assertEquals('Посылка склад-склад', $tariff->getTariffName());
        $this->assertEquals(0.1, $tariff->getWeightMin());
        $this->assertEquals(30.0, $tariff->getWeightMax());
        $this->assertEquals(150, $tariff->getLengthMax());
        $this->assertEquals(1, $tariff->getDeliveryModes()[0]->getDeliveryMode());
        $this->assertEquals('Название режима доставки 1', $tariff->getDeliveryModes()[0]->getDeliveryModeName());
        $this->assertEquals(132, $tariff->getDeliveryModes()[0]->getTariffCode());

        // Проверка массивов типов контрагентов
        $this->assertIsArray($tariff->getPayerContragentType());
        $this->assertContains('LEGAL_ENTITY', $tariff->getPayerContragentType());
        $this->assertContains('INDIVIDUAL', $tariff->getPayerContragentType());


        $tariff_2 = $response[1];
        // Проверка второго тарифа
        $this->assertEquals('Посылка склад-дверь', $tariff_2->getTariffName());
        $this->assertEquals(0.2, $tariff_2->getWeightMin());
        $this->assertEquals(32.0, $tariff_2->getWeightMax());
        $this->assertEquals(2, $tariff_2->getDeliveryModes()[0]->getDeliveryMode());
        $this->assertEquals('Название режима доставки 2', $tariff_2->getDeliveryModes()[0]->getDeliveryModeName());
        $this->assertEquals(134, $tariff_2->getDeliveryModes()[0]->getTariffCode());
    }

    public function testGetAvailableTariffsEmpty(): void
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(['access_token' => 'token', 'expires_in' => 3600])),
            new Response(200, [], json_encode(['tariff_codes' => []])),
        ]);

        $client = new CdekClientV2('TEST');
        $client->setHttp(new GuzzleClient(['handler' => HandlerStack::create($mock)]));

        $response = $client->getAvailableTariffs();

        $this->assertIsArray($response);
        $this->assertEmpty($response);
    }
}
