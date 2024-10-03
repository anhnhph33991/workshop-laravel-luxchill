<?php
use Illuminate\Support\Str;

if (!function_exists('activeMenu')) {
    function activeMenu($uri)
    {
        return Str::startsWith(request()->path(), $uri) ? 'active' : '';
    }
}

if (!function_exists('activeMenuLi')) {
    function activeMenuLi($uri)
    {
        return Str::startsWith(request()->path(), $uri) ? 'mm-active' : '';
    }
}

if (!function_exists('activeTab')) {
    function activeTab($tabName)
    {
        $currentTab = request()->query('tab', 'all');
        return $currentTab === $tabName ? 'active' : '';
    }
}
