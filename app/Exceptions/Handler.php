<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, $e)
    {

        // Not found exception handler
        if($e instanceof NotFoundHttpException) {
            return response()->json([
                'error' => [
                    'description' => 'Invalid URI',
                    'messages' => 'Route does not exist please try running an existing route!'
                ]
            ], 404);
        }

        // Method not allowed exception handler
        if($e instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'error' => [
                    'description' => 'Method Not Allowed',
                    'messages' => 'Try refreshing your token and try again!'
                ]
            ], 405);
        }

        return parent::render($request, $e);
    }
}
