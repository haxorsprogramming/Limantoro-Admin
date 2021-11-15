<div class="card" id="dProject">
    <div class="card-content">
        <span class="card-title">Data Project</span>
        <a href="#!" class="waves-effect waves-light btn" @click="tambahProjectAtc()">
            <i class="material-icons left">add_circle_outline</i>Tambah Project
        </a>
        <hr />
        <table id="tblProject" class="display responsive-table datatable-example table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataProject as $project)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td><b>{{ ucfirst($project -> name) }}</b></td>
                    <td>{{ $project -> type }}</td>
                    <td>{{ $project -> address }}</td>
                    @if($project -> is_finished === 0)
                    <td>Berjalan</td>
                    @else
                    <td>Selesai</td>
                    @endif
                    <td>
                        <a class="btn-floating waves-effect waves-light btnDetail" href="javascript:void(0)" @click="detailAtc('{{ $project -> code }}')">
                            <i class="material-icons">fact_check</i>
                        </a>
                        <a class="btn-floating waves-effect waves-light deep-orange lighten-1 btnHapus" href="javascript:void(0)" @click="deleteAtc('{{ $project -> code }}')">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>