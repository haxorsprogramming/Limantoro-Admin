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
                        <li><a href="javascript:void(0)" @click="permintaanPembelianAtc()">Permintaan Pembelian</a></li> 
                        <li><a href="javascript:void(0)" @click="persetujuanPermintaanPembelianAtc()">Persetujuan Pembelian</a></li>
                        <li><a href="javascript:void(0)" @click="pemesananPembelianAtc()">Pemesanan Pembelian</a></li>
                        <li><a href="javascript:void(0)" @click="buktiKeluarAtc()">Bukti Keluar</a></li>
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Manajemen Barang<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="javascript:void(0)" @click="penerimaanBarangAtc()">Penerimaan Barang</a></li>
                        <li><a href="javascript:void(0)" @click="pengembalianBarangAtc()">Pengembalian Barang</a></li>
                        <li><a href="javascript:void(0)" @click="pengembalianPembelianAtc()">Pengembalian Pembelian</a></li>
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">ballot</i>Penggajian<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="javascript:void(0)" @click="dataKaryawanPenggajianAtc()">Data Karyawan</a></li>
                        <li><a href="javascript:void(0)">Payroll Set</a></li>
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">fact_check</i>Laporan<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="javascript:void(0)">Arus Kas</a></li>
                    </ul>
                </div>
            </li>
            <!-- <li class="no-padding"><a class="waves-effect waves-grey" href="javascript:void(0)"><i class="material-icons">settings</i>Setting</a></li> -->
            <li class="no-padding"><a class="waves-effect waves-grey" href="{{ url('auth/logout') }}"><i class="material-icons">logout</i>Log Out</a></li>
        </ul>