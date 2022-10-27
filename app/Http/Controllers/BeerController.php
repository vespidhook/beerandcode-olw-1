<?php

namespace App\Http\Controllers;

use App\Services\PunkapiService;
use App\Http\Requests\BeerRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BeerExport;

class BeerController extends Controller
{
    public function index(BeerRequest $request, PunkapiService $service)
    {
        
        return $service->getBeers(...$request->validated());
    }

    public function export(BeerRequest $request, PunkapiService $service)
    {
        $beers = $service->getBeers(...$request->validated());

        $filteredBeers = collect($beers)->map(function($value, $key) {
            return collect($value)
                ->only(['name', 'tagline', 'first_brewed', 'description'])
                ->toArray();
        })->toArray();

        Excel::store(
            new BeerExport($filteredBeers), 
            'olw-report.xlsx',
            's3'
        );

        return 'relatorio gerado';
    }
}
