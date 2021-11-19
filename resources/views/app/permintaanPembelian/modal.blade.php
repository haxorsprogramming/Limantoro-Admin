<!-- div modal project  -->
<div id="modalProject" class="modal" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 250.516304347826px;">
    <div class="modal-content">
        <h4>Pilih project</h4>
        <table id="tblModalProject" class="bordered highlight hover">
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
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $project -> kode }}</td>
                    <td>{{ $project -> nama }}</td>
                    <td>{{ $project -> penanggung_jawab }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-blue btn-flat">Tutup</a>
        <a href="javascript:void(0)" class="btn waves-effect waves-blue">Pilih</a>
    </div>
</div>