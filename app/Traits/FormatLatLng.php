<?php

namespace App\Traits;

trait FormatLatLng
{
    public function getSourceLatAttribute($value)
    {
        return (float) ($value);
    }

    public function getSourceLngAttribute($value)
    {
        return (float) ($value);
    }

    public function getDestinationLatAttribute($value)
    {
        return (float) ($value);
    }

    public function getDestinationLngAttribute($value)
    {
        return (float) ($value);
    }
}
