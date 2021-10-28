<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Responses;

use AntistressStore\CdekSDK2\Constants;

class Source
{
    /**
     * Формирует объект класса из ответа.
     *
     * @return self
     */
    public function __construct(?array $properties = null)
    {
        if ($properties != null) {
            if (isset($properties['entity'])) {
                if (count($properties['entity']) > 1) {
                    $properties = $properties['entity'];
                }
            }
            foreach ($properties as $key => $value) {
                if ( ! property_exists($this, $key)) {
                    continue;
                }
                if (isset(Constants::SDK_CLASSES[$key])) {
                    $class_name = '\\AntistressStore\\CdekSDK2\\Entity\\Responses\\'
                        .Constants::SDK_CLASSES[$key].'Response';
                    $this->{$key} = $class_name::create($value);
                } elseif (isset(Constants::SDK_ARRAY_RESPONSE_CLASSES[$key])) {
                    foreach ($value as $v) {
                        $class_name = '\\AntistressStore\\CdekSDK2\\Entity\\Responses\\'.
                            Constants::SDK_ARRAY_RESPONSE_CLASSES[$key].'Response';
                        $this->{$key}[] = $class_name::create($v);
                    }
                } else {
                    $this->{$key} = $value;
                }
            }
        }
    }

    public static function create(array $properties)
    {
        return new static($properties);
    }
}
