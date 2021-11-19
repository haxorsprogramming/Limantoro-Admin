<!-- div modal new penanggung jawab  -->
<div id="modalPenanggungJawab" class="modal">
    <div class="modal-content">
        <h4>Pilih penanggung jawab</h4>
        <table class="table bordered highlight">
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
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat">Tutup</a>
        <a href="javascript:void(0)" @click="pilihPjAtc()" class="btn">Pilih</a>
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