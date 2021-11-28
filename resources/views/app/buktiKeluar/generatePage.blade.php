<!-- form generate bukti keluar -->
<div class="card" id="dGenerateBk">
    <div class="card-content">
        <span class="card-title">Generate Bukti Keluar</span>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <!-- div col 1 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Kode Project" id="txtKodeProject" type="text" class="validate">
                    <label for="txtKodeProject" class="active">No POE</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Nama Project" id="txtNamaProject" type="date" class="validate">
                    <label for="txtNamaProject" class="active">Tanggal</label>
                </div>
            </div>
            <!-- div col 2 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <select id="txtJenisProject" class="browser-default" style="margin-top:9px;">
                        <option value="rumah">Ya</option>
                        <option value="toko">Tidak</option>
                    </select>
                    <label class="active">Telah dibayar?</label>
                </div>
                <div class="input-field col s12" style="margin-top:31px;">
                    <input id="txtPenanggungJawab" type="date">
                    <label for="txtPenanggungJawab" class="active">Tanggal dibayar</label>
                </div>
            </div>
            <!-- div col 3 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="text" class="validate">
                    <label for="txtTanggalProject" class="active">Catatan</label>
                </div>
            </div>
        </div>
        <span class="card-title">Data PO</span>
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="row" style="text-align: center;margin-top:30px;">
            <a href="javascript:void(0)" class="btn btn-large" @click="prosesGenerateAtc()" id="btnSimpanProject">
                <i class="material-icons left">file_download_done</i> @{{ prosesGenerateText }}
            </a>
        </div>
    </div>
</div>

<script src="{{ asset('base/js/generateBk.js') }}"></script>