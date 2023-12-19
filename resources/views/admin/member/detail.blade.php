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

                                @php
                                    if ($user->is_active == 'inactive') {
                                        $color = 'danger';
                                    } elseif ($user->is_active == 'pending') {
                                        $color = 'warning';
                                    } elseif ($user->is_active == 'active') {
                                        $color = 'success';
                                    }
                                @endphp
                                <div class="text-center">
                                    <span class='badge badge-{{ $color }}'>{{ $user->is_active }}</span>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('./guest-assets/js/provinsi.js') }}"></script>

    <script>
        var agama = "{{ old('agama', $user->profile->agama) }}";
        var provinsi = "{{ old('provinsi', $user->profile->provinsi) }}";

        $("#agama").val(agama)

        setTimeout(() => {
            // Memeriksa apakah elemen sudah ada
            if ($(`#select2-provinsi-container`).length) {
                var optionToSelect = $(
                    `#provinsi option:contains('${provinsi}')`
                );

                $(`#provinsi`).val(optionToSelect.val()).trigger("change");

                // Mengubah isi (teks) dari elemen <span>
                $(`#select2-provinsi-container`)
                    .text(provinsi)
                    .attr("title", provinsi);

                $(`#provinsi`).trigger("change");
            }
        }, 1000);
    </script>

    <script>
        imageUpload.onchange = (evt) => {
            const [file] = imageUpload.files;
            if (file) {
                // Batasan ukuran file (2MB)
                const maxSizeInBytes = 2 * 1024 * 1024; // 2MB
                if (file.size <= maxSizeInBytes) {
                    // Batasan jenis file (PNG, JPG, JPEG)
                    const allowedExtensions = ["png", "jpg", "jpeg", "webp"];
                    const fileExtension = file.name.split(".").pop().toLowerCase();
                    if (allowedExtensions.includes(fileExtension)) {
                        imagePreview.src = URL.createObjectURL(file);
                    } else {
                        alert(
                            "Jenis file yang diunggah tidak diizinkan. Harap pilih file dengan format PNG, JPG, atau JPEG."
                        );
                        imageUpload.value = null; // Menghapus file yang dipilih
                    }
                } else {
                    alert("Ukuran file terlalu besar. Harap pilih file dengan ukuran maksimal 2MB.");
                    imageUpload.value = null; // Menghapus file yang dipilih
                }
            }
        };
    </script>
@endpush
