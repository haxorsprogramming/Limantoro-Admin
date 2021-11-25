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
                    <input id="txtTanggalProject" type="date" class="validate">
                    <label for="txtTanggalProject" class="active">Tanggal Pesanan</label>
                </div>
            </div>
            <!-- div col 1 -->
            <div class="col s3">
                <div class="input-field col s12">
                    <input placeholder="Nomor PO" id="txtNomorPr" type="text" class="validate" disabled>
                    <label for="txtNomorPr" class="active">Nomor PO</label>
                </div>
            </div>
            <!-- div col 2 -->
            <div class="col s3">
                <div class="input-field col s12">
                    <input placeholder="Nomor PR" id="txtProject" readonly type="text" @click="modalPrAtc()">
                    <label for="txtProject" class="active">Nomor PR</label>
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
                <div style="margin-bottom: 20px;">
                    <a href="javascript:void(0)" class="btn" id="btnTambahMaterial">
                        <i class="material-icons left">add_circle_outline</i> Tambah Material
                    </a>
                </div>
                <table id="tblMaterialPermintaan" class="bordered striped highlight">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th style="width: 200px;">Nama</th>
                            <th style="width: 150px;">Satuan</th>
                            <th>Jumlah</th>
                            <th>Pesan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" style="text-align: center;margin-top:30px;">
            <a href="javascript:void(0)" class="btn btn-large" id="btnSimpanProject">
                <i class="material-icons left">file_download_done</i> @{{ prosesBtnText }}
            </a>
        </div>

    </div>
</div>

@include('app.pemesananPembelian.modal')