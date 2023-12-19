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
                        <div class="card-header text-center">
                            <h3>Asosiasi Pendidik Seni Indonesia</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('save.registration') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">NIDN</label>
                                            <input type="text" class="form-control @error('nidn') is-invalid @enderror"
                                                value="{{ old('nidn') }}" name="nidn" placeholder="NIDN"
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
                                                name="email" value="{{ old('email') }}" placeholder="Alamat Email"
                                                id="email">
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
                                                placeholder="Nama Lengkap" id="nama_lengkap">
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
                                                placeholder="Nomor Telepon" id="no_telepon">
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
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                placeholder="Password" id="password" autocomplete="new-password">
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
                                            <input type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" placeholder="Konfirmasi Password"
                                                id="password_confirmation">
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
                                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" placeholder="Alamat">{{ old('alamat') }}</textarea>
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
                                                name="universitas" value="{{ old('universitas') }}"
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
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success mt-5"
                                            style="width: 100%">Daftar</button>
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
@endpush
