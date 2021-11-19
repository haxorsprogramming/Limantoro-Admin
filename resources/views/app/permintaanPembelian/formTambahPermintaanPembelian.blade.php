<!-- form tambah project -->
<div class="card" id="dFormTambahPermintaanPembelian" style="display: none;">
    <div class="card-content">
        <h3 class="light">Tambah Permintaan Pembelian</h3>
        <div class="row">
            <a class="btn-floating waves-effect waves-light"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <!-- div col 1 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Kode Project" id="txtNomorPr" type="text" class="validate">
                    <label for="txtNomorPr" class="active">Nomor PR</label>
                </div>
            </div>
            <!-- div col 2 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Penanggung Jawab" id="txtProject" readonly type="text" @click="pilihProjectAtc()">
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
        <hr />
        <!-- data unit  -->
        <span class="card-title">Data Material</span>
        <div class="row">
            <div class="col s12">
                <div style="margin-bottom: 20px;">
                    <a href="javascript:void(0)" class="btn" id="btnTambahUnit">
                        <i class="material-icons left">add_circle_outline</i> Tambah Material
                    </a>
                </div>
                <table id="tblUnit" class="bordered striped highlight">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Pesan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
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

<!-- Modal Trigger -->
<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
</div>

@include('app.permintaanPembelian.modal')