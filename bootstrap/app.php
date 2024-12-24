<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\AdminOrMembers;
use App\Http\Middleware\LogVisit;
use App\Http\Middleware\Members;
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
        $middleware->web(append: [
            \RealRashid\SweetAlert\ToSweetAlert::class,
        ]);
        
        $middleware->alias([
            'log.visit' => LogVisit::class,
            'admin' => Admin::class,
            'members' => Members::class,
            'adminOrMembers' => AdminOrMembers::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
