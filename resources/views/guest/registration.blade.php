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
                            <form action="">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">NIDN</label>
                                            <input type="text" class="form-control" name="nidn" placeholder="NIDN"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Alamat Email" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="fullname"
                                                placeholder="Nama Lengkap" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control" name="phone_number"
                                                placeholder="Nomor Telepon" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" id="" autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Konfirmasi Password</label>
                                            <input type="password" class="form-control" name="password_confirmation"
                                                placeholder="Konfirmasi Password" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Alamat</label>
                                            <textarea name="address" class="form-control" rows="3" placeholder="Alamat"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Provinsi</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">-- Pilih Provinsi --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Universitas</label>
                                            <input type="text" class="form-control" name="university"
                                                placeholder="Universitas" id="">
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
@endpush
