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
                <div class="col-sm-12 col-md-7">
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
                                                <h4 class="text-white text-center"><b>Asosiasi Pendidik Seni
                                                        Indonesia</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Alamat Email" id="" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success mt-3"
                                            style="width: 100%">Reset</button>
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
