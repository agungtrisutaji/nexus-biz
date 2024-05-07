<?php

namespace App\Helpers;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class StringHelper
{
    public static function toSnakeCase($inputString): string
    {

        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $inputString));
    }

    public static function fromSnakeCaseToSentenceCase($inputString): array|bool|string|null
    {
        return str_replace('_', ' ', mb_convert_case($inputString, MB_CASE_TITLE_SIMPLE));
    }

    public static function fullName(?string ...$items): string
    {
        // remove null value
        $fullName = array_filter($items);

        // join array with space
        $fullName = $fullName ? implode(' ', $fullName) : '-';

        if ($fullName === '-') {
            return $fullName;
        }

        // string to array
        $fullName = explode(' ', $fullName);

        // unique array
        $fullName = array_unique($fullName);

        return implode(' ', $fullName);
    }

    public static function stripTagsCustom(?string $text): string
    {
        //remove tag html
        if ($text) {
            $plainString = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $text);
            $search = [
                '<span, Arial, sans-serif;">',
                '<span, sans-serif;">',
                '</span>',
                '&nbsp;',
                "\n",
            ];

            foreach ($search as $s) {
                $plainString = str_replace($s, '', $plainString);
            }

            return strip_tags($plainString);
        }

        return '-';
    }

    public static function extractArray(
        array|Collection|null $arr,
        array $keys,
        ?bool $getStringVal = false,
        ?string $prefix = null,
        ?bool $formatCurrency = false
    ): string {
        $result = $arr;
        if ($result && ! empty($result)) {
            foreach ($keys as $key) {
                $result = Arr::get($result, $key);
                if (! $result) {
                    break;
                }
            }
        } else {
            $result = '-';
        }

        if ($formatCurrency) {
            $result = number_format($result, 2);
        }

        if ($getStringVal) {
            $result = strval($result);
        }

        if ($prefix === 'idr') {
            $result = 'Rp. '.$result.',-';
        }
        if ($prefix === 'usd') {
            $result = '$ '.$result.',- USD';
        }

        return $result ?? '-';
    }

    public static function extractSeqNumber(string $number, string $module): ?int
    {
        if ($module === 'kpm151') {
            $date = str_replace('Telaah-', '', $number);
            $date = explode('/', $date);
            $yearMonth = $date[4].$date[3];

            return (int) sprintf('%s%s', $yearMonth, str_pad($date[0], 4, '0', STR_PAD_LEFT));
        }

        return null;
    }

    public static function trimDuplicateSpaceQuery(string $column)
    {
        return "trim(regexp_replace($column, '\s+', ' ', 'g'))";
    }

    public static function trimHtmlTagQuery(string $column): string
    {
        return "trim(regexp_replace(regexp_replace($column, E'<[^>]+>', '', 'gi'), '&nbsp;', '', 'g'))";
    }
}
