<!-- form tambah project -->
<div class="card" id="dFormTambahPesananPembelian" style="display: none;">
    <div class="card-content">
        <h3 class="light">Tambah Pesanan Pembelian</h3>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" href="javascript:void(0)" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <!-- div col 3 -->
            <div class="col s3">
                <div class="input-field col s12">
                    <input id="txtTanggalPesanan" type="date" class="validate">
                    <label for="txtTanggalPesanan" class="active">Tanggal Pesanan</label>
                </div>
            </div>
            <!-- div col 1 -->
            <div class="col s3">
                <div class="input-field col s12">
                    <input placeholder="Nomor PO" id="txtNomorPo" type="text" class="validate" disabled value="{{ $noPo }}">
                    <label for="txtNomorPo" class="active">Nomor PO</label>
                </div>
            </div>
            <!-- div col 2 -->
            <div class="col s3">
                <div class="input-field col s12">
                    <input placeholder="Nomor PR" id="txtNoPr" readonly type="text" @click="modalPrAtc()">
                    <label for="txtNoPr" class="active">Nomor PR</label>
                </div>
            </div>
             <!-- div col 2 -->
             <div class="col s3">
                <div class="input-field col s12">
                    <input placeholder="Supplier" id="txtKdSupplier" readonly type="text" @click="modalSupplierAtc()">
                    <label for="txtKdSupplier" class="active">Supplier</label>
                </div>
            </div>
        </div>
        <!-- data unit  -->
        <span class="card-title">Data Material</span>
        <div class="row">
            <div class="col s12">
                <table id="tblMaterialPermintaan" class="bordered striped highlight">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th style="width: 200px;">Nama</th>
                            <th style="width: 150px;">Qt Disetujui</th>
                            <th>Qt</th>
                            <th>Harga (@)</th>
                            <th>SubTotal</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="dm in dataMaterialPesanan">
                            <td>@{{ dm.nomor }}</td>
                            <td>@{{ dm.kode }}</td>
                            <td>
                                <b>@{{ dm.nama }}</b><br/>
                                Satuan : @{{ dm.satuan }}
                            </td>
                            <td>@{{ dm.qtApprove }}</td>
                            <td>
                                <input type="text" placeholder="Qt" v-on:keyup="setQtAtc(dm.kode)" v-bind:id="'qt_'+dm.kode" value="0">
                            </td>
                            <td>
                                <input type="text" class="hargaAt" placeholder="Harga" v-on:keyup="setHarga(dm.kode)" v-bind:id="'harga_'+dm.kode" value="0">
                            </td>
                            <td>Rp. @{{ Number(dm.subTotal).toLocaleString() }}<br/></td>
                            <td>
                                <input type="text" placeholder="Note" v-bind:id="'note_'+dm.kode" value="-">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" style="text-align: center;margin-top:30px;">
            <a href="javascript:void(0)" class="btn btn-large" id="btnProsesPemesanan" @click="prosesPemesananAtc()">
                <i class="material-icons left">file_download_done</i> @{{ prosesBtnText }}
            </a>
        </div>

    </div>
</div>

@include('app.pemesananPembelian.modal')