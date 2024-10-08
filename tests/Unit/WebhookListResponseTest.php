<?php

namespace AntistressStore\Test\Unit;

use AntistressStore\CdekSDK2\Entity\Requests\{DeliveryPoints, Tariff};
use AntistressStore\CdekSDK2\Entity\Responses\{LocationResponse, WebhookListResponse};
use AntistressStore\Test\AntistressStoreTestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class WebhookListResponseTest extends AntistressStoreTestCase
{
    public function testCreateClassAndGetters(): void
    {
        $testResponce = json_decode(
            '[
{
        "type": "ORDER_STATUS",
        "uuid": "d7da1dbd-ae19-4f86-ab85-3274fa96ea8e",
        "url": "https://webhook.site/"
    },
    {
        "type": "PRINT_FORM",
        "uuid": "6624c7c0-680a-4c4e-9ed7-3f48ca9df4f4",
        "url": "https://webhook.site/"
    },
    {
        "type": "DOWNLOAD_PHOTO",
        "uuid": "41b9c676-bb54-4107-ba32-30ad4f1e9c7b",
        "url": "https://webhook.site/"
    },
    {
        "type": "PREALERT_CLOSED",
        "uuid": "0d15c501-8ed5-4f44-a462-ea7ec37cea22",
        "url": "https://webhook.site/"
    }
]',
            true
        );


        $webhooks = [];

        foreach ($testResponce as $key => $testWebhook) {
            $webhooks[$key] = new WebhookListResponse($testWebhook);

            $this->assertTrue($webhooks[$key]->getType() == $testWebhook['type']);
            $this->assertTrue($webhooks[$key]->getUrl() == $testWebhook['url']);
            $this->assertTrue($webhooks[$key]->getUuid() == $testWebhook['uuid']);
        }
    }
}
