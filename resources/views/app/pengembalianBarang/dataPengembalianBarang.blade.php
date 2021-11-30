<div class="card" id="dPengembalianBarang">
    <div class="card-content">
        <h3 class="light">Data Pengembalian Barang</h3>
        <a href="javascript:void(0)" class="waves-effect waves-light btn" @click="tambahPengembalianAtc()">
            <i class="material-icons left">add_circle_outline</i>Tambah Pengembalian Barang
        </a>

        <table id="tblPengembalianBarang" class="display responsive-table datatable-example table-hover">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No</th>
                    <th>No GRN</th>
                    <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>No PO</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($dataPengembalian as $dp)
            <tr>
                <td>{{ $loop -> iteration }}</td>
                <td><b>{{ $dp -> no_grn }}</b></td>
                <td>{{ $dp -> tanggal }}</td>
                <td>{{ $dp -> supplierData -> nama }}</td>
                <td>{{ $dp -> no_po }}</td>
                <td></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>