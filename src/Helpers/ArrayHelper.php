<?php

namespace Quiz\Helpers;

class ArrayHelper
{
    public static function getElementsIndexStart(array $data, string $indexStart): array {
        $result = [];

        foreach ($data as $key => $value) {
            if(strpos($key, $indexStart) !== 0) {
                continue;
            }

            $result[$key] = $value;
        }

        return $result;
    }

    public static function getFilteredOut(string $string, string $needle): string {

    }
}