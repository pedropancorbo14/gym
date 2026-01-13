<?php

namespace App\Support;

class JsonApiError
{
    public static function make(string $status, string $title, string $detail = '')
    {
        return [
            [
                'status' => $status,
                'title' => $title,
                'detail' => $detail,
            ]
        ];
    }
}
