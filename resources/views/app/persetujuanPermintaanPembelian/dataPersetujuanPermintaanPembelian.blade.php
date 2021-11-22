<div class="card" id="dPersetujuanPermintaanPembelian">
    <div class="card-content">
        <h3 class="light">Data Persetujuan Permintaan Pembelian</h3>
        
        <table id="tblPersetujuanPermintaanPembelian" class="display responsive-table datatable-example table-hover">
            <thead>
                <tr style="background-color:#636e72!important;color:#dfe6e9!important;font-size:12px;">
                    <th>No</th>
                    <th>No PR</th>
                    <th>Tanggal Permintaan</th>
                    <th>Project</th>
                    <th>Status</th>
                    <th>User Request</th>
                    <th>User Approve</th>
                    <th>Qt</th>
                    <th>Qt Disetujui</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataPermintaan as $permintaan)
                @php
                $tanggalCap = \Carbon\Carbon::parse($permintaan -> tanggal) -> isoFormat('dddd, D MMMM Y');
                
                $total = DB::table('tbl_item_permintaan_pembelian') -> where('no_pr', $permintaan -> no_pr) -> sum('qt');
                @endphp
                <tr>
                    <td>{{ $loop -> iteration }}</td>
                    <td><b>{{ $permintaan -> no_pr }}</b></td>
                    <td>{{ $tanggalCap }}</td>
                    <td>{{ $permintaan -> projectData -> nama }}</td>
                    @if($permintaan -> status == 'not_approve')
                    <td>Not yet approved</td>
                    @else
                    <td>Approve</td>
                    @endif
                    <td>{{ $permintaan -> user_request }}</td>
                    <td>{{ $permintaan -> user_approve }}</td>
                    <td>{{ $total }} </td>
                    <td></td>
                    <td>
                        <a class="btn-floating waves-effect waves-light" id="btnSetujui" @click="setujuiAtc('{{ $permintaan -> no_pr }}')" href="javascript:void(0)">
                            <i class="material-icons">gavel</i>
                        </a>
                        <a class="btn-floating waves-effect waves-light" id="btnPrint" target="new" href="{{ url('/app/permintaan-pembelian/'.$permintaan -> no_pr.'/print') }}">
                            <i class="material-icons">print</i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>