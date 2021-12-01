<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Pengembalian_Barang;
use App\Models\M_Supplier;
use App\Models\M_Item_Pemesanan_Pembelian;
use App\Models\M_Item_Pengembalian_Barang;

use App\Http\Controllers\C_Helper;

class C_Pengembalian_Barang extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this -> helperCtr = $helperCtr;
    }

    public function pengembalianBarangPage()
    {
        $noGrn = $this -> getNoGrn();
        $dataSupplier = M_Supplier::all();
        $dataPengembalian = M_Pengembalian_Barang::all();
        $dr = ['noGrn' => $noGrn, 'dataSupplier' => $dataSupplier, 'dataPengembalian' => $dataPengembalian];
        return view('app.pengembalianBarang.pengembalianBarangPage', $dr);
    }
    public function getMaterial(Request $request, $noPo)
    {
        $dataItemMaterial = M_Item_Pemesanan_Pembelian::where('no_po', $noPo) -> get();
        $dr = ['dataItemMaterial' => $dataItemMaterial];
        return view('app.pengembalianBarang.materialData', $dr);
    }
    public function prosesPengembalianBarang(Request $request)
    {
        $dataUser = $this -> helperCtr -> getUserData();
        // {'noGr':noGr, 'kdSupplier':kdSupplier, 'tanggal':tanggal, 'noPo':noPo, 'qtMasuk':dBantuan.qtMasuk}
        $noGrn = $this -> getNoGrn();
        // save pengembalian barang 
        $pb = new M_Pengembalian_Barang();
        $pb -> user_request = $dataUser -> username;
        $pb -> no_grn = $noGrn;
        $pb -> tanggal = $request -> tanggal;
        $pb -> kode_supplier = $request -> kdSupplier;
        $pb -> no_po = $request -> noPo;
        $pb -> active = "1";
        $pb -> save();
        // save item pembalian barang
        $itemMaterial = $request -> qtMasuk;
        $or = 0;
        foreach($itemMaterial as $im){
            $ipb = new M_Item_Pengembalian_Barang();
            $ipb -> user_request = $dataUser -> username;
            $ipb -> no_grn = $noGrn;
            $ipb -> kode_material = $itemMaterial[$or]['kode'];
            $ipb -> qt = $itemMaterial[$or]['qt'];
            $ipb -> active = "1";
            $ipb -> save();
        } 
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    function getNoGrn()
    {
        $totalBk = M_Pengembalian_Barang::count();
        if($totalBk == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "GRN-";
            $noGrn = $huruf . sprintf("%07s", $urutan);
            return($noGrn);
        }else{
            $noGrnLast = M_Pengembalian_Barang::orderby('id', 'desc') -> limit(1) -> get();
            $noGrn = $noGrnLast[0] -> no_grn;
            $lastId = substr($noGrn, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "GRN-";
            $noGrn = $huruf . sprintf("%07s", $urutan);
            return($noGrn);
        }
    }
}
