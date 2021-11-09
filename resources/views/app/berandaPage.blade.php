<div class="row">
    <div class="col s12 m12 l4">
        <div class="card stats-card">
            <div class="card-content">
                <span class="card-title">Total Project</span>
                <span class="stats-counter"><span class="counter">{{$totalProject}}</span><small>Project</small></span>
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
    <div class="col s12 m8 l8" id="appRecentProject">
        <div class="card" id="dRecentProject">
            <div class="card-content">
                <span class="card-title">Recent Project</span>
                <div class="card-options">
                    <ul>
                        <li class="red-text"><span class="badge blue-grey lighten-3">7 records</span></li>
                    </ul>
                </div>
                <div>
                    <table class="highlight">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Code</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataProject as $project)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $project -> code }}</td>
                                <td>{{ $project -> code }}</td>
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
    <div class="col s12 m4 l4">
        <div class="card server-card">
            <div class="card-content">
                <div class="card-options">
                    <ul>
                        <li class="red-text"><span class="badge blue-grey lighten-3">optimal</span></li>
                    </ul>
                </div>
                <span class="card-title">Project Load</span>
                <div class="server-load row">
                    <div class="server-stat col s4">
                        <p>Rp.</p>
                        <span>Pembelian</span>
                    </div>
                    <div class="server-stat col s4">
                        <p>Rp.</p>
                        <span>Space</span>
                    </div>
                    <div class="server-stat col s4">
                        <p>Rp. </p>
                        <span>Cash</span>
                    </div>
                </div>
                <div class="stats-info">
                    <ul>
                        <li>Total Project<div class="percent-info green-text right">32% <i class="material-icons">trending_up</i></div>
                        </li>
                        <li>Project in progress<div class="percent-info red-text right">20% <i class="material-icons">trending_down</i></div>
                        </li>
                        <li>Project finished<div class="percent-info green-text right">18% <i class="material-icons">trending_up</i></div>
                        </li>
                    </ul>
                </div>
                <div id="flotchart2" style="padding: 0px; position: relative;"><canvas class="flot-base" width="277" height="120" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 277px; height: 120px;"></canvas>
                    
                </div>
            </div>
        </div>
    </div>
</div>