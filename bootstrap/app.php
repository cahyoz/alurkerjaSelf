<?php

namespace App\Http;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

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
            'checkProject' => \App\Http\Middleware\MustBeProjectOwner::class,
            'checkModeler' => \App\Http\Middleware\MustBeModelerOwner::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();