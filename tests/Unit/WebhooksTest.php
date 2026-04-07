<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Requests\Webhooks;
use AntistressStore\CdekSDK2\Entity\Responses\{EntityResponse, WebhookListResponse};
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\{Client as GuzzleClient, HandlerStack};
use PHPUnit\Framework\TestCase;

class WebhooksTest extends TestCase
{
    /**
     * Тест получения списка вебхуков.
     */
    public function testGetWebhooksSuccess(): void
    {
        $mock = new MockHandler([
            // 1. Auth
            new Response(200, [], json_encode(['access_token' => 'token', 'expires_in' => 3600])),
            // 2. Webhook List
            new Response(200, [], json_encode([
                [
                    'type' => 'ORDER_STATUS',
                    'uuid' => 'd7da1dbd-ae19-4f86-ab85-3274fa96ea8e',
                    'url' => 'https://webhook.site/1',
                ],
                [
                    'type' => 'PRINT_FORM',
                    'uuid' => '6624c7c0-680a-4c4e-9ed7-3f48ca9df4f4',
                    'url' => 'https://webhook.site/2',
                ],
            ])),
        ]);

        $client = new CdekClientV2('TEST');
        $client->setHttp(new GuzzleClient(['handler' => HandlerStack::create($mock)]));

        $response = $client->getWebhooks();

        $this->assertIsArray($response);
        $this->assertCount(2, $response);
        $this->assertInstanceOf(WebhookListResponse::class, $response[0]);
        $this->assertEquals('ORDER_STATUS', $response[0]->getType());
        $this->assertEquals('d7da1dbd-ae19-4f86-ab85-3274fa96ea8e', $response[0]->getUuid());
        $this->assertEquals('https://webhook.site/1', $response[0]->getUrl());
    }

    /**
     * Тест создания вебхука.
     */
    public function testSetWebhooksSuccess(): void
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(['access_token' => 'token', 'expires_in' => 3600])),
            new Response(200, [], json_encode([
                'entity' => ['uuid' => 'new-webhook-uuid'],
                'requests' => [
                    [
                        'request_uuid' => 'req-123',
                        'type' => 'CREATE',
                        'state' => 'ACCEPTED',
                        'date_time' => '2024-01-01T12:00:00+0000',
                    ],
                ],
            ])),
        ]);

        $client = new CdekClientV2('TEST');
        $client->setHttp(new GuzzleClient(['handler' => HandlerStack::create($mock)]));

        $webhookRequest = (new Webhooks())
            ->setUrl('https://my-site.ru/webhooks')
            ->setType('ORDER_STATUS')
        ;

        $response = $client->setWebhooks($webhookRequest);

        $this->assertInstanceOf(EntityResponse::class, $response);
        $this->assertEquals('new-webhook-uuid', $response->getEntityUuid());
        $this->assertEquals('ACCEPTED', $response->getRequests()[0]->getState());
    }

    /**
     * Тест удаления вебхука.
     */
    public function testDeleteWebhookSuccess(): void
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(['access_token' => 'token', 'expires_in' => 3600])),
            new Response(200, [], json_encode([
                'entity' => ['uuid' => 'deleted-uuid'],
                'requests' => [
                    [
                        'request_uuid' => 'req-delete',
                        'type' => 'DELETE',
                        'state' => 'ACCEPTED',
                    ],
                ],
            ])),
        ]);

        $client = new CdekClientV2('TEST');
        $client->setHttp(new GuzzleClient(['handler' => HandlerStack::create($mock)]));

        $response = $client->deleteWebhooks('deleted-uuid');

        $this->assertInstanceOf(EntityResponse::class, $response);
        $this->assertEquals('deleted-uuid', $response->getEntityUuid());
    }
}
