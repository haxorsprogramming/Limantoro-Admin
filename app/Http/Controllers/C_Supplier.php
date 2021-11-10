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
    public function prosesTambahSupplier(Request $request)
    {
        // {'kdToko':kdToko, 'namaToko':namaToko, 'phoneNumber':phoneNumber, 'contactPerson':contactPerson, 'npwp':npwp, 'alamat':alamat}
        $supplier = new M_Supplier();
        $supplier -> code = $request -> kdToko;
        $supplier -> name = $request -> namaToko;
        $supplier -> address = $request -> alamat;
        $supplier -> city = "Medan";
        $supplier -> contact_person = $request -> contactPerson;
        $supplier -> npwp = $request -> npwp;
        $supplier -> phone_number = $request -> phoneNumber;
        $supplier -> admin_code = "VICKY";
        $supplier -> save();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function editDataSupplier(Request $request, $codeSupplier)
    {
        $dataSupplier = M_Supplier::where('code', $codeSupplier) -> first();
        $dr = ['dataSupplier' => $dataSupplier];
        return \Response::json($dr);
    }
    public function prosesUpdateSupplier(Request $request)
    {
        // {'kdToko':kdSupplier, 'namaToko':namaToko, 'phoneNumber':phoneNumber, 'contactPerson':contactPerson, 'npwp':npwp, 'alamat':alamat}
        $kdSupplier = $request -> kdToko;
        M_Supplier::where('code', $kdSupplier) -> update([
            'name' => $request -> namaToko,
            'address' => $request -> alamat,
            'contact_person' => $request -> contactPerson,
            'phone_number' => $request -> phoneNumber,
            'npwp' => $request -> npwp
        ]);
        $dr = ['status' => $kdSupplier];
        return \Response::json($dr);
    }
    public function prosesDeleteSupplier(Request $request)
    {
        $kdSupplier = $request -> kdSupplier;
        M_Supplier::where('code', $kdSupplier) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}
