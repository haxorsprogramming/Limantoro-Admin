<div class="card" id="dProject">
    <div class="card-content">
        <span class="card-title">Data Project</span>
        <a href="#!" class="waves-effect waves-light btn" @click="tambahProjectAtc()">
            <i class="material-icons left">add_circle_outline</i>Tambah Project
        </a>
        <hr />
        <table id="tblProject" class="display responsive-table datatable-example table-hover">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataProject as $project)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td><b>{{ ucfirst($project -> nama) }}</b></td>
                    <td>{{ $project -> tipe }}</td>
                    <td>{{ $project -> alamat }}</td>
                    @if($project -> selesai === "0")
                    <td>Berjalan</td>
                    @else
                    <td>Selesai</td>
                    @endif
                    <td>
                        <a class="btn-floating waves-effect waves-light btnDetail" href="javascript:void(0)" @click="detailAtc('{{ $project -> kode }}')">
                            <i class="material-icons">fact_check</i>
                        </a>
                        <a class="btn-floating waves-effect waves-light deep-orange lighten-1 btnHapus" href="javascript:void(0)" @click="deleteAtc('{{ $project -> kode }}')">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>