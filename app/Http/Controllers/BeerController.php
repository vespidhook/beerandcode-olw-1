<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use App\Http\Requests\BeerRequest;

class BeerController extends Controller
{
    public function index(BeerRequest $request, PunkapiService $service)
    {
        
        return $service->getBeers(...$request->validated());
    }
}
