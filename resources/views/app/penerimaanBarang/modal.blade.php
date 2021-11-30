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
                <tr @click="rwSupplierAtc('{{ $supplier -> kode }}|{{ $supplier -> nama }}')" class="rwSupplier" id="rwSupplier_{{ $supplier -> kode }}">
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

<!-- div modal data po  -->
<div id="modalPo" class="modal">
    <div class="modal-content">
        <h4>Pilih PO</h4>
        <table id="tblModalPo" class="table bordered highlight">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No PO</th>
                    <th>Tanggal</th>
                    <th>No PR </th>
                </tr>
            </thead>
            <tbody>
               <tr v-for="dp in dataPo" @click="rwPoAtc(dp.noPo)" class="rwPo" v-bind:id="'rwPo_'+dp.noPo">
                  <td>@{{ dp.noPo }}</td>
                  <td>@{{ dp.tanggal }}</td>
                  <td>@{{ dp.noPr }}</td> 
               </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-blue btn-flat">Tutup</a>
        <a href="javascript:void(0)" class="btn waves-effect waves-blue" @click="pilihPoAtc()">Pilih</a>
    </div>
</div>
