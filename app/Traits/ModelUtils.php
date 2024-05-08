<?php

namespace App\Traits;

trait ModelUtils
{
    public function getFillableColumn(): array
    {
        if (method_exists(self::class, 'rules')) {
            $request = request();

            return array_keys($this->rules($request));
        }

        return [];
    }
}
