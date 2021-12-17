<ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
    <li class="no-padding active"><a class="waves-effect waves-grey active" href="javascript:void(0)" @click="dashboarc_atc()"><i class="material-icons">dashboard</i>Dashboard</a></li>
    <li class="no-padding"><a class="waves-effect waves-grey" href="javascript:void(0)" @click="projectAtc()"><i class="material-icons">analytics</i>Project</a></li>
    <li class="no-padding">
        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Data Master<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
        <div class="collapsible-body">
            <ul>
                
                <li><a href="javascript:void(0)" @click="supplierAtc()">Supplier</a></li>
                
                <li><a href="javascript:void(0)" @click="materialAtc()">Material</a></li>
                <li><a href="javascript:void(0)" @click="karyawanAtc()">Karyawan</a></li>
            </ul>
        </div>
    </li>
    <li class="no-padding">
        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Pembelian<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
        <div class="collapsible-body">
            <ul>
                <li><a href="javascript:void(0)" @click="buktiKeluarAtc()">Bukti Keluar</a></li>
            </ul>
        </div>
    </li>
    <!-- <li class="no-padding"><a class="waves-effect waves-grey" href="javascript:void(0)"><i class="material-icons">settings</i>Setting</a></li> -->
    <li class="no-padding"><a class="waves-effect waves-grey" href="{{ url('auth/logout') }}"><i class="material-icons">logout</i>Log Out</a></li>
</ul>