<?php

function getStatus($status)
{
    switch ($status) {
        case 1:
            return 'fas fa-check';

        case 0:
            return 'fas fa-times-circle';
    }
}

function getTextColor($status)
{
    switch ($status) {
        case 1:
            return 'text-success';

        case 0:
            return 'text-danger';
    }
}

function getStatusLayout($status)
{
    return '<span class="' . getTextColor($status) . '"><i class="' . getStatus($status) . '"></i></span>';
}


function formatDate($val, $format = "Y-m-d")
{
    return date($format, strtotime($val));
}

function getSetting($config)
{
    $setting = \App\Models\Models\SiteSetting\SiteSetting::where('title', $config)->first();
    if (!empty($setting))
        return $setting->value;
    return null;
}

function getPackagesBy($data)
{
    $program = \App\Models\Program\Package\Package::where(function ($qry) use ($data) {
    })->get();
}
