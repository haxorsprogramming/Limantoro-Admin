<div class="row">
    <div class="col s12 m12 l12" id="appKaryawan">
        @include('app.karyawan.dataKaryawanPage')
        @include('app.karyawan.formTambahKaryawanPage')
        @include('app.karyawan.formEditKaryawanPage')
    </div>
</div>

<script src="{{ asset('base/js/karyawan.js') }}"></script>