<?php

/**
 * Copyright (c) Antistress.Store® 2024. All rights reserved.
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
        CommonTrait::getNumber insteadof PackageTrait;
        PackageTrait::getNumber as getPackageNumber;

        CommonTrait::getComment insteadof PackageTrait;
        PackageTrait::getComment as getPackageComment;

        CommonTrait::setComment insteadof PackageTrait;
        PackageTrait::setComment as setPackageComment;
    }

    use IntakesTrait;
}
