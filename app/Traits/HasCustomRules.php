<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

trait HasCustomRules
{
    public function rules(Request $request): array
    {
        $except = ['id', 'created', 'updated', 'deleted', 'creator_id', 'updater_id', 'deleter_id'];

        $validations = parent::rules($request);
        $validations = Arr::except($validations, $except);
        $newValidations = [];

        // remove json validation
        foreach ($validations as $key => $rules) {
            $newRules = [];

            if (in_array('json', $rules)) {
                foreach ($rules as $rule) {
                    if ($rule === 'json') {
                        continue;
                    }

                    $newRules[] = $rule;
                }
            } else {
                $newRules = $rules;
            }

            $newValidations[$key] = $newRules;
        }

        return $newValidations;
    }
}
