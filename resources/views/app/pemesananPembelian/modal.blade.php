<!-- div modal supplier  -->
<div id="modalSupplier" class="modal">
    <div class="modal-content">
        <h4>Pilih Supplier</h4>
        <table id="tblModalSupplier" class="table bordered highlight">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataSupplier as $supplier)
                <tr @click="rwSupplierAtc('{{ $supplier -> kode }}')" class="rwSupplier" id="rwSupplier_{{ $supplier -> kode }}">
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $supplier -> kode }}</td>
                    <td>{{ $supplier -> nama }}</td>
                    <td>{{ $supplier -> alamat }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-blue btn-flat">Tutup</a>
        <a href="javascript:void(0)" class="btn waves-effect waves-blue" @click="pilihSupplierAtc()">Pilih</a>
    </div>
</div>

<!-- div modal permintaan pembelian  -->
<div id="modalPermintaanPembelian" class="modal">
    <div class="modal-content">
        <h4>Pilih PR</h4>
        <table id="tblModalPermintaanPembelian" class="table bordered highlight">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No</th>
                    <th>Kode Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            
        </table>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-blue btn-flat">Tutup</a>
        <a href="javascript:void(0)" class="btn waves-effect waves-blue">Pilih</a>
    </div>
</div>

