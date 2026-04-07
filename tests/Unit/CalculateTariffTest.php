<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Requests\Tariff;
use AntistressStore\CdekSDK2\Entity\Responses\TariffResponse;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\{Client as GuzzleClient, HandlerStack};
use PHPUnit\Framework\TestCase;

class CalculateTariffTest extends TestCase
{
    public function testCalculateTariffSuccess()
    {
        // 1. Готовим фейковые ответы API
        $mock = new MockHandler([
            // Ответ 1: Авторизация
            new Response(200, [], json_encode([
                'access_token' => 'fake_test_token',
                'expires_in' => 3600,
            ])),
            // Ответ 2: Расчет тарифа (согласно структуре TariffResponse)
            new Response(200, [], json_encode([
                'total_sum' => 350.50,
                'currency' => 'RUB',
                'delivery_sum' => 350.50,
                'period_min' => 2,
                'period_max' => 4,
                'weight_calc' => 500,
                'services' => [
                    [
                        'code' => 'INSURANCE',
                        'sum' => 10.50,
                    ],
                ],
            ])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $httpClient = new GuzzleClient(['handler' => $handlerStack]);

        $client = new CdekClientV2('TEST');
        $client->setHttp($httpClient);

        // 2. Подготовка запроса тарифа
        $tariff = (new Tariff())
            ->setCityCodes(44, 137) // Москва - Санкт-Петербург
            ->setTariffCode(136)   // Посылка склад-склад
            ->setPackageWeight(500)
        ;

        // 3. Выполнение запроса
        $response = $client->calculateTariff($tariff);

        // 4. Проверки
        $this->assertInstanceOf(TariffResponse::class, $response);
        $this->assertEquals(350.50, $response->getTotalSum());
        $this->assertEquals('RUB', $response->getCurrency());
        $this->assertEquals(2, $response->getPeriodMin());
        $this->assertEquals(500, $response->getWeightCalc());
        $this->assertTrue(is_float($response->getTotalSum()));
        $this->assertTrue(is_string($response->getCurrency()));
        $this->assertTrue(is_float($response->getDeliverySum()));
        $this->assertTrue(is_integer($response->getPeriodMin()));
        $this->assertTrue(is_integer($response->getPeriodMax()));
        $this->assertTrue(is_integer($response->getWeightCalc()));
        $this->assertTrue(is_array($response->getServices()));

        // Проверка вложенных сущностей (сервисов)
        $this->assertIsArray($response->getServices());
        $this->assertEquals('INSURANCE', $response->getServices()[0]->getCode());
        $this->assertEquals(10.50, $response->getServices()[0]->getSum());
    }

    public function testCalculateTariffListSuccess()
    {
        // Для метода calculateTariffList ответ API содержит массив 'tariff_codes'
        $mock = new MockHandler([
            // Ответ 1: Авторизация
            new Response(200, [], json_encode([
                'access_token' => 'fake_test_token',
                'expires_in' => 3600,
            ])),
            // Ответ 2: Список тарифов
            new Response(200, [], json_encode([
                'tariff_codes' => [
                    [
                        'tariff_code' => 136,
                        'tariff_name' => 'Посылка склад-склад',
                        'delivery_sum' => 300,
                        'period_min' => 1,
                        'period_max' => 3,
                    ],
                    [
                        'tariff_code' => 137,
                        'tariff_name' => 'Посылка склад-дверь',
                        'delivery_sum' => 450,
                        'period_min' => 2,
                        'period_max' => 4,
                    ],
                ],
            ])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $httpClient = new GuzzleClient(['handler' => $handlerStack]);

        $client = new CdekClientV2('TEST');
        $client->setHttp($httpClient);

        $tariff = (new Tariff())
            ->setCityCodes(44, 137)
            ->setPackageWeight(1000)
        ;

        $responses = $client->calculateTariffList($tariff);

        $this->assertIsArray($responses);
        $this->assertCount(2, $responses);
        $this->assertEquals(136, $responses[0]->getTariffCode());
        $this->assertEquals(450, $responses[1]->getDeliverySum());
    }
}
