<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Exceptions;

use AntistressStore\CdekSDK2\Constants;

class CdekV2Exception extends \Exception
{
    public static function getTranslation($code, $message)
    {
        if (array_key_exists($code, Constants::ERRORS)) {
            return Constants::ERRORS[$code].'. '.$message;
        }

        return $message;
    }
}
