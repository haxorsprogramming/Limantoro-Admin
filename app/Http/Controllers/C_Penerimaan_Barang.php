<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Penerimaan_Barang;
use App\Models\M_Supplier;
use App\Models\M_Pemesanan_Pembelian;
use App\Models\M_Item_Pemesanan_Pembelian;
use App\Models\M_Item_Penerimaan_Barang;

use App\Http\Controllers\C_Helper;

class C_Penerimaan_Barang extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this -> helperCtr = $helperCtr;
    }

    public function penerimaanBarangPage()
    {
        $noGr = $this -> getNoGr();
        $dataSupplier = M_Supplier::all();
        $dataPenerimaan = M_Penerimaan_Barang::all();
        $dr = ['noGr' => $noGr, 'dataSupplier' => $dataSupplier, 'dataPenerimaan' => $dataPenerimaan];
        return view('app.penerimaanBarang.penerimaanBarangPage', $dr);
    }
    public function getPo(Request $request, $kdSup)
    {
        $dataPemesanan = M_Pemesanan_Pembelian::where('kode_supplier', $kdSup) -> get();
        $dr = ['status' => $kdSup, 'dataPemesanan' => $dataPemesanan];
        return \Response::json($dr);
    }
    public function getMaterial(Request $request, $noPo)
    {
        $dataItemMaterial = M_Item_Pemesanan_Pembelian::where('no_po', $noPo) -> get();
        $dr = ['dataItemMaterial' => $dataItemMaterial];
        return view('app.penerimaanBarang.materialData', $dr);
    }
    public function prosesPenerimaanBarang(Request $request)
    {
        $dataUser = $this -> helperCtr -> getUserData();
        // {'noGr':noGr, 'kdSupplier':kdSupplier, 'tanggal':tanggal, 'noSurat':noSurat, 'noPo':noPo, 'qtMasuk':dBantuan.qtMasuk}
        $kdSupplier = $request -> kdSupplier;
        $noGr = $this -> getNoGr();
        // save penerimaan barang
        $pm = new M_Penerimaan_Barang();
        $pm -> user_request = $dataUser -> username;
        $pm -> no_gr = $noGr;
        $pm -> tanggal = $request -> tanggal;
        $pm -> no_surat = $request -> noSurat;
        $pm -> kode_supplier = $request -> kdSupplier;
        $pm -> no_po = $request -> noPo;
        $pm -> checker_code = "-";
        $pm -> active = "1";
        $pm -> save();
        // save item penerimaan barang 
        $qtMasuk = $request -> qtMasuk;
        $or = 0;
        foreach($qtMasuk as $qt){
            $ipb = new M_Item_Penerimaan_Barang();
            $ipb -> user_request =  $dataUser -> username;
            $ipb -> no_gr =  $noGr;
            $ipb -> kode_material = $qtMasuk[$or]['kode'];
            $ipb -> qt = $qtMasuk[$or]['qt'];
            $ipb -> active = "1";
            $ipb -> save();
            $or++;
        }
        $dr = ['status' => $kdSupplier];
        return \Response::json($dr);
    }
    function getNoGr()
    {
        $totalBk = M_Penerimaan_Barang::count();
        if($totalBk == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "GR-";
            $noGr = $huruf . sprintf("%07s", $urutan);
            return($noGr);
        }else{
            $noGrLast = M_Penerimaan_Barang::orderby('id', 'desc') -> limit(1) -> get();
            $noGr = $noGrLast[0] -> no_gr;
            $lastId = substr($noGr, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "GR-";
            $noGr = $huruf . sprintf("%07s", $urutan);
            return($noGr);
        }
    }
}
