<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'data/store', 
        'data/edit', 
        'data/delete',
        'auth/login',
        'auth/register', 
        'admin/local', 
        'store/gateway'
    ];
}
