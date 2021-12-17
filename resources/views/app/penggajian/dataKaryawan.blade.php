<div class="card" id="dDataKaryawanPenggajian">
    <div class="card-content">
        <h3 class="light">Data Set Penggajian</h3>
        <table id="tblDataKaryawan" class="display responsive-table datatable-example table-hover">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Status Karyawan</th>
                    <th>Total Gaji</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataKaryawan as $kar)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $kar -> karyawanData -> nama_lengkap }}<br/>({{ $kar -> username }})</td>
                    <td></td>
                    <td>{{ $kar -> karyawanData -> tipe }}</td>
                    <td>Rp. {{ number_format($kar -> total_gaji) }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light btnEdit" href="javascript:void(0)" @click="editSetAtc('{{ $kar -> username }}')">
                            <i class="material-icons">edit_note</i>
                        </a>
                        <a class="btn-floating waves-effect waves-light btnPayrollSet" href="javascript:void(0)">
                            <i class="material-icons">account_box</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>