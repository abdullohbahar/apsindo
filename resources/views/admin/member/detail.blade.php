@extends('admin.layout.app')

@section('title')
    Detail
@endsection

@push('addons-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection.select2-selection--single {
            height: 38px !important;
        }

        .center-div {
            display: flex;
            align-items: center;
            height: 100%;
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
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset($user->profile->foto) }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->profile->nama_lengkap }}</h3>

                                <p class="text-muted text-center">{{ $user->email }}</p>

                                <p class="text-muted text-center">{{ $user->profile->jabatan }}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">NIDN</td>
                                            <td>: {{ $user->profile?->nidn ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Telepon</td>
                                            <td>: {{ $user->profile?->no_telepon ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Nama Lengkap</td>
                                            <td>: {{ $user->profile?->nama_lengkap ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Jenis Kelamin</td>
                                            <td>: {{ $user->profile?->jenis_kelamin ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Email</td>
                                            <td>: {{ $user->email ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Status Kawin</td>
                                            <td>: {{ $user->profile?->status_kawin ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Tempat Lahir</td>
                                            <td>: {{ $user->profile?->tempat_lahir ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Tanggal Lahir</td>
                                            <td>: {{ $user->profile?->tanggal_lahir ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Agama</td>
                                            <td>: {{ $user->profile?->agama ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Provinsi</td>
                                            <td>: {{ $user->profile?->provinsi ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Alamat</td>
                                            <td>: {{ $user->profile?->alamat ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Universitas</td>
                                            <td>: {{ $user->profile?->universitas ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold" style="width: 20%">Alamat</td>
                                            <td>: {{ $user->profile?->jabatan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            @php
                                                $paymentStatus = $user
                                                    ->subscribe()
                                                    ->orderBy('created_at', 'desc')
                                                    ->first()->payment_status;

                                                if ($paymentStatus == 'unpaid') {
                                                    $color = 'danger';
                                                    $text = 'Unpaid';
                                                } elseif ($paymentStatus == 'pending') {
                                                    $color = 'warning';
                                                    $text = 'Pending';
                                                } elseif ($paymentStatus == 'paid') {
                                                    $color = 'success';
                                                    $text = 'Paid';
                                                } else {
                                                    $color = 'secondary';
                                                    $text = '';
                                                }
                                            @endphp
                                            <td class="font-weight-bold">
                                                Status Pembayaran
                                            </td>
                                            <td class="center-div">
                                                : &nbsp;<span style="font-size: 12pt;"
                                                    class='badge badge-{{ $color }}'>{{ $text }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            @php
                                                if ($user->is_active == 'inactive') {
                                                    $color = 'danger';
                                                    $text = 'Inactive';
                                                } elseif ($user->is_active == 'pending') {
                                                    $color = 'warning';
                                                    $text = 'Pending (Menunggu Persetujuan Admin)';
                                                } elseif ($user->is_active == 'active') {
                                                    $color = 'success';
                                                    $text = 'Aktif';
                                                }
                                            @endphp
                                            <td class="font-weight-bold">
                                                Status Member
                                            </td>
                                            <td>
                                                : &nbsp; <span style="font-size: 12pt"
                                                    class='badge badge-{{ $color }}'>{{ $text }}</span>

                                                @if ($user->is_active == 'pending')
                                                    <button id="confirm" data-id="{{ $user->id }}"
                                                        class="btn btn-success btn-sm">
                                                        Klik Untuk Menyetujui
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('addons-js')
    <script src="{{ asset('./dashboard-assets/js/confirm.js') }}"></script>
@endpush
