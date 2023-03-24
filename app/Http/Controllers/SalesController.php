<?php

namespace App\Http\Controllers;

use App\DataTables\SaleDataTable;
use App\DataTables\SaleDataTableEditor;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(SaleDataTable $dataTable)
    {
        return $dataTable->render('sales.index');
    }

    public function store(SaleDataTableEditor $editor)
    {
        return $editor->process(request());
    }

    public function randomNumber()
    {
        $data = [
            ['id'=>rand(0,11111111111),'quantity'=>rand(0,11111111111)],
            ['id'=>rand(0,11111111111),'quantity'=>rand(0,11111111111)]
        ];
        return response()->json(['data'=>$data]);
    }
}
