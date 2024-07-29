<?php

namespace App\Http;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth' => \App\Http\Middleware\AuthMiddleware::class,
            'role' => \App\Http\Middleware\AuthMiddleware::class,
            'guest' => \App\Http\Middleware\GuestMiddleware::class,
            'check.profile' => \App\Http\Middleware\CheckProfileCompletion::class,
            'checkProfileCompletion' => \App\Http\Middleware\CheckProfileCompletion::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
