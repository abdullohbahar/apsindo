@extends('admin.layout.app')

@section('title')
    Pengaturan Langganan
@endsection

@push('addons-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection.select2-selection--single {
            height: 38px !important;
        }
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pengaturan Langganan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"> Pengaturan Langganan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update.pengaturan.langganan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $paymentSetting->id ?? $paymentSetting['id'] }}"
                            id="">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Rentang Waktu (misal 1 Tahun)</label>
                                <input type="number" name="date_range"
                                    value="{{ $paymentSetting->date_range ?? $paymentSetting['date_range'] }}"
                                    class="form-control" id="" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Harga</label>
                                <input type="text" name="price" class="form-control"
                                    value="{{ 'Rp ' . number_format($paymentSetting->price, 0, '', '.') ?? $paymentSetting['price'] }}"
                                    id="" required>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-success">Ubah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('addons-js')
    <script>
        // Fungsi untuk mengubah angka menjadi format rupiah
        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return 'Rp ' + ribuan;
        }

        // Event listener untuk mendeteksi perubahan pada input
        document.addEventListener('DOMContentLoaded', function() {
            var inputHarga = document.querySelector('input[name="price"]');

            inputHarga.addEventListener('keyup', function() {
                // Ambil nilai dari input
                var nilai = this.value.replace(/\./g, "");

                // Hapus angka 0 di awal
                while (nilai.charAt(0) === '0') {
                    nilai = nilai.substring(1);
                }

                // Ubah nilai menjadi format rupiah
                var format = formatRupiah(nilai);

                // Tampilkan kembali ke input
                this.value = format;
            });
        });
    </script>
@endpush
