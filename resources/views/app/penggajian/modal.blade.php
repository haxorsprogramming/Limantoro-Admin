<!-- div modal pilih karyawan  -->
<div id="modalKaryawan" class="modal">
    <div class="modal-content">
        <h4>Pilih karyawan</h4>
        <table id="tblModalKaryawan" class="table bordered highlight">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataKaryawan as $karyawan)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $karyawan -> username }}</td>
                    <td>{{ $karyawan -> nama_lengkap }}</td>
                    <td></td>
                    <td>{{ $karyawan -> tipe }}</td>
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