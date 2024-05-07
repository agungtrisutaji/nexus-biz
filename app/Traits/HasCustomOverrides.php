<?php

namespace App\Traits;

trait HasCustomOverrides
{
    public function getOverrides(): array
    {
        $overrides = parent::getOverrides();

        $forcedLabel['created'] = $overrides['additional_field_spec']['created']['label'] ?? 'Tanggal Dibuat';
        $forcedLabel['updated'] = $overrides['additional_field_spec']['updated']['label'] ?? 'Tanggal Diperbarui';

        $overrides['label_mapping'] = array_merge($overrides['label_mapping'], $forcedLabel);

        return $overrides;
    }
}
