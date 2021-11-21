<!-- div modal project  -->
<div id="modalProject" class="modal">
    <div class="modal-content">
        <h4>Pilih project</h4>
        <table id="tblModalProject" class="table bordered highlight">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Project</th>
                    <th>Nama Project</th>
                    <th>Penanggung Jawab</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataProject as $project)
                <tr @click="selectRowProject('{{ $project -> kode }}-{{ $project -> nama }}')" id="rwProject{{ $project -> kode }}" class="rwProject">
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $project -> kode }}</td>
                    <td><b>{{ $project -> nama }}</b></td>
                    <td>{{ $project -> penanggung_jawab }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-blue btn-flat">Tutup</a>
        <a href="javascript:void(0)" class="btn waves-effect waves-blue" @click="pilihProjectModalAtc()">Pilih</a>
    </div>
</div>

<!-- div modal tambah material  -->
<div id="modalMaterial" class="modal">
    <div class="modal-content">
        <h4>Tambah material</h4>
        <table id="tblModalMaterial" class="table bordered highlight">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Material</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataMaterial as $material)
                <tr id="rwMaterial{{$material -> kode}}" @click="rwMaterialSelectAtc('{{$material -> kode}}-{{$material -> nama}}-{{$material -> satuan}}')" class="rwMaterial">
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $material -> kode }}</td>
                    <td>{{ $material -> nama }}</td>
                    <td>{{ $material -> jumlah }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-blue btn-flat">Tutup</a>
        <a href="javascript:void(0)" class="btn waves-effect waves-blue" @click="tambahMaterialAtcModal()">Tambah</a>
    </div>
</div>