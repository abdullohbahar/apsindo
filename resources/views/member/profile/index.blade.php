@extends('member.layout.app')

@section('title')
    Profile
@endsection

@push('addons-css')
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
                                        src="{{ asset('./dashboard-assets/dist/img/user4-128x128.jpg') }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">Nina Mcintire</h3>

                                <p class="text-muted text-center">nina@gmail.com</p>

                                <p class="text-muted text-center">Software Engineer</p>

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
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">NIDN / NIDK</label>
                                            <input type="text" name="nidn" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Telepon</label>
                                            <input type="text" name="phone_number" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="phone_number" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <input type="text" name="phone_number" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Status Kawin</label>
                                            <select name="status_kawin" class="form-control" id="">
                                                <option value="">-- Pilih --</option>
                                                <option value="Belum Kawin">Belum Kawin</option>
                                                <option value="Kawin">Kawin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Agama</label>
                                            <select name="agama" class="form-control" id="">
                                                <option value="">-- Pilih --</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Protestan">Protestan</option>
                                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Provinsi</label>
                                            <select name="province" class="form-control" id="">
                                                <option value="">-- Pilih --</option>
                                                <option value="Belum Kawin">Belum Kawin</option>
                                                <option value="Kawin">Kawin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea name="address" class="form-control" id="" cols="2"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Universitas</label>
                                            <input type="text" name="university" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Foto Profil</label>
                                            <input type="file" class="form-control" name="picture" id="imageUpload">
                                        </div>
                                        <img src="{{ asset('guest-assets/dummy-profile.jpg') }}" alt=""
                                            class="rounded-circle mt-3" id="imagePreview"
                                            style="width: 150px; height: 150px;">
                                    </div>
                                    <div class="col-12 mt-5">
                                        <button type="submit" style="width: 100%" class="btn btn-success">Ubah
                                            Profil</button>
                                    </div>
                                </div>
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
