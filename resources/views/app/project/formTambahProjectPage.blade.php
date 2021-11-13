<!-- form tambah project -->
<div class="card" id="dFormTambahProject" style="display: none;">
    <div class="card-content">
        <span class="card-title">Tambah Project</span>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <!-- div col 1 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Kode Project" id="txtKodeProject" type="text" class="validate">
                    <label for="txtKodeProject" class="active">Kode Project</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Nama Project" id="txtNamaProject" type="text" class="validate">
                    <label for="txtNamaProject" class="active">Nama Project</label>
                </div>
            </div>
            <!-- div col 2 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Penanggung Jawab" @click="showModalPenanggungJawabAtc()" id="txtPenanggungJawab" readonly type="text">
                    <label for="txtPenanggungJawab" class="active">Penanggung Jawab</label>
                </div>
                <div class="input-field col s12">
                    <select id="txtJenisProject" class="browser-default" style="margin-top:9px;">
                        <option value="rumah">Rumah</option>
                        <option value="toko">Toko</option>
                        <option value="komplek">Komplek</option>
                        <option value="sekolah">Sekolah</option>
                        <option value="kantor">Kantor</option>
                    </select>
                    <label class="active">Jenis Project</label>
                </div>
            </div>
            <!-- div col 3 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="date" class="validate">
                    <label for="txtTanggalProject" class="active">Tanggal Project</label>
                </div>
                <div class="input-field col s12">
                    <select id="txtStatusProject" class="browser-default" style="margin-top:9px;">
                        <option value="0">Berjalan</option>
                        <option value="1">Selesai</option>
                    </select>
                    <label class="active">Status Project</label>
                </div>
            </div>
        </div>
        <hr />
        <!-- data unit  -->
        <span class="card-title">Data Unit</span>
        <div class="row">
            <div class="col s12">
                <div style="margin-bottom: 20px;">
                    <a href="javascript:void(0)" class="btn" @click="tambahUnitAtc()"><i class="material-icons left">add_circle_outline</i> Tambah Unit</a>
                </div>
                <table id="tblUnit" class="bordered striped highlight">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Ukuran Tanah</th>
                            <th>Ukuran Bangunan</th>
                            <th>Jumlah Unit</th>
                            <th>Jumlah Unit Terjual</th>
                            <th>Harga Jual</th>
                            <th>Marketing Fee (%)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="unit in dataUnit">
                            <td>1</td>
                            <td>@{{ unit.namaUnit }}</td>
                            <td>@{{ unit.ukuranTanah }}</td>
                            <td>@{{ unit.ukuranBangunan }}</td>
                            <td>@{{ unit.jumlahUnit }}</td>
                            <td>@{{ unit.unitTerjual }}</td>
                            <td>@{{ unit.hargaJual }}</td>
                            <td>@{{ unit.marketingFee }}</td>
                            <td>
                                <a class="btn" href="javascript:void(0)" @click="editUnitAtc(unit.namaUnit)">
                                    <i class="material-icons">edit_note</i>
                                </a>
                                <a class="btn deep-orange lighten-1" href="javascript:void(0)" @click="deleteUnitAtc(unit.namaUnit)">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" style="text-align: center;margin-top:30px;">
            <a href="javascript:void(0)" class="btn btn-large" @click="simpanProjectAtc()"><i class="material-icons left">file_download_done</i> Simpan Project</a>
        </div>

    </div>
</div>

@include('app.project.modal')