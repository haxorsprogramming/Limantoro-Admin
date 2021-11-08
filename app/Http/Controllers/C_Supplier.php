<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Models\M_Supplier;

class C_Supplier extends Controller
{
    public function supplierPage()
    {
        return view('app.supplier.supplierPage');
    }
    public function jsonDatatable()
    {
        return Datatables::of(M_Supplier::all())->make(true);
    }
}
