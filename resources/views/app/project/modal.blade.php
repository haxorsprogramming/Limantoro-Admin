<!-- div modal new penanggung jawab  -->
<div id="modalPenanggungJawab" class="modal">
    <div class="modal-content">
        <h4>Pilih penanggung jawab</h4>
        <table class="table bordered highlight" id="tblPenanggungJawab">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataPenanggungJawab as $pj)
                <tr @click="selectRowPj('{{ $pj -> username }}')" id="rwPj{{ $pj -> username }}" class="rwPj">
                    <td>{{ $pj -> username }}</td>
                    <td>{{ $pj -> nama_lengkap }}</td>
                    <td>{{ $pj -> alamat }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" @click="pilihPjAtc()" class="btn">Pilih</a>
    </div>
</div>

<!-- div modal new tambah unit  -->
<div id="modalDataUnit" class="modal">
    <div class="modal-content">
        <h4>Tambah data unit</h4>
        <table>
            <tr>
                <td>
                    <label for="txtNamaUnit">Nama Unit</label>
                    <input type="text" id="txtNamaUnit" placeholder="Nama Unit">
                </td>
                <td>
                    <label for="txtUkuranTanah">Ukuran Tanah</label>
                    <input type="text" id="txtUkuranTanah" placeholder="Ukuran Tanah">
                </td>
                <td>
                    <label for="txtUkuranBangunan">Ukuran Bangunan</label>
                    <input type="text" id="txtUkuranBangunan" placeholder="Ukuran Bangunan">
                </td>
                <td>
                    <label for="txtJumlahUnit">Jumlah Unit</label>
                    <input type="text" id="txtJumlahUnit" placeholder="Jumlah Unit">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtUnitTerjual">Jumlah Unit Terjual</label>
                    <input type="text" id="txtUnitTerjual" placeholder="Jumlah Unit Terjual">
                </td>
                <td>
                    <label for="txtHargaJual">Harga Jual</label>
                    <input type="text" id="txtHargaJual" placeholder="Harga Jual">
                </td>
                <td>
                    <label for="txtMarketingFee">Marketing Fee</label>
                    <input type="text" id="txtMarketingFee" placeholder="Marketing Fee">
                </td>
                <td>

                </td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class="btn" @click="prosesManageAtc()">Proses</a>
    </div>
</div>

<!-- div modal tambah unit  -->
