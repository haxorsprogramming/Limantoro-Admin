<div class="row">
    @if($totalUnit == 0)
        <div style="margin-top:30px;text-align:center;">
            <i>Tidak ada data unit</i>
        </div>
    @else
    <table class="bordered striped highlight">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Ukuran Tanah</th>
                <th>Ukuran Bangunan</th>
                <th>Jumlah Unit</th>
                <th>Jumlah Unit Terjual</th>
                <th>Harga Jual</th>
                <th>Marketing Fee (%)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            @foreach($dataUnit as $unit)
            <tr>
                <td>{{ $loop -> iteration }}</td>
                <td>{{ $unit -> name }}</td>
                <td>{{ $unit -> land_size }}</td>
                <td>{{ $unit -> building_size }}</td>
                <td>{{ $unit -> builded }}</td>
                <td>{{ $unit -> sold }}</td>
                <td>{{ $unit -> selling_price }}</td>
                <td>{{ $unit -> marketing_fee }}</td>
                <td>
                    <a class="btn" href="javascript:void(0)" >
                        <i class="material-icons">edit_note</i>
                    </a>
                    <a class="btn deep-orange lighten-1" href="javascript:void(0)">
                        <i class="material-icons">delete</i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
    @endif
</div>