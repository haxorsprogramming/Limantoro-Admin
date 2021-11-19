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
                    <td>{{ $supplier -> nama }}</td>
                    <td>{{ $supplier -> alamat }}</td>
                    <td>{{ $supplier -> contact_person }}</td>
                    <td>{{ $supplier -> phone_number }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light" href="#!" @click="editAtc('{{ $supplier -> kode }}')">
                            <i class="material-icons">edit_note</i>
                        </a>
                        <a class="btn-floating waves-effect waves-light deep-orange lighten-1" href="#!" @click="deleteAtc('{{ $supplier -> kode }}')">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>