<div class="card" id="dMaterial">
    <div class="card-content">
        <span class="card-title">Daftar Material</span>
        <a href="#!" class="waves-effect waves-light btn" @click="tambahMaterialAtc()">
            <i class="material-icons left">add_circle_outline</i>Tambah Material
        </a>
        <hr />
        <table id="tblMaterial" class="display responsive-table datatable-example">
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
                @foreach($dataMaterial as $material)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ ucfirst($material -> name) }}</td>
                    <td>{{ $material -> satuan }}</td>
                    <td>{{ $material -> jumlah }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light" href="#!" @click="editAtc('{{ $material -> code }}')">
                            <i class="material-icons">edit_note</i>
                        </a>
                        <a class="btn-floating waves-effect waves-light deep-orange lighten-1" href="#!" @click="deleteAtc('{{ $material -> code }}')">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>