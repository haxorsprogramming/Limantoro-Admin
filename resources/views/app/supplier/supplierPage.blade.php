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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Phone Number</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataSupplier as $supplier)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $supplier -> name }}</td>
                            <td>{{ $supplier -> address }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- form tambah member -->
        <div class="card" id="dFormTambahSupplier" style="display: none;">
            <div class="card-content">
                <span class="card-title">Tambah Supplier</span>
                <div class="row">
                    <form class="col s6">
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Username" id="txt_username" type="text" class="validate">
                                <label for="txt_username" class="active">Kode Toko</label>
                            </div>
                            <div class="input-field col s12">
                                <input placeholder="Nama" id="txt_nama_member" type="text" class="validate">
                                <label for="txt_nama_member" class="active">Nama Member</label>
                            </div>                            
                            <a href="#!" class="btn" @click="simpan_member_atc()">Tambah Supplier</a>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('base/js/supplier.js') }}"></script>