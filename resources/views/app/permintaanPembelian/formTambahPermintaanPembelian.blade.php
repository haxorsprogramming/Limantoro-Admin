<!-- form tambah project -->
<div class="card" id="dFormTambahPermintaanPembelian" style="display: none;">
    <div class="card-content">
        <h3 class="light">Tambah Permintaan Pembelian</h3>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" href="javascript:void(0)" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <!-- div col 1 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Nomor PR" id="txtNomorPr" type="text" class="validate" disabled value="{{ $noPr }}">
                    <label for="txtNomorPr" class="active">Nomor PR</label>
                </div>
            </div>
            <!-- div col 2 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Project" id="txtProject" readonly type="text" @click="pilihProjectAtc()">
                    <label for="txtProject" class="active">Project</label>
                </div>
            </div>
            <!-- div col 3 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="date" class="validate">
                    <label for="txtTanggalProject" class="active">Tanggal Permintaan</label>
                </div>
            </div>
        </div>
        <!-- data unit  -->
        <span class="card-title">Data Material</span>
        <div class="row">
            <div class="col s12">
                <div style="margin-bottom: 20px;">
                    <a href="javascript:void(0)" class="btn" id="btnTambahMaterial" @click="tambahMaterialAtc()">
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
                        <tr v-for="material in materialData">
                            <td>@{{material.no}}</td>
                            <td>@{{material.kode}}</td>
                            <td>@{{material.nama}}</td>
                            <td>@{{material.satuan}}</td>
                            <td><input type="number" placeholder="Jumlah barang" style="width: 150px;" maxlength="5" :id="'txtJumlahBarang_'+material.kode"></td>
                            <td><input type="text" placeholder="Pesan" style="width: 200px;" :id="'txtPesan_'+material.kode"></td>
                            <td><a class="btn">Hapus</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" style="text-align: center;margin-top:30px;">
            <a href="javascript:void(0)" class="btn btn-large" id="btnSimpanProject" @click="prosesPermintaanAtc()">
                <i class="material-icons left">file_download_done</i> @{{ prosesBtnText }}
            </a>
        </div>

    </div>
</div>

@include('app.permintaanPembelian.modal')