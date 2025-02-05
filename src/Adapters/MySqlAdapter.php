<?php

namespace Flowframe\Trend\Adapters;

use Error;

class MySqlAdapter extends AbstractAdapter
{
    public function format(string $column, string $interval): string
    {
        $format = match ($interval) {
            'minute' => '%Y-%m-%d %H:%i:00',
            'hour' => '%Y-%m-%d %H:00',
            'day' => '%Y-%m-%d',
            'month' => '%Y-%m',
            'year' => '%Y',
            'week' => '%x %v',
            'dayOfWeek' => '%W',
            default => throw new Error('Invalid interval.'),
        };

        return "date_format({$column}, '{$format}')";
    }
}
