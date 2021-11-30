<div class="card" id="dBuktiKeluar">
    <div class="card-content">
        <h3 class="light">Data Bukti Keluar</h3>
        <div class="divider"></div>
        <table id="tblBuktiKeluar" class="bordered highlight hover">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;">
                    <th>No</th>
                    <th>No POE</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Tanggal Bayar</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataBk as $bk)
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td>{{ $bk -> no_poe }}</td>
                    <td>{{ $bk -> tanggal }}</td>
                    @if($bk -> is_paid == '1')
                    <td>Dibayarkan</td>
                    @else
                    <td>Belum dibayar</td>
                    @endif
                    <td>{{ $bk -> tanggal_dibayar }}</td>
                    <td>{{ $bk -> note }}</td>
                    <td>
                        <a class="btn-floating waves-effect waves-light btnPrintBk" target="new" href="javascript:void(0)">
                            <i class="material-icons">print</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>