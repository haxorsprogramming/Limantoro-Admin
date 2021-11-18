<div class="card" id="dMaterial">
    <div class="card-content">
        <span class="card-title">Daftar Karyawan</span>
        <a href="#!" class="waves-effect waves-light btn" @click="tambahKaryawanAtc()">
            <i class="material-icons left">add_circle_outline</i>Tambah Karyawan
        </a>
        <hr />
        <table id="tblMaterial" class="bordered highlight hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataKaryawan as $karyawan)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ ucfirst($karyawan -> name) }}</td>
                    <td>{{ $karyawan -> birth_date }}</td>
                    <td>{{ $karyawan -> address }}</td>
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