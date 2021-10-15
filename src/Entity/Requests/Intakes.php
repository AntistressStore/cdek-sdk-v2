<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

use AntistressStore\CdekSDK2\Traits\IntakesTrait;
use AntistressStore\CdekSDK2\Traits\{CommonTrait, PackageTrait};

/**
 * Class Intakes вызова курьера.
 */
class Intakes extends Source
{
    use CommonTrait, PackageTrait {
        CommonTrait::getComment insteadof PackageTrait;
        CommonTrait::setComment insteadof PackageTrait; }

    use IntakesTrait;
}
