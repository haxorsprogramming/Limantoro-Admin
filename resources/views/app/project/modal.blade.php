<!-- div modal penanggung jawab  -->
<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Pilih penanggung jawab
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">
                <table class="table bordered highlight">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Nama</th>
                            <th>Title</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataPenanggungJawab as $pj)
                        <tr @click="selectRowPj('{{ $pj -> code }}')" id="rwPj{{ $pj -> code }}" class="rwPj">
                            <td>{{ $pj -> code }}</td>
                            <td>{{ $pj -> name }}</td>
                            <td>Manajer Lapangan</td>
                            <td>{{ $pj -> address }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </main>
            <footer class="modal__footer">
                <button class="modal__btn modal__btn-primary" @click="pilihPjAtc()">Pilih</button>
                <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Tutup</button>
            </footer>
        </div>
    </div>
</div>

<!-- div modal tambah unit  -->

<div class="modal micromodal-slide" id="mdlUnit" aria-hidden="true">
    <div class="modal__overlay">
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    @{{ titleManageUnit }}
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">
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
            </main>
            <footer class="modal__footer">
                <a href="#!" class="btn" @click="prosesManageAtc()">Proses</a>
                <a href="#!" class="btn" data-micromodal-close aria-label="Close this dialog window">Tutup</a>
            </footer>
        </div>
    </div>
</div>