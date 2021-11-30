<!-- form tambah pengembalian barang -->
<div class="card" id="dFormTambahPengembalianBarang" style="display: none;">
    <div class="card-content">
        <span class="card-title">Tambah Pengembalian Barang</span>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <div class="col s3">
                <div class="input-field col s12">
                    <input id="txtNoGr" type="text" class="validate" value="{{ $noGrn }}" disabled>
                    <label for="txtNoGr" class="active">No GRN</label>
                </div>

            </div>
            <div class="col s3">
                <div class="input-field col s12">
                    <input id="txtSupplier" type="text" class="validate" @click="openModalSupplierAtc()">
                    <label for="txtSupplier" class="active">Supplier</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input-field col s12">
                    <input id="txtTanggal" type="date" class="validate">
                    <label for="txtTanggal" class="active">Tanggal</label>
                </div>
            </div>
            <div class="col s3">
                <div class="input-field col s12">
                    <input id="txtNoPo" type="text" class="validate" @click="modalPoOpenAtc()">
                    <label for="txtNoPo" class="active">No PO</label>
                </div>
            </div>
        </div>
        <div class="divider"></div>
        <span class="card-title">Data Material</span>
        <div class="row" id="dDataMaterial">

        </div>

    </div>
</div>

@include('app.pengembalianBarang.modal')