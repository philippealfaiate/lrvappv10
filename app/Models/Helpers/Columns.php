<?php

namespace App\Models\Helpers;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;

trait Columns
{
    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    protected static function Columns($except = [], $rs = [], $datetime = false)
    {
        $columns = Schema::getColumnListing(static::getTableName());
        if (!$datetime)
        {
            $columns = Arr::map($columns, function ($value, $key) {
                if (!in_array($value, ['created_at', 'updated_at']))
                    return $value;
            });
        }
        foreach($rs as $column)
        {
            array_push($columns, $column);
        }
        $columns = Arr::map($columns, function ($value, $key) use ($except) {
            if (!in_array($value, $except))
            return $value;
        });
        return Arr::whereNotNull($columns);
    }

    protected static function Relationships($rs = [])
    {
        return $rs;
    }
}