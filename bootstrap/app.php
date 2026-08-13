<?php

use App\Http\Middleware\EnsureCurrentStoreContext;
use App\Http\Middleware\EnsureStoreAccess;
use App\Http\Middleware\EnsureUserIsActive;
use App\Support\AuthRedirect;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        // api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectUsersTo(fn () => AuthRedirect::path(auth()->user()));

        $middleware->alias([
            'active_user' => EnsureUserIsActive::class,
            'active.user' => EnsureUserIsActive::class,
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
            'store.access' => EnsureStoreAccess::class,
            'store.selected' => EnsureCurrentStoreContext::class,
            'store.context' => EnsureCurrentStoreContext::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (TokenMismatchException $exception, Request $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => __('Page Expired'),
                ], 419);
            }

            return redirect()
                ->back()
                ->withInput($request->except(['password', 'password_confirmation', 'current_password']))
                ->with('error', __('Page Expired'));
        });
    })->create();
