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

function getStatuss($status)
{
    switch ($status) {
        case 'approve':
            return 'APPROVE';

        case 'processing':
            return 'PROCESSING';

        case 'denied':
            return 'DENIED';
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

function getTextColors($status)
{
    switch ($status) {
        case 'approve':
            return 'success';

        case 'processing':
            return 'primary';

        case 'denied':
            return 'danger';
    }
}

function getStatusLayout($status)
{
    return '<span class="' . getTextColor($status) . '"><i class="' . getStatus($status) . '"></i></span>';
}

function getStatusLayouts($status)
{
    return '<span class="badge badge-'. getTextColors($status) .'">'. getStatuss($status) . '</span>';
}


function formatDate($val, $format = "Y-m-d")
{
    return date($format, strtotime($val));
}

function getSetting($config, $field = null)
{
    $setting = \App\Models\Models\SiteSetting\SiteSetting::where('title', $config)->first();
    if (!empty($setting)) {
        if (!empty($field))
            return $setting[$field];
        return $setting->value;
    }
    return null;
}

function getPackagesBy($data)
{
    $program = \App\Models\Program\Package\Package::where(function ($qry) use ($data) {
    })->get();
}
