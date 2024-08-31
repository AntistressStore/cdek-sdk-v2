<?php

namespace AntistressStore\CdekSDK2\Traits;

trait JsonSerializeTrait
{
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return \get_object_vars($this);
    }
}