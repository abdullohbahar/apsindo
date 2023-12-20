@extends('member.layout.app')

@section('title')
    Dashboard
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
                        <h1 class="m-0">Member</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Member</li>
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            {{-- <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>No Telepon</th> --}}
                                            <th>Keterangan</th>
                                            <th>Tanggal Langganan</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Harga</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Status Pembayaran</th>
                                            <th>Aksi</th>
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
                // {
                //     data: "nama_lengkap",
                //     name: "nama_lengkap",
                // },
                // {
                //     data: "email",
                //     name: "email",
                // },
                // {
                //     data: "no_telepon",
                //     name: "no_telepon",
                // },
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
                    data: "total_price",
                    name: "total_price",
                },
                {
                    data: "metode_pembayaran",
                    name: "metode_pembayaran",
                },
                {
                    data: "payment_status",
                    name: "payment_status",
                },
                {
                    data: "action",
                    name: "action",
                },
            ],
        });
    </script>
@endpush
