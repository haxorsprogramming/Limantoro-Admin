<!-- form edit data penggajian  -->
<div class="card" id="dFormEditMaterial">
    <div class="card-content">
    <h3 class="light">Edit Data Penggajian Karyawan</h3>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <div class="col s6">
                <div class="input-field col s12">
                    <input placeholder="Nama Karyawan" id="txtNamaKaryawan" type="text" disabled class="validate">
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
                    <input placeholder="Jumlah Tanggungan" value="0" id="txtJumlahTanggungan" type="number" max="3" min="0" class="validate">
                    <label for="txtJumlahTanggungan" class="active">Jumlah Tanggungan</label>
                </div>
                <a href="#!" class="btn" id="btnProsesUpdate">
                    <i class="material-icons left">file_download_done</i> Simpan Data Penggajian Karyawan
                </a>
            </div>
            <div class="col s6">
                
            </div>
        </div>
    </div>
</div>