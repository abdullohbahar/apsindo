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
                            <h3>Reset Passowrd</h3>
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
