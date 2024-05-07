<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\SoftDeletes as EloquentSoftDeletes;
use Illuminate\Support\Facades\Schema;

trait SoftDeletes
{
    use EloquentSoftDeletes {
        EloquentSoftDeletes::bootSoftDeletes as parentBootSoftDeletes;
        EloquentSoftDeletes::runSoftDelete as parentRunSoftDelete;
        EloquentSoftDeletes::getDeletedAtColumn as parentGetDeletedAtColumn;
        EloquentSoftDeletes::getQualifiedDeletedAtColumn as parentGetQualifiedDeletedAtColumn;
    }

    protected static bool $disableSoftDelete = false;

    public static function bootSoftDeletes()
    {
        if (! static::$disableSoftDelete) {
            static::parentBootSoftDeletes();
        }
    }

    protected function runSoftDelete()
    {
        if (! static::$disableSoftDelete) {
            $this->parentRunSoftDelete();

            $query = $this->setKeysForSaveQuery($this->newModelQuery());

            // check if the model uses soft delete
            if (Schema::hasColumn($this->getTable(), 'is_deleted')) {
                $query->update(['is_deleted' => true]);
            }
        }
    }

    public function getDeletedAtColumn()
    {
        if (! static::$disableSoftDelete) {
            return $this->parentGetDeletedAtColumn();
        }
    }

    public function getQualifiedDeletedAtColumn()
    {
        if (! static::$disableSoftDelete) {
            return $this->parentGetQualifiedDeletedAtColumn();
        }
    }
}
