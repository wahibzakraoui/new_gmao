<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'factories/list',
        'areas/list',
        'equipments/list',
        'parts/list',
        'users/list',
        'gamuts/list',
        'work_orders/list',
        'work_orders/finished_list',
        'purchases/list',
        'purchases/list_pending',
        'purchases/list_consulting',
        'purchases/list_pending_delivery',
        'purchases/list_archived',
        'spares/list',
        'gamuts/list_work_orders/*',
    ];
}
