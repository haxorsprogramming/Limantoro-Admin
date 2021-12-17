<!-- form edit data penggajian  -->
<div class="card" id="dPayrollSet" style="padding-bottom:22px;">
    <div class="card-content">
        <h3 class="light">Payroll Setup : {{ $dataKaryawan -> karyawanData -> nama_lengkap }}</h3>
        <div class="row">
            <a class="btn-floating waves-effect waves-light" @click="kembaliAtc()"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="row">
            <div class="col s6">
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <label class="active">Status Perkawinan</label><br/>
                    <label>{{$dataKaryawan -> status_menikah}}</label>
                    <input type="hidden" value="{{ $dataKaryawan -> username }}" id="txtUsername"/>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <label class="active">Jumlah Tanggungan</label><br/>
                    <label>{{$dataKaryawan -> jumlah_tanggungan}}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <label class="active">Gaji Pokok</label><br/>
                    <label>Rp. {{ number_format($dataKaryawan -> gaji_pokok) }}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <label class="active">Tunjangan Tetap</label><br/>
                    <label>Rp. {{ number_format($dataKaryawan -> tunjangan_tetap) }}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <label class="active">Tunjangan Makan</label><br/>
                    <label>Rp. {{ number_format($dataKaryawan -> tunjangan_makan) }}</label>
                </div>
            </div>
            <div class="col s6">
                <div class="input-field col s12" style="margin-bottom: 20px;">                   
                    <label class="active">Hari Kerja</label><br/>
                    <label>{{$dataKaryawan -> hari_kerja}}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">                   
                    <label class="active">Lembur</label><br/>
                    <label>{{$dataKaryawan -> lembur}}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">                    
                    <label class="active">Absent</label><br/>
                    <label>{{$dataKaryawan -> absent}}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">                   
                    <label class="active">Split Shift</label><br/>
                    <label>{{$dataKaryawan -> split_shift}}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">                    
                    <label class="active">Kasbon</label><br/>
                    <label>Rp. {{ number_format($dataKaryawan -> kasbon) }}</label>
                </div>
            </div>
        </div>
        <div class="row">
        <h4 class="light">Perhitungan Gaji</h4>
        <div class="col s6">
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <label class="active">Earnings</label><br/>
                    <label>Rp. {{ number_format ($hp -> earnings -> base) }}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <label class="active">Nett</label><br/>
                    <label>Rp. {{ number_format($hp -> earnings -> nett) }}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">
                    <label class="active">Take Home Pay</label><br/>
                    <label>Rp. {{ number_format($hp -> takeHomePay) }}</label>
                </div>
            </div>
            <div class="col s6">
                <div class="input-field col s12" style="margin-bottom: 20px;">                   
                    <label class="active">Kasbon</label><br/>
                    <label>Rp. {{ number_format($hp -> deductions -> kasbon) }}</label>
                </div>
                <div class="input-field col s12" style="margin-bottom: 20px;">                   
                    <label class="active">Pph21 tax</label><br/>
                    <label>Rp. {{ number_format($hp -> deductions -> pph21Tax) }}</label>
                </div>
            </div>
        </div>
        </div>
        <div class="row" style="text-align: center;">
            <a href="javascript:void(0)" class="btn btn-large" id="btnProsesUpdate" @click="prosesPayroll()">
                <i class="material-icons left">file_download_done</i> @{{ btnProsesText }}
            </a>
        </div>
    </div>
</div>

<script src="{{ asset('base/js/payrollSet.js') }}"></script>