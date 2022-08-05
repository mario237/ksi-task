<?php

namespace App\Exceptions;

use App\Traits\HandleApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    use HandleApiResponse;


    protected $levels = [
        //
    ];


    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
    public function register(): void
    {
        $this->renderable(function (Throwable $exception) {
            if ($exception instanceof HttpException){
                return $this->errorResponse($exception->getMessage() , $exception->getStatusCode());
            }

            if ($exception instanceof ModelNotFoundException) {
                $model = strtolower(class_basename($exception->getModel()));

                return $this->errorResponse("Does not exist any instance of $model with the given id", ResponseAlias::HTTP_NOT_FOUND);
            }

            if ($exception instanceof ValidationException) {

                $errors = $exception->validator->errors()->messages();

                return $this->errorResponse($errors, ResponseAlias::HTTP_UNPROCESSABLE_ENTITY);
            }

            return $this->errorResponse($exception->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);

        });
    }
}
