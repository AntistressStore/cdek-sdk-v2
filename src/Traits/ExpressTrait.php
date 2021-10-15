<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Traits;

trait ExpressTrait
{
    /**
     * Экспресс-метод установки параметов.
     */
    public static function express(array $args)
    {
        $instance = new self();

        foreach ($args as $key => $value) {
            if (!\is_null($value)) {
                $instance->{$key} = $value;
            }
        }

        return $instance;
    }
}
