@extends('guest.layout.app')

@section('title')
    Login
@endsection

@push('addons-css')
@endpush

@section('content')
    <section class="mb-5">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-5">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Login Asosiasi Pendidik Seni Indonesia</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('auth') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @if (session()->has('successDaftar'))
                                        <div class="col-12">
                                            <div class="alert alert-success" role="alert">
                                                Berhasil Melakukan Pendaftaran. Harap Melakukan Login
                                            </div>
                                        </div>
                                    @endif
                                    @if (session()->has('error'))
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                Email atau Password Salah
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email') }}" placeholder="Alamat Email" id="email"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" id="password" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success mt-3"
                                            style="width: 100%">Login</button>
                                    </div>
                                    <div class="col-12 mt-3 text-center">
                                        <h6>
                                            Ingin mendaftar jadi anggota APSINDO? <a
                                                href="{{ route('registration') }}">Daftar</a>
                                        </h6>
                                        <h6>
                                            Lupa Password? <a href="{{ route('reset.password') }}">Reset Password</a>
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
