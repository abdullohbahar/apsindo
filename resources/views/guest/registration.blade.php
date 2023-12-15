@extends('guest.layout.app')

@section('title')
    Registrasi
@endsection

@push('addons-css')
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
                            <form hx-post="{{ route('save.registration') }}" hx-target="body" method="POST"
                                enctype="multipart/form-data" hx-replace-url="true">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">NIDN</label>
                                            <input type="text" class="form-control @error('nidn') is-invalid @enderror"
                                                value="{{ old('nidn') }}" name="nidn" placeholder="NIDN"
                                                id="">
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
                                                id="">
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
                                                placeholder="Nama Lengkap" id="">
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
                                                placeholder="Nomor Telepon" id="">
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
                                                placeholder="Password" id="" autocomplete="new-password">
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
                                                id="">
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
                                            <select name="provinsi" id=""
                                                class="form-control @error('provinsi') is-invalid @enderror">
                                                <option value="">-- Pilih Provinsi --</option>
                                                <option value="Yogyakarta"
                                                    {{ old('provinsi') == 'Yogyakarta' ? 'selected' : '' }}>Yogyakarta
                                                </option>
                                            </select>
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
                                            Sudah Punya Akun? <a href="" hx-get="{{ route('login') }}"
                                                hx-replace-url="true" hx-target="body">Login</a>
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
