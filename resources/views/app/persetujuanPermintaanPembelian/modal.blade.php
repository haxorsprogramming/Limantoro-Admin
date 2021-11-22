<!-- div modal persetujuan  -->
<div id="modalPersetujuan" class="modal">
    <div class="modal-content">
        <h4>Persetujuan Pembelian @{{ noPrSelected }}</h4>
        <div class="row">
            <div class="server-load row">
                <div class="server-stat col s4">
                    <span>Tanggal Permintaan</span>
                    <p>@{{ tanggalPermintaan }}</p>
                </div>
                <div class="server-stat col s4">
                    <span>Project</span>
                    <p>@{{ namaProject }}</p>
                </div>
                <div class="server-stat col s4">
                    <span>User Request</span>
                    <p>@{{ userRequest }}</p>
                </div>
            </div>
        </div>
        <h4>Permintaan Material</h4>
        <div class="row" id="dPermintaanMaterial">
        
        </div>
    </div>
</div>