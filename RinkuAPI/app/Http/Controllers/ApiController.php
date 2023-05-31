<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    protected function jsonResponse($mensaje, $datos, $status = 200): JsonResponse
    {
        return response()->json(['Mensaje', $mensaje, 'Datos' => $datos], $status);
    }
}
