<div class="card" id="dPermintaanPembelian">
    <div class="card-content">
        <h3 class="light">Data Permintaan Pembelian</h3>
        <a href="#!" class="waves-effect waves-light btn" @click="tambahPermintaanPembelian()">
            <i class="material-icons left">add_circle_outline</i>Tambah Permintaan
        </a>

        <table id="tblPermintaan" class="display responsive-table datatable-example table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No PR</th>
                    <th>Tanggal Permintaan</th>
                    <th>Project</th>
                    <th>Penanggung Jawab</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataPermintaan as $permintaan)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td><b>{{ $permintaan -> no_pr }}</b></td>
                    <td>{{ $permintaan -> tanggal }}</td>
                    <td>{{ $permintaan -> projectData -> nama }}</td>
                    <td>{{ $permintaan -> projectData -> penanggung_jawab }}</td>
                    <td>Status</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light" target="new" href="{{ url('/app/permintaan-pembelian/'.$permintaan -> no_pr.'/print') }}">
                            <i class="material-icons">print</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>