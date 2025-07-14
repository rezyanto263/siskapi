<?php

use App\Http\Middleware\OnlyGuestMiddleware;
use App\Http\Middleware\TrimNullQuery;
use App\Http\Middleware\UserRoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest' => OnlyGuestMiddleware::class,
            'role' => UserRoleMiddleware::class,
            'clean.query' => TrimNullQuery::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
