<div class="card" id="dKaryawan">
    <div class="card-content">
        <h3 class="light">Data Karyawan</h3>
        <a href="#!" class="waves-effect waves-light btn" @click="tambahKaryawanAtc()">
            <i class="material-icons left">add_circle_outline</i>Tambah Karyawan
        </a>
        <hr />
        <table id="tblKaryawan" class="bordered highlight hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code User</th>
                    <th>Name</th>
                    <th>NIK</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataKaryawan as $karyawan)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $karyawan -> code }}</td>
                    <td>{{ $karyawan -> name }}</td>
                    <td>{{ $karyawan -> id_number }}</td>
                    <td>{{ $karyawan -> roleData -> title }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light" href="#!" @click="editAtc('{{ $karyawan -> code }}')">
                            <i class="material-icons">edit_note</i>
                        </a>
                        <a class="btn-floating waves-effect waves-light deep-orange lighten-1" href="#!" @click="deleteAtc('{{ $karyawan -> code }}')">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>