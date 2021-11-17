<div class="card" id="dDetailProject">
    <div class="card-content">
        <h4 class="light">Detail Project {{ $dataProject -> name }}</h4>
        <div class="row" style="margin-top: 20px;">
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <label for="txtKodeProject" class="active">Kode Project</label>
                    <input placeholder="Kode Project" id="txtKodeProject" disabled type="text" class="validate" value="{{ $dataProject -> code }}">
                    <input type="hidden" value="{{ $dataProject -> code }}" id="txtHidKdProject">
                </div>
                <div class="input-field">
                    <label for="txtNamaProject" class="active">Nama Project</label>
                    <input placeholder="Kode Project" id="txtNamaProject" disabled type="text" class="validate" value="{{ $dataProject -> name }}">
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <label for="txtPenanggungJawab" class="active">Penanggung Jawab</label>
                    <input placeholder="Kode Project" id="txtPenanggungJawab" disabled type="text" class="validate" value="{{ $dataProject -> in_charge_code }}">
                </div>
                <div class="input-field">
                    <label for="txtJenisProject" class="active">Jenis Project</label>

                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <label for="txtTanggalProject" class="active">Tanggal Project</label>
                    <input placeholder="Kode Project" id="txtTanggalProject" disabled type="date" class="validate" value="{{ $dataProject -> date }}">
                </div>
                <div class="input-field">
                    <label for="txtKodeProject" class="active">Status Project</label>
                    <select id="txtStatusProject" class="browser-default" style="margin-top:9px;" disabled value="{{ $dataProject -> is_finished }}">
                        <option value="0">Berjalan</option>
                        <option value="1">Selesai</option>
                    </select>
                </div>
            </div>
        </div>
        <div style="text-align: center;margin-bottom:20px;">
            <a href="#!" class="btn btn-large"><i class="material-icons left">edit_note</i> Edit project</a>
            <a href="#!" class="btn btn-large orange" @click="dataUnitAtc()" id="btnDataUnit"><i class="material-icons left">table_view</i> Data unit</a>
            <a href="#!" class="btn btn-large" @click="matDariStockAtc()" id="btnMaterialDariStock"><i class="material-icons left">grading</i> Material dari stock</a>
            <a href="#!" class="btn btn-large" @click="matTersisaAtc()" id="btnMaterialTersisa"><i class="material-icons left">opacity</i> Material tersisa</a>
            <a href="#!" class="btn btn-large"><i class="material-icons left">print</i> Cetak dokumen project</a>
        </div>
        <hr />
        <div style="text-align: center;">
            <h5 class="light">@{{ textSection2 }}</h5>
        </div>
        <div class="row" id="dItemDetails">

        </div>
    </div>
</div>

<script src="{{ asset('base/js/detailProject.js') }}"></script>