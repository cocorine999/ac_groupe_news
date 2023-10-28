<?php

namespace App\Exceptions;

use ErrorException;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{

    public function apiExceptions($request, $e)
    {

        if ($this->isModel($e)) {
            return $this->ModelResponse($e);
        }

        if ($this->isHttp($e)) {
            return $this->HttpResponse($e);
        }

        if ($this->isAuthentication($e)) {
            return $this->AuthenticationResponse($e);
        }

        if ($this->isValidation($e, $request)) {
            return $this->ValidationResponse($e, $request);
        }

        if ($this->isTokenMismatch($e)) {
            return $this->TokenMismatchResponse($e);
        }

        if ($this->isError($e)) {
            return $this->ErrorResponse($e);
        }
    }

    protected function isError($e)
    {
        return $e instanceof ErrorException;
    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function isAuthentication($e)
    {
        return $e instanceof AuthenticationException;
    }

    protected function isValidation($e)
    {
        return $e instanceof ValidationException;
    }

    protected function isTokenMismatch($e)
    {
        return $e instanceof TokenMismatchException;
    }

    protected function ModelResponse($e)
    {
        return response()->json([
            "errors" => ["message" => ['Aucun résultat trouvé pour ' . str_replace('App\\', '', $e->getModel())]]
        ], Response::HTTP_NOT_FOUND);
    }

    protected function ErrorResponse($e)
    {
        return response()->json([
            "errors" => ["message" => [$e->getMessage()]]

        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    protected function HttpResponse($e)
    {
        return response()->json([
            "errors" => ["message" => ['Route inconnue']]
        ], Response::HTTP_NOT_FOUND);
    }

    protected function AuthenticationResponse($e)
    {
        return response()->json([
            "errors" => ["message" => ['Pas connecte']]
        ], Response::HTTP_UNAUTHORIZED);
    }

    protected function ValidationResponse($e, $request)
    {
        $errors = $e->validator->errors()->getMessages();
        return response()->json([
            "errors" => ["message" => [$errors]]
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    protected function TokenMismatchResponse($e)
    {
        return response()->json([
            "errors" => ["message" => ['Mauvaise http request méthode']]
        ], 419);
    }
}