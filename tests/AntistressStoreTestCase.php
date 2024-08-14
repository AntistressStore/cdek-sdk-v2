<?php

namespace AntistressStore\Test;

use AntistressStore\CdekSDK2\CdekClientV2;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class AntistressStoreTestCase extends TestCase
{
    protected CdekClientV2 $client;

    public function setCdekClient(): CdekClientV2
    {
        $this->client = new CdekClientV2('TEST');

        return $this->client;
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->setCdekClient();
    }
}
