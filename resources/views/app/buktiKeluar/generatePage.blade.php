<!-- form generate bukti keluar -->
<div class="card" id="dGenerateBk">
    <div class="card-content">
        <span class="card-title">Generate Bukti Keluar</span>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <!-- div col 1 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Kode Project" id="txtKodeProject" type="text" class="validate">
                    <label for="txtKodeProject" class="active">No POE</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Nama Project" id="txtNamaProject" type="date" class="validate">
                    <label for="txtNamaProject" class="active">Tanggal</label>
                </div>
            </div>
            <!-- div col 2 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <select id="txtJenisProject" class="browser-default" style="margin-top:9px;">
                        <option value="rumah">Ya</option>
                        <option value="toko">Tidak</option>
                    </select>
                    <label class="active">Telah dibayar?</label>
                </div>
                <div class="input-field col s12" style="margin-top:31px;">
                    <input id="txtPenanggungJawab" type="date">
                    <label for="txtPenanggungJawab" class="active">Tanggal dibayar</label>
                </div>
            </div>
            <!-- div col 3 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="text" class="validate">
                    <label for="txtTanggalProject" class="active">Catatan</label>
                </div>
            </div>
        </div>
        <span class="card-title">Data PO</span>
        <div class="row">
            <table class="bordered highlight hover" id="tblDataPo">
                <thead>
                    <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Supplier</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataPo as $po)
                    @php
                        $noPo = $po -> no_po;
                        $dataItem = DB::table('tbl_item_pemesanan_pembelian') -> where('no_po', $noPo) -> get();
                        $totalAwal = 0;
                        foreach($dataItem as $item){
                            $price = $item -> price;
                            $qt = $item -> qt;
                            $totalPrice = $price * $qt;
                            $totalAwal = $totalAwal + $totalPrice;
                        }
                    @endphp
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $po -> no_po }}</td>
                        <td>{{ $po -> supplierData -> nama }}</td>
                        <td>Rp. {{ number_format($totalAwal) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <span class="card-title">Data Payment</span>
        <div class="row">
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="text" class="validate">
                    <label for="txtTanggalProject" class="active">Name Bank 1</label>
                </div>
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="text" class="validate">
                    <label for="txtTanggalProject" class="active">Name Bank 2</label>
                </div>
            </div>
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="text" class="validate">
                    <label for="txtTanggalProject" class="active">No Account Bank 1</label>
                </div>
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="text" class="validate">
                    <label for="txtTanggalProject" class="active">No Account Bank 2</label>
                </div>
            </div>
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="text" class="validate">
                    <label for="txtTanggalProject" class="active">Total payment bank 1</label>
                </div>
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="text" class="validate">
                    <label for="txtTanggalProject" class="active">Total payment bank 1</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 l12 left-align">
                <div class="text-right">
                    <h6 class="m-t-sm light-blue-text"><b>Tagihan</b></h6>
                    <h5 class="">Rp. {{ number_format($totalAwal) }}</h5>
                    <div class="divider"></div>
                    <h6 class="m-t-sm light-blue-text"><b>Diskon</b></h6>
                        <input id="txtTanggalProject" type="text" class="validate" style="width: 200px;">
                    <div class="divider"></div>
                    <h6 class="m-t-sm light-blue-text"><b>Total Tagihan</b></h6>
                    <h5 class="">Rp. </h5>
                    <div class="divider"></div>
                    <h6 class="m-t-md text-success light-blue-text"><b>Total Dibayar</b></h6>
                    <h4 class="text-success">Rp. </h4>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
        <div class="row" style="text-align: center;margin-top:30px;">
            <a href="javascript:void(0)" class="btn btn-large" @click="prosesGenerateAtc()" id="btnSimpanProject">
                <i class="material-icons left">file_download_done</i> @{{ prosesGenerateText }}
            </a>
        </div>
    </div>
</div>

<script src="{{ asset('base/js/generateBk.js') }}"></script>