<div class="row">
    <div class="col s12 m12 l12" id="appCustomer">
        <div class="card" id="dCustomer">
            <div class="card-content">
                <span class="card-title">Daftar Customer</span>
                <a href="#!" class="waves-effect waves-light btn" @click="tambahCustomerAtc()">
                    <i class="material-icons left">add_circle_outline</i>Tambah Customer
                </a>
                <hr />
                <table id="tblCustomer" class="bordered highlight hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact Person</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataCustomer as $Customer)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $Customer -> nama }}</td>
                            <td>{{ $Customer -> alamat }}</td>
                            <td>{{ $Customer -> contact_person }}</td>
                            <td>{{ $Customer -> phone_number }}</td>
                            <td>
                                <a class="btn-floating waves-effect waves-light" href="#!" @click="editAtc('{{ $Customer -> code }}')">
                                    <i class="material-icons">edit_note</i>
                                </a>
                                <a class="btn-floating waves-effect waves-light deep-orange lighten-1" href="#!" @click="deleteAtc('{{ $Customer -> code }}')">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- form tambah Customer -->
        <div class="card" id="dFormTambahCustomer" style="display: none;">
            <div class="card-content">
                <span class="card-title">Tambah Customer</span>
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
                        <a href="#!" class="btn" id="btnProsesTambah" @click="prosesTambahCustomerAtc()">
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
        <!-- form edit Customer -->
        <div class="card" id="dFormEditCustomer" style="display: none;">
            <div class="card-content">
                <span class="card-title">Edit Customer</span>
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
                        <a href="#!" class="btn" id="btnProsesEdit" @click="prosesEditCustomerAtc()">
                            <i class="material-icons left">file_download_done</i> @{{updateBtnText}}
                        </a>
                        <a href="#!" class="btn deep-orange lighten-1" id="btnProsesHapus" @click="deleteFromEditAtc()">
                            <i class="material-icons left">delete</i> Hapus Customer
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
    </div>
</div>

<script src="{{ asset('base/js/customer.js') }}"></script>
