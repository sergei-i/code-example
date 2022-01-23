<?php

declare(strict_types=1);

if (!function_exists('isRouteActive')) {
    function isRouteActive(string $routeName): bool
    {
        return (bool)request()?->routeIs($routeName);
    }
}
