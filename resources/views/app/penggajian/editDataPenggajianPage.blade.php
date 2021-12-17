<!-- form edit data penggajian  -->
<div class="card" id="dFormEditPenggajian">
    <div class="card-content">
        <h3 class="light">Edit Data Penggajian Karyawan</h3>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <div class="col s6">
                <div class="input-field col s12">
                    <input placeholder="Nama Karyawan" id="txtNamaKaryawan" value="{{ $dataKaryawan -> karyawanData -> nama_lengkap }}" type="text" disabled class="validate">
                    <input type="hidden" value="{{ $dataKaryawan -> username }}" id="txtUsername" />
                    <label for="txtNamaKaryawan" class="active">Nama Karyawan</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <select id="txtStatusKawin" class="browser-default" style="margin-top:9px;">
                        <option value="belum">Belum menikah</option>
                        <option value="sudah">Sudah Menikah</option>
                    </select>
                    <label class="active">Status Perkawinan</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Jumlah Tanggungan" value="{{ $dataKaryawan -> jumlah_tanggungan }}" id="txtJumlahTanggungan" type="number" max="3" min="0" class="validate">
                    <label for="txtJumlahTanggungan" class="active">Jumlah Tanggungan</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Gaji Pokok" value="{{ $dataKaryawan -> gaji_pokok }}" id="txtGajiPokok" type="number" max="1000000000000" min="0" class="validate">
                    <label for="txtGajiPokok" class="active">Gaji Pokok</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Tunjangan Tetap" value="{{ $dataKaryawan -> tunjangan_tetap }}" id="txtTunjanganTetap" type="number" max="1000000000000" min="0" class="validate">
                    <label for="txtTunjanganTetap" class="active">Tunjangan Tetap</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Tunjangan Makan" value="{{ $dataKaryawan -> tunjangan_makan }}" id="txtTunjanganMakan" type="number" max="1000000000000" min="0" class="validate">
                    <label for="txtTunjanganMakan" class="active">Tunjangan Makan</label>
                </div>
            </div>
            <div class="col s6">
                <div class="input-field col s12">
                    <input placeholder="Hari Kerja" value="{{ $dataKaryawan -> hari_kerja }}" id="txtHariKerja" type="number" max="32" min="0" class="validate">
                    <label for="txtHariKerja" class="active">Hari Kerja</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Lembur" value="{{ $dataKaryawan -> lembur }}" id="txtLembur" type="number" max="3" min="0" class="validate">
                    <label for="txtLembur" class="active">Lembur</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Absent" value="{{ $dataKaryawan -> absent }}" id="txtAbsent" type="number" max="3" min="0" class="validate">
                    <label for="txtAbsent" class="active">Absent</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Split Shift" value="{{ $dataKaryawan -> split_shift }}" id="txtSplitShift" type="number" max="3" min="0" class="validate">
                    <label for="txtSplitShift" class="active">Split Shift</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Kasbon" value="{{ $dataKaryawan -> kasbon }}" id="txtKasbon" type="number" max="1000000000000" min="0" class="validate">
                    <label for="txtKasbon" class="active">Kasbon</label>
                </div>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <a href="javascript:void(0)" class="btn btn-large" id="btnProsesUpdate" @click="simpanDataPenggajianAtc()">
                <i class="material-icons left">file_download_done</i> @{{ btnProsesText }}
            </a>
        </div>
    </div>
</div>

<script src="{{ asset('base/js/editDataPenggajian.js') }}"></script>