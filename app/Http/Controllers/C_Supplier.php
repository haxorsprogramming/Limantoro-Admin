<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\M_Supplier;

class C_Supplier extends Controller
{
    public function supplierPage()
    {
        $dataSupplier = M_Supplier::all();
        $dr = ['dataSupplier' => $dataSupplier];
        return view('app.supplier.supplierPage', $dr);
    }
    public function jsonDatatable()
    {
        return Datatables::of(M_Supplier::all()) -> make(true);
    }
}
