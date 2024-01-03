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
                <div class="col-sm-12 col-md-4">
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
                                                <h5 class="text-white text-center"><b>Login Asosiasi Pendidik Seni
                                                        Indonesia</b></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Password" id="password" required>
                                                <div class="input-group-text" id="view-password">
                                                    <i class="fa-regular fa-eye" id="icon-password"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block" style="color: red">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                        @endif
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
    <script>
        $('#view-password').on('click', function() {
            let input = $(this).parent().find("#password");
            input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
            $("#icon-password").attr('class', input.attr('type') === 'password' ? 'fas fa-eye' : "fas fa-eye-slash")
        });
    </script>
@endpush
