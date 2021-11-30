<!-- form tambah penerimaan barang -->
<div class="card" id="dFormTambahPenerimaan" style="display: none;">
    <div class="card-content">
        <span class="card-title">Tambah Penerimaan Barang</span>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtNoGr" type="text" class="validate" value="{{ $noGr }}" disabled>
                    <label for="txtNoGr" class="active">No GR</label>
                </div>
                <div class="input-field col s12">
                    <input id="txtSupplier" type="text" class="validate" @click="modalSupplierOpenAtc()">
                    <label for="txtSupplier" class="active">Supplier</label>
                </div>
            </div>
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtTanggal" type="date" class="validate">
                    <label for="txtTanggal" class="active">Tanggal</label>
                </div>
                <div class="input-field col s12">
                    <input id="txtNoPo" type="text" class="validate" @click="modalPoOpenAtc()">
                    <label for="txtNoPo" class="active">No PO</label>
                </div>
            </div>
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtNoSurat" type="text" class="validate" value="-">
                    <label for="txtNoSurat" class="active">No. Surat Jalan</label>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <span class="card-title">Data Material</span>
        <div class="row" id="dDataMaterial">
            
        </div>
        
    </div>
</div>

@include('app.penerimaanBarang.modal')