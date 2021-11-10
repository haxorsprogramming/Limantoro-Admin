<!-- form edit supplier -->
<div class="card" id="dFormEditSupplier" style="display: none;">
            <div class="card-content">
                <span class="card-title">Edit Supplier</span>
                <div class="row">
                <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
                </div>
                <div class="row">
                    <div class="col s6">
                        <div class="input-field col s12">
                            <input placeholder="Kode Toko" id="txtKodeTokoEdit" type="text" disabled class="validate">
                            <label for="txtKodeTokoEdit" class="active">Kode Toko</label>
                        </div>
                        <div class="input-field col s12">
                            <input placeholder="Nama Toko" id="txtNamaTokoEdit" type="text" class="validate">
                            <label for="txtNamaTokoEdit" class="active">Nama Toko</label>
                        </div>
                        <div class="input-field col s12">
                            <input placeholder="Phone Number" id="txtPhoneNumberEdit" type="text" class="validate">
                            <label for="txtPhoneNumberEdit" class="active">Phone Number</label>
                        </div>
                        <div class="input-field col s12">
                            <input placeholder="Contact Person" id="txtContactPersonEdit" type="text" class="validate">
                            <label for="txtContactPersonEdit" class="active">Contact Person</label>
                        </div>
                        <div class="input-field col s12">
                            <input placeholder="NPWP" id="txtNpwpEdit" type="text" class="validate">
                            <label for="txtNpwpEdit" class="active">NPWP</label>
                        </div>
                        <a href="#!" class="btn" id="btnProsesEdit" @click="prosesEditSupplierAtc()">
                            <i class="material-icons left">file_download_done</i> @{{updateBtnText}}
                        </a>
                        <a href="#!" class="btn deep-orange lighten-1" id="btnProsesHapus" @click="deleteFromEditAtc()">
                            <i class="material-icons left">delete</i> Hapus Supplier
                        </a>
                    </div>
                    <div class="col s6">
                        <div class="input-field col s12">
                            <textarea placeholder="Alamat" class="materialize-textarea" id="txtAlamatEdit"></textarea>
                            <label for="txtAlamat" class="active">Alamat</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>