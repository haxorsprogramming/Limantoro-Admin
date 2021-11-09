<div class="row">
    <div class="col s12 m12 l12" id="appSupplier">
        <div class="card" id="dSupplier">
            <div class="card-content">
                <span class="card-title">Daftar Supplier</span>
                <a href="#!" class="waves-effect waves-light btn" @click="tambahSupplierAtc()">
                    <i class="material-icons left">add_circle_outline</i>Tambah Supplier
                </a>
                <hr />
                <table id="tblSupplier" class="display responsive-table datatable-example">
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
                        @foreach($dataSupplier as $supplier)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $supplier -> code }}</td>
                            <td>{{ $supplier -> address }}</td>
                            <td>{{ $supplier -> contact_person }}</td>
                            <td>{{ $supplier -> phone_number }}</td>
                            <td>
                                <a class="btn-floating waves-effect waves-light" href="javascript:void(0)" @click="editAtc('{{ $supplier -> code }}')">
                                    <i class="material-icons">edit_note</i>
                                </a>
                                <a class="btn-floating waves-effect waves-light deep-orange lighten-1" href="#!"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
                        <a href="#!" class="btn" id="btnProsesEdit">
                            <i class="material-icons left">file_download_done</i> @{{updateBtnText}}
                        </a>
                        <a href="#!" class="btn deep-orange lighten-1" id="btnProsesHapus">
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
    </div>
</div>

<script src="{{ asset('base/js/supplier.js') }}"></script>