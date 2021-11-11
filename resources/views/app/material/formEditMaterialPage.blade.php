<!-- form tambah Material -->
<div class="card" id="dFormEditMaterial" style="display: none;">
    <div class="card-content">
        <span class="card-title">Edit Material</span>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <div class="col s6">
                <div class="input-field col s12">
                    <input placeholder="Kode Material" id="txtKodeMaterialEdit" type="text" disabled class="validate">
                    <label for="txtKodeMaterialEdit" class="active">Kode Material</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Nama Material" id="txtNamaMaterialEdit" type="text" class="validate">
                    <label for="txtNamaMaterialEdit" class="active">Nama Material</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <select id="txtSatuanEdit" class="browser-default" style="margin-top:9px;">
                        <option value="sak">Sak</option>
                        <option value="papan">Papan</option>
                        <option value="kg">Kg</option>
                        <option value="rim">Rim</option>
                        <option value="kodi">Kodi</option>
                        <option value="lusin">Lusin</option>
                    </select>
                    <label class="active">Satuan</label>
                </div>
                <a href="#!" class="btn" id="btnProsesTambah" @click="prosesUpdateMaterialAtc()">
                    <i class="material-icons left">file_download_done</i> Update material
                </a>
            </div>
            <div class="col s6">
                
            </div>
        </div>
    </div>
</div>