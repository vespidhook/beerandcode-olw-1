<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;

class BeerController extends Controller
{
    public function index(PunkapiService $service)
    {
        return $service->getBeers();   
    }
}
