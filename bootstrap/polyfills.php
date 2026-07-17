<?php

if (! function_exists('mb_split')) {
    function mb_split(string $pattern, string $string, int $limit = -1): array|false
    {
        $delimiter = '~';

        while (str_contains($pattern, $delimiter)) {
            $delimiter .= '#';
        }

        $result = preg_split($delimiter.$pattern.$delimiter.'u', $string, $limit);

        return $result === false ? false : $result;
    }
}