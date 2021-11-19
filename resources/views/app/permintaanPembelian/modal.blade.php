<!-- div modal project  -->
<div class="modal micromodal-slide" id="modalProject" aria-hidden="true">
    <div class="modal__overlay" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
                <h2 class="modal__title" id="modal-1-title">
                    Pilih project
                </h2>
                <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
            </header>
            <main class="modal__content" id="modal-1-content">
                <table id="tblModalProject">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Project</th>
                            <th>Nama Project</th>
                            <th>Penanggung Jawab</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataProject as $project)
                        <tr>
                            <td>no</td>
                            <td>no</td>
                            <td>no</td>
                            <td>no</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </main>
            <footer class="modal__footer">
                <button class="modal__btn modal__btn-primary">Pilih</button>
                <button class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Tutup</button>
            </footer>
        </div>
    </div>
</div>