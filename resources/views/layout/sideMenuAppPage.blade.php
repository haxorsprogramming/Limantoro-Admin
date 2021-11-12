<aside id="slide-out" class="side-nav white fixed">
    <div class="side-nav-wrapper">
        <div class="sidebar-profile">
            <div class="sidebar-profile-image">
                <img src="{{ asset('/style/alpha') }}/images/profile-image.png" class="circle" alt="">
            </div>
            <div class="sidebar-profile-info">
                <a href="javascript:void(0);" class="account-settings-link">
                    <p>@{{username}}</p>
                   
                </a>
            </div>
        </div>
       
        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="no-padding active"><a class="waves-effect waves-grey active" href="javascript:void(0)" @click="dashboarc_atc()"><i class="material-icons">dashboard</i>Dashboard</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey" href="javascript:void(0)" @click="projectAtc()"><i class="material-icons">analytics</i>Project</a></li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Data Master<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="javascript:void(0)">Cash</a></li>
                        <li><a href="javascript:void(0)" @click="supplierAtc()">Supplier</a></li> 
                        <li><a href="javascript:void(0)" @click="customerAtc()">Customer</a></li>
                        <li><a href="javascript:void(0)" @click="materialAtc()">Material</a></li>
                        <li><a href="javascript:void(0)" @click="karyawanAtc()">Karyawan</a></li>
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Pembelian<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="javascript:void(0)">Permintaan Pembelian</a></li> 
                        <li><a href="javascript:void(0)">Persetujuan Pembelian</a></li>
                        <li><a href="javascript:void(0)">Pemesanan Pembelian</a></li>
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">fact_check</i>Laporan<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="javascript:void(0)">Laporan Statistik</a></li>
                        <li><a href="javascript:void(0)">Arus Kas</a></li>
                    </ul>
                </div>
            </li>
            <li class="no-padding"><a class="waves-effect waves-grey" href="javascript:void(0)"><i class="material-icons">settings</i>Setting</a></li>
            <li class="no-padding"><a class="waves-effect waves-grey" href="{{ url('auth/logout') }}"><i class="material-icons">logout</i>Log Out</a></li>
        </ul>
        <div class="footer">
            <p class="copyright">Limantoro © </p>
            <a href="#!">Kactus </a>
        </div>
    </div>

</aside>