<?php

/**
 * Copyright (c) Antistress.Store® 2021. All rights reserved.
 * See LICENSE.md for license details.
 *
 * @author Sergey Gusev
 */

namespace AntistressStore\CdekSDK2\Entity\Requests;

use JsonSerializable;

class Source implements JsonSerializable
{
    /**
     * Формирует массив параметров для запроса.
     * Удаляет пустые значения.
     *
     * @return array
     */
    public function prepareRequest()
    {
        $entity_vars = $this->pattern ?? \get_object_vars($this);

        $dynamic = [];
        // dd($entity_vars);
        foreach ($entity_vars as $key => $val) {
            if (\is_null($this->{$key})) {
                continue;
            }

            if (!\is_object($this->{$key}) && !is_array($this->{$key})) {
                $dynamic[$key] = $this->{$key};
            } elseif (is_array($this->{$key})) {
                foreach ($this->{$key} as $k => $v) {
                    $array_from_object = \get_object_vars($v);

                    $array_from_object_null_filtered = \array_filter($array_from_object);
                    if (!empty($array_from_object_null_filtered)) {
                        $dynamic[$key][] = $array_from_object_null_filtered;
                    } else {
                        continue;
                    }
                }
            } else {
                $a = \get_object_vars($this->{$key});
                $dynamic[$key] = \array_filter($a, function ($value) {
                    return $value !== null;
                });
            }
        }

        return $dynamic;
    }

    public function jsonSerialize()
    {
        return \get_object_vars($this);
    }
}
