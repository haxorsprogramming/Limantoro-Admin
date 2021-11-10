<!-- form tambah supplier -->
<div class="card" id="dFormTambahSupplier" style="display: none;">
    <div class="card-content">
        <span class="card-title">Tambah Supplier</span>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <div class="col s6">
                <div class="input-field col s12">
                    <input placeholder="Kode Toko" id="txtKodeToko" type="text" class="validate">
                    <label for="txtKodeToko" class="active">Kode Toko</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Nama Toko" id="txtNamaToko" type="text" class="validate">
                    <label for="txtNamaToko" class="active">Nama Toko</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Phone Number" id="txtPhoneNumber" type="text" class="validate">
                    <label for="txtPhoneNumber" class="active">Phone Number</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Contact Person" id="txtContactPerson" type="text" class="validate">
                    <label for="txtContactPerson" class="active">Contact Person</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="NPWP" id="txtNpwp" type="text" class="validate">
                    <label for="txtNpwp" class="active">NPWP</label>
                </div>
                <a href="#!" class="btn" id="btnProsesTambah" @click="prosesTambahSupplierAtc()">
                    <i class="material-icons left">file_download_done</i> @{{prosesBtnText}}
                </a>
            </div>
            <div class="col s6">
                <div class="input-field col s12">
                    <textarea placeholder="Alamat" class="materialize-textarea" id="txtAlamat"></textarea>
                    <label for="txtAlamat" class="active">Alamat</label>
                </div>
            </div>
        </div>
    </div>
</div>