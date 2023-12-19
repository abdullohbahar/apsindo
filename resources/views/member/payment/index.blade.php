@extends('member.layout.app')

@section('title')
    Halaman Pembayaran
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
                        <h1 class="m-0">Halaman Pembayaran</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Pembayaran</li>
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
                            <div class="card-body">
                                <h2>
                                    <b>STATUS PEMBAYARAN: PENDING</b>
                                </h2>
                                <p>Data diri: <br>
                                    Nama: Baharudin Abdulloh Mun'im <br>
                                    Alamat: Yogykarta
                                </p>
                                <div class="row">
                                    <div class="col-12">
                                        <h4><b>Detail Pembayaran</b></h4>
                                        <table class="table table-borderd" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>Deskripsi</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Pembayaran Membership Awal - 1 Tahun (18/12/2023 - 18/12/2024)</td>
                                                    <td>Rp. 90.000</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: end;"><b>Total</b></td>
                                                    <td>Rp. 90.000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-info mt-2" id="payButton">Lakukan Pembayaran</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
