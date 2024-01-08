@extends('admin.layout.app')

@section('title')
    Riwayat Pembayaran
@endsection

@push('addons-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('dashboard-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dashboard-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Riwayat Pembayaran</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Riwayat Pembayaran</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <input type="hidden" value="{{ request()->keterangan }}" id="valKeterangan">
                        <input type="hidden" value="{{ request()->status }}" id="valStatus">
                        <form>
                            <div class="row">
                                <div class="col-sm-12 col-md-3 mt-2">
                                    <select name="keterangan" class="form-control" style="width: 100%" id="">
                                        <option value="">-- Filter Keterangan --</option>
                                        <option {{ request()->keterangan == 'Perpanjang' ? 'selected' : '' }}
                                            value="Perpanjang">Perpanjang</option>
                                        <option {{ request()->keterangan == 'Langganan Awal' ? 'selected' : '' }}
                                            value="Langganan Awal">Langganan Awal</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-3 mt-2">
                                    <select name="status" class="form-control" style="width: 100%" id="">
                                        <option value="">-- Filter Status Pembayaran --</option>
                                        <option {{ request()->status == 'unpaid' ? 'selected' : '' }} value="unpaid">Unpaid
                                        </option>
                                        <option {{ request()->status == 'paid' ? 'selected' : '' }} value="paid">Paid
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-3 mt-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary"
                                                style="width: 100%">Filter</button>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ route('admin.history') }}" class="btn btn-secondary"
                                                style="width: 100%">Reset Filter</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 mt-2 text-right">
                                    <button type="button" class="btn btn-warning" id="export" data-toggle="modal"
                                        data-target="#exportModal">Export</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            {{-- <th>Email</th> --}}
                                            <th>No Telepon</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Langganan</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Status Pembayaran</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>

    @include('admin.transaction-history.modal-export')
@endsection

@push('addons-js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('dashboard-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        var keterangan = $("#valKeterangan").val();
        var status = $("#valStatus").val();

        $("#table1").DataTable({
            processing: true,
            serverSide: true,
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            ajax: {
                url: "{!! url()->current() !!}",
                data: {
                    status: status,
                    keterangan: keterangan
                }
            },
            columns: [{
                    title: "No",
                    data: null,
                    searchable: false,
                    orderable: false,
                    width: "50px",
                    className: "text-center border-bottom",
                    render: (data, type, row, meta) => {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                {
                    data: "nama_lengkap",
                    name: "nama_lengkap",
                },
                // {
                //     data: "email",
                //     name: "email",
                // },
                {
                    data: "no_telepon",
                    name: "no_telepon",
                },
                {
                    data: "information",
                    name: "information",
                },
                {
                    data: "date_start",
                    name: "date_start",
                },
                {
                    data: "date_end",
                    name: "date_end",
                },
                {
                    data: "metode_pembayaran",
                    name: "metode_pembayaran",
                    className: "text-uppercase"
                },
                {
                    data: "payment_status",
                    name: "payment_status",
                },
                // {
                //     data: "action",
                //     name: "action",
                // },
            ],
        });
    </script>
    {{-- midtrans --}}
    <script script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.clientKey') }}"></script>
    <script>
        $("body").on("click", "#payButton", async function() {
            var id = $(this).data("id")
            console.log(id);

            try {
                const response = await fetch('payment/payment/' + id, {
                    method: 'GET',
                });

                const token = await response.text();

                console.log(token);

                window.snap.pay(token.replace(/"/g, ''), {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        alert("payment success!");
                        console.log(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("wating your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })

            } catch (error) {
                alert(error.message);
            }
        })
    </script>
@endpush
