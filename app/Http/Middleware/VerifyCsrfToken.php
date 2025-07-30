<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * URIs yang tidak perlu CSRF protection
     *
     * @var array<int, string>
     */
    protected $except = [
        '/midtrans/webhook',
        'api/midtrans/webhook',  // ✅ ini wajib ditambahkan
    ];
}
