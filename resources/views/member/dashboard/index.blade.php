@extends('member.layout.app')

@section('title')
    Dashboard
@endsection

@push('addons-css')
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0">Selamat Datang</h5>
                            </div>
                            <div class="card-body">
                                @if ($subscribe->payment_status == 'unpaid')
                                    @if ($subscribe->information == 'Langganan Awal')
                                        <h5 class="card-text text-capitalize">
                                            Anda Belum Aktif Menjadi Anggota, Silahkan melakukan pembayaran agar menjadi
                                            anggota
                                            aktif dan mendapat kartu anggota digital
                                        </h5>
                                    @else
                                        <h5 class="card-text text-capitalize">
                                            Masa Aktif Menjadi Anggota APSINDO akan segera berakhir pada tanggal
                                            {{ $subscribe->date_end }}. Segera Lakukan Perpanjangan
                                        </h5>
                                    @endif

                                    <a href="{{ route('riwayat') }}" class="btn btn-info mt-2">Lakukan
                                        Pembayaran</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@push('addons-js')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <script>
        $("#payButton").on("click", async function() {
            try {
                const response = await fetch('payment/payment', {
                    method: 'GET',
                });

                const token = await response.text();

                window.snap.pay(token.replace(/"/g, ''))

            } catch (error) {
                alert(error.message);
            }
        })
    </script>
@endpush
