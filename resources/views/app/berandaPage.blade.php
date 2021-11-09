<div class="row">
    <div class="col s12 m12 l4">
        <div class="card stats-card">
            <div class="card-content">
                <span class="card-title">Total Project</span>
                <span class="stats-counter"><span class="counter">23,230</span><small>Last week</small></span>
                <div class="percent-info green-text">8% <i class="material-icons">trending_up</i></div>
            </div>
            <div class="progress stats-card-progress">
                <div class="determinate" style="width: 70%"></div>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l4">
        <div class="card stats-card">
            <div class="card-content">
                <span class="card-title">Permintaan Pembelian</span>
                <span class="stats-counter"><span class="counter">23,230</span><small>Last week</small></span>
                <div class="percent-info green-text">8% <i class="material-icons">trending_up</i></div>
            </div>
            <div class="progress stats-card-progress">
                <div class="determinate" style="width: 70%"></div>
            </div>
        </div>
    </div>
    <div class="col s12 m12 l4">
        <div class="card stats-card">
            <div class="card-content">
                <span class="card-title">Pemesanan Pembelian</span>
                <span class="stats-counter"><span class="counter">23,230</span><small>Last week</small></span>
                <div class="percent-info green-text">8% <i class="material-icons">trending_up</i></div>
            </div>
            <div class="progress stats-card-progress">
                <div class="determinate" style="width: 70%"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col s12 m12 l12" id="appRecentProject">
        <div class="card" id="dRecentProject">
            <div class="card-content">
                <span class="card-title">Recent Project</span>
                <div>
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Aksi</th
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataProject as $project)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $project -> code }}</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>