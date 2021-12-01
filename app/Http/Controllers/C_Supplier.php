<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use PDF;

use App\Models\M_Supplier;

use App\Http\Controllers\C_Helper;

class C_Supplier extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this -> helperCtr = $helperCtr;
    }

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
        $dataUser = $this -> helperCtr -> getUserData();
        // {'kdToko':kdToko, 'namaToko':namaToko, 'phoneNumber':phoneNumber, 'contactPerson':contactPerson, 'npwp':npwp, 'alamat':alamat}
        $supplier = new M_Supplier();
        $supplier -> kode = $request -> kdToko;
        $supplier -> nama = $request -> namaToko;
        $supplier -> alamat = $request -> alamat;
        $supplier -> kota = "Medan";
        $supplier -> contact_person = $request -> contactPerson;
        $supplier -> npwp = $request -> npwp;
        $supplier -> phone_number = $request -> phoneNumber;
        $supplier -> user = $dataUser -> username;
        $supplier -> active = '1';
        $supplier -> save();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function editDataSupplier(Request $request, $codeSupplier)
    {
        $dataSupplier = M_Supplier::where('kode', $codeSupplier) -> first();
        $dr = ['dataSupplier' => $dataSupplier];
        return \Response::json($dr);
    }
    public function prosesUpdateSupplier(Request $request)
    {
        // {'kdToko':kdSupplier, 'namaToko':namaToko, 'phoneNumber':phoneNumber, 'contactPerson':contactPerson, 'npwp':npwp, 'alamat':alamat}
        $kdSupplier = $request -> kdToko;
        M_Supplier::where('kode', $kdSupplier) -> update([
            'nama' => $request -> namaToko,
            'alamat' => $request -> alamat,
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
        M_Supplier::where('kode', $kdSupplier) -> delete();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function cetakSupplier()
    {
        $pdf = PDF::loadview('supplier');
        return $pdf->stream();
    }
}
