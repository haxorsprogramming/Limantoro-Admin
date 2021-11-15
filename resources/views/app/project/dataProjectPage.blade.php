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
                    <td>{{ ucfirst($project -> name) }}</td>
                    <td>{{ $project -> type }}</td>
                    <td>{{ $project -> is_finished }}</td>
                    <td>{{ $project -> address }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light" href="#!" @click="editAtc('{{ $project -> code }}')">
                            <i class="material-icons">edit_note</i>
                        </a>
                        <a class="btn-floating waves-effect waves-light deep-orange lighten-1" href="#!" @click="deleteAtc('{{ $project -> code }}')">
                            <i class="material-icons">delete</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>