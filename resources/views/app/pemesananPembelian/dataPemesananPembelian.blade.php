<div class="card" id="dPemesananPembelian">
    <div class="card-content">
        <h3 class="light">Data Pemesanan Pembelian</h3>
        <a href="javascript:void(0)" class="waves-effect waves-light btn" @click="tambahPemesananAtc()">
            <i class="material-icons left">add_circle_outline</i>Tambah Pemesanan
        </a>

        <table id="tblPemesananPembelian" class="display responsive-table datatable-example table-hover">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No</th>
                    <th>No PO</th>
                    <th>Tanggal Permintaan</th>
                    <th>No PR</th>
                    <th>Supplier</th>
                    <th>No Bukti Keluar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($dataPemesananPembelian as $ps)
            <tr>
                <td>{{ $loop -> iteration }}</td>
                <td>{{ $ps -> no_po }}</td>
                <td>{{ $ps -> tanggal }}</td>
                <td>{{ $ps -> no_pr }}</td>
                <td>{{ $ps -> supplierData -> nama }}</td>
                <td>{{ $ps -> no_poe }}</td>
                <td>
                    <a class="btn-floating waves-effect waves-light btnLock" target="new" href="#!">
                        <i class="material-icons">lock</i>
                    </a>
                    <a class="btn-floating waves-effect waves-light btnGenBk" target="new" href="#!">
                        <i class="material-icons">outbox</i>
                    </a>
                    <a class="btn-floating waves-effect waves-light btnPrintBk" target="new" href="#!">
                        <i class="material-icons">print</i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>