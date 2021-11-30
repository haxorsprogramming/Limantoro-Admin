<div class="card" id="dPenerimaanBarang">
    <div class="card-content">
        <h3 class="light">Data Penerimaan Barang</h3>
        <a href="javascript:void(0)" class="waves-effect waves-light btn" @click="tambahPenerimaanAtc()">
            <i class="material-icons left">add_circle_outline</i>Tambah Penerimaan Barang
        </a>

        <table id="tblPenerimaanBarang" class="display responsive-table datatable-example table-hover">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No</th>
                    <th>No GR</th>
                    <th>Tanggal</th>
                    <th>No Surat Jalan</th>
                    <th>Supplier</th>
                    <th>No PO</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($dataPenerimaan as $dp)
            <tr>
                <td>{{ $loop -> iteration }}</td>
                <td>{{ $dp -> no_gr }}</td>
                <td>{{ $dp -> tanggal }}</td>
                <td>{{ $dp -> no_surat }}</td>
                <td>{{ $dp -> supplierData -> nama }}</td>
                <td>{{ $dp -> no_po }}</td>
                <td>
                    
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>