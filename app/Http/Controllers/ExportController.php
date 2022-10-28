<?php

namespace App\Http\Controllers;

use App\Models\Export;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $export = Export::paginate(10);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Export  $export
     * @return \Illuminate\Http\Response
     */
    public function destroy(Export $export)
    {
        Storage::delete($export->file_name);
        $export->delete();

        return "deletando";
    }
}
