<?php

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Traits\{AgreementTrait, CommonTrait};

/**
 * Договоренности о доставке.
 */
class AgreementResponse extends Source
{
    use CommonTrait;
    use AgreementTrait;

    /**
     * Статусы.
     *
     * @var StatusResponse[]
     */
    protected $statuses;

    /**
     * Get статусы.
     *
     * @return StatusResponse[]
     */
    public function getStatuses()
    {
        return $this->statuses;
    }
}
