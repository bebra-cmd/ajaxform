<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;
use Illuminate\Support\Facades\Response;
class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            
        });
    }
    public function render($request, Throwable $e){
        if ($e instanceof ValidationException){
            return Response::json(['message'=>'Validation exception','errors'=>$e->errors(),],422); //or just $e->errors in reponse, this look weird
        }
        return parent::render($request,$e); 
    }
    
}
