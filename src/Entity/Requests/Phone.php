<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

use AntistressStore\CdekSDK2\Traits\PhoneTrait;

/**
 * Class Phone
 * Номер телефона (мобильный/городской).
 */
class Phone extends Source
{
    use PhoneTrait;
}
