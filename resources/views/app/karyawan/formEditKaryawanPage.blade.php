<!-- form tambah karyawan -->
<div class="card" id="dFormEditKaryawan">
    <div class="card-content">
        <h3 class="light">Edit Karyawan</h3>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" href="javascript:void(0)" @click="kembaliAtc()">
                <i class="material-icons">arrow_back</i>
            </a>
        </div>
        <div class="row">
            <div class="col s6">
                <div class="input-field col s12">
                    <input placeholder="Username" id="txtUsername" disabled type="text" class="validate" value="{{ $kdKaryawan }}">
                    <label for="txtUsername" class="active">Username</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Nama Karyawan" id="txtNamaKaryawan" type="text" class="validate" value="{{ $karyawan['nama_lengkap'] }}">
                    <label for="txtNamaKaryawan" class="active">Nama Karyawan</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="NIK" id="txtNik" type="text" class="validate" value="{{ $karyawan['nik'] }}">
                    <label for="txtNik" class="active">NIK (Nomor Induk Kependudukan)</label>
                </div>
                <div class="input-field col s12">
                    <input id="txtTanggalLahir" type="date" class="validate" value="{{ $karyawan['tanggal_lahir'] }}">
                    <label for="txtTanggalLahir" class="active">Tanggal Lahir</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <select id="txtJk" class="browser-default" style="margin-top:9px;">
                        <option value="M">Pria</option>
                        <option value="F">Wanita</option>
                    </select>
                    <label class="active">Jenis Kelamin</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Email" id="txtEmail" type="text" class="validate" value="{{ $karyawan['email'] }}">
                    <label for="txtEmail" class="active">Email</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="No Handphone" id="txtHp" type="text" class="validate" value="{{ $karyawan['no_hp'] }}">
                    <label for="txtHp" class="active">No Handphone</label>
                </div>
            </div>
            <div class="col s6">
                <div class="input-field col s12" style="text-align:center;">
                    <img src="{{ asset('/file/user_pic/'.$kdKaryawan.'.png') }}" style="width:30%;" id="txtPreviewUpload">
                    <br/>
                    <div class="text-muted">Foto profil</div>
                    <input type="file" id="txtFoto" onchange="setImg()">
                </div>
                <div class="input-field col s12">
                    <textarea class="materialize-textarea" id="txtAlamat"></textarea>
                    <label for="txtAlamat" class="active">Alamat</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <select id="txtJabatan" class="browser-default" style="margin-top:9px;">
                        <option value="1">Owner</option>
                        <option value="2">Manager</option>
                        <option value="3">Manager Lapangan</option>
                        <option value="4">Purchashing</option>
                    </select>
                    <label class="active">Jabatan</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <select id="txtJenis" class="browser-default" style="margin-top:9px;">
                        <option value="monthly">Bulanan</option>
                        <option value="weekly">Mingguan</option>
                        <option value="daily">Harian</option>
                    </select>
                    <label class="active">Jenis</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <select id="txtBisaLogin" class="browser-default" style="margin-top:9px;" onchange="bisaLoginSelect()">
                        <option value="-">-- Pilih --</option>
                        <option value="y">Ya</option>
                        <option value="n">Tidak</option>
                    </select>
                    <label class="active">Bisa login?</label>
                </div>
                <div class="input-field col s12" style="display: none;" id="dPasswordUser">
                    <input placeholder="Password" id="txtPassword" type="password" class="validate">
                    <label for="txtPassword" class="active">Password</label>
                </div>
            </div>
        </div>
        <div class="row center-align">
            <a href="javascript:void(0)" class="btn btn-large" id="btnProses" @click="prosesAtc()">
                <i class="material-icons left">file_download_done</i> @{{prosesBtnText}}
            </a>
        </div>
    </div>
</div>

<script src="{{ asset('base/js/editKaryawan.js') }}"></script>