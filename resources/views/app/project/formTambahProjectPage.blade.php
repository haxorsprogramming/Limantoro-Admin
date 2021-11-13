<!-- form tambah Material -->
<div class="card" id="dFormTambahProject" style="display: none;">
    <div class="card-content">
        <span class="card-title">Tambah Project</span>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <!-- div col 1 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Kode Material" id="txtKodeProject" type="text" class="validate">
                    <label for="txtKodeProject" class="active">Kode Project</label>
                </div>
                <div class="input-field col s12">
                    <input placeholder="Nama Material" id="txtNamaMaterial" type="text" class="validate">
                    <label for="txtNamaMaterial" class="active">Nama Project</label>
                </div>

                <a href="#!" class="btn" id="btnProsesTambah" @click="prosesTambahProjectAtc()">
                    <i class="material-icons left">file_download_done</i> @{{prosesBtnText}}
                </a>
            </div>
            <!-- div col 2 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input placeholder="Penanggung Jawab" @click="showModalPenanggungJawabAtc()" id="txtPenanggungJawab" readonly type="text">
                    <label for="txtPenanggungJawab" class="active">Penanggung Jawab</label>
                </div>
            </div>
            <!-- div col 3 -->
            <div class="col s4">
                <div class="input-field col s12">
                    <input id="txtTanggalProject" type="date" class="validate">
                    <label for="txtTanggalProject" class="active">Tanggal Project</label>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- div modal penanggung jawab  -->
<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Pilih penanggung jawab
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">
               <table class="table table-hover">
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