@extends('member.layout.app')

@section('title')
    Profile
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

                                <a href="#" class="btn btn-primary btn-block"><b>Ubah Password</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('member.profile.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">NIDN / NIDK</label>
                                                <input type="hidden" name="old_nidn" value="{{ $user->profile->nidn }}"
                                                    id="">
                                                <input type="text" name="nidn"
                                                    value="{{ old('nidn', $user->profile->nidn) }}"
                                                    class="form-control @error('nidn') is-invalid @enderror" id="">
                                                @error('nidn')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Telepon</label>
                                                <input type="hidden" name="old_no_telepon"
                                                    value="{{ $user->profile->no_telepon }}" id="">
                                                <input type="text" name="no_telepon"
                                                    value="{{ old('no_telepon', $user->profile->no_telepon) }}"
                                                    class="form-control @error('no_telepon') is-invalid @enderror"
                                                    id="">
                                                @error('no_telepon')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Nama Lengkap</label>
                                                <input type="text" name="nama_lengkap"
                                                    value="{{ old('nama_lengkap', $user->profile->nama_lengkap) }}"
                                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                    id="">
                                                @error('nama_lengkap')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <select name="jenis_kelamin"
                                                    class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                    id="">
                                                    <option value="">-- Jenis Kelamin --</option>
                                                    <option
                                                        {{ old('jenis_kelamin', $user->profile->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}
                                                        value="Laki-laki">Laki-Laki</option>
                                                    <option
                                                        {{ old('jenis_kelamin', $user->profile->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}
                                                        value="Perempuan">Perempuan</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="hidden" name="old_email" value="{{ $user->email }}"
                                                    id="">
                                                <input type="email" name="email"
                                                    value="{{ old('email', $user->email) }}"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Status Kawin</label>
                                                <select name="status_kawin"
                                                    class="form-control @error('status_kawin') is-invalid @enderror"
                                                    id="">
                                                    <option value="">-- Pilih --</option>
                                                    <option
                                                        {{ old('status_kawin', $user->profile->status_kawin) == 'Belum Kawin' ? 'selected' : '' }}
                                                        value="Belum Kawin">Belum Kawin</option>
                                                    <option
                                                        {{ old('status_kawin', $user->profile->status_kawin) == 'Kawin' ? 'selected' : '' }}
                                                        value="Kawin">Kawin</option>
                                                </select>
                                                @error('status_kawin')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text"
                                                    value="{{ old('tempat_lahir', $user->profile->tempat_lahir) }}"
                                                    name="tempat_lahir"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="">
                                                @error('tempat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="date"
                                                    value="{{ old('tanggal_lahir', $user->profile->tanggal_lahir) }}"
                                                    name="tanggal_lahir"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                    id="">
                                                @error('tanggal_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Agama</label>
                                                <select name="agama"
                                                    class="form-control @error('agama') is-invalid @enderror"
                                                    id="agama">
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                                </select>
                                                @error('agama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Provinsi</label>
                                                <select name="" id="provinsi" required
                                                    class="select2-data-array browser-default @error('provinsi') is-invalid @enderror">
                                                </select>
                                                <input type="hidden" name="provinsi" id="hiddenProv">
                                                @error('provinsi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="" cols="2">{{ old('alamat', $user->profile->alamat) }}</textarea>
                                            </div>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Universitas</label>
                                                <input type="text" name="universitas"
                                                    value="{{ old('universitas', $user->profile->universitas) }}"
                                                    class="form-control @error('universitas') is-invalid @enderror"
                                                    id="">
                                            </div>
                                            @error('universitas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="">Jabatan</label>
                                                <input type="text" name="jabatan"
                                                    value="{{ old('jabatan', $user->profile->jabatan) }}"
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    id="">
                                            </div>
                                            @error('jabatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Foto Profil</label>
                                                <input type="file"
                                                    class="form-control @error('foto') is-invalid @enderror"
                                                    name="foto" id="imageUpload">
                                                @error('foto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <img src="{{ asset($user->profile->foto) }}" alt=""
                                                class="rounded-circle mt-3" id="imagePreview"
                                                style="width: 150px; height: 150px;">
                                        </div>
                                        <div class="col-12 mt-5">
                                            <button type="submit" style="width: 100%" class="btn btn-success">Ubah
                                                Profil</button>
                                        </div>
                                    </div>
                                </form>
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
