@extends('guest.layout.app')

@section('title')
    Registrasi
@endsection

@push('addons-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <section class="mb-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-9">
                    <div class="card">
                        <div class="card-header" style="background-color: #3C49B5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="center-div">
                                                <img src="https://apsindo.org/wp-content/uploads/2023/12/Screenshot_48_waifu2x_photo_noise3_scale_waifu2x_photo_noise3_scale-1.png"
                                                    alt="" srcset="" class="w-100 img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="center-div">
                                                <h4 class="text-white text-center"><b>Formulir Registrasi Asosiasi Pendidik
                                                        Seni
                                                        Indonesia</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('save.registration') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">NIDN</label>
                                            <input type="text" class="form-control @error('nidn') is-invalid @enderror"
                                                value="{{ old('nidn') }}" name="nidn" placeholder="Masukkan NIDN"
                                                id="nidn">
                                            @error('nidn')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required
                                                placeholder="Alamat Email" id="email">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama Lengkap</label>
                                            <input type="text"
                                                class="form-control @error('nama_lengkap') is-invalid @enderror"
                                                name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                                                placeholder="Nama Lengkap" required id="nama_lengkap">
                                            @error('nama_lengkap')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nomor Telepon</label>
                                            <input type="text"
                                                class="form-control @error('no_telepon') is-invalid @enderror"
                                                name="no_telepon" value="{{ old('no_telepon') }}"
                                                placeholder="Nomor Telepon" required id="no_telepon">
                                            @error('no_telepon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="Password" id="password" required
                                                    autocomplete="new-password">
                                                <div class="input-group-text" id="view-password">
                                                    <i class="fa-regular fa-eye" id="icon-password"></i>
                                                </div>
                                            </div>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Konfirmasi Password</label>
                                            <div class="input-group">
                                                <input type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" required placeholder="Konfirmasi Password"
                                                    id="password_confirmation">
                                                <div class="input-group-text" id="view-password-confirmation">
                                                    <i class="fa-regular fa-eye" id="icon-password-confirmation"></i>
                                                </div>
                                            </div>
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required rows="3"
                                                placeholder="Alamat Lengkap Anda Untuk Pengiriman Kartu">{{ old('alamat') }}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Provinsi</label>
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
                                        <div class="mb-3">
                                            <label for="" class="form-label">Universitas</label>
                                            <input type="text"
                                                class="form-control @error('universitas') is-invalid @enderror"
                                                name="universitas" required value="{{ old('universitas') }}"
                                                placeholder="Universitas" id="">
                                            @error('universitas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Foto Profil</label>
                                            <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                                name="foto" id="imageUpload">
                                            @error('foto')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <img src="{{ asset('guest-assets/dummy-profile.jpg') }}" alt=""
                                            class="rounded-circle mt-3" id="imagePreview"
                                            style="width: 150px; height: 150px;">
                                    </div>
                                    <div class="col-12 mb-5 mt-3 text-end">
                                        <button type="submit" class="btn btn-success mt-5"
                                            style="width: 25vw">Daftar</button>
                                    </div>
                                    <div class="col-12 mt-3 text-center">
                                        <h6>
                                            Sudah Punya Akun? <a href="{{ route('login') }}">Login</a>
                                        </h6>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('addons-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('./guest-assets/js/provinsi.js') }}"></script>

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

    <script>
        // Temukan elemen yang ingin diarahkan berdasarkan class
        var targetElements = document.getElementsByClassName("is-invalid");

        // Cek jika elemen ditemukan
        if (targetElements.length > 0) {
            // Ambil elemen pertama (jika ada lebih dari satu dengan class tersebut)
            var targetElement = targetElements[0];

            // Gulirkan ke elemen tersebut
            targetElement.scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>

    <script>
        $('#view-password').on('click', function() {
            let input = $(this).parent().find("#password");
            input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            $("#icon-password").attr('class', input.attr('type') === 'password' ? 'fas fa-eye' : "fas fa-eye-slash")
        });

        $('#view-password-confirmation').on('click', function() {
            let input = $(this).parent().find("#password_confirmation");
            input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            $("#icon-password-confirmation").attr('class', input.attr('type') === 'password' ? 'fas fa-eye' :
                "fas fa-eye-slash")
        });
    </script>
@endpush
