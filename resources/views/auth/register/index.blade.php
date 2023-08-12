@extends('auth.layouts.main')

@section('content')
    <div class="col-lg-6" style="margin: 11% auto;">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" action="/register" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user @error('nama_lengkap') is-invalid @enderror"
                                                placeholder="Full Name" name="nama_lengkap" value="{{ old('nama_lengkap') }}" autocomplete="off">
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback pt-1 pl-3">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                                placeholder="Enter Email Address..." name="email" value="{{ old('email') }}" autocomplete="off">
                                        @error('email')
                                            <div class="invalid-feedback pt-1 pl-3">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password">
                                            @error('password')
                                                <div class="invalid-feedback pt-1 pl-3">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                placeholder="Repeat Password" name="konfirmasi_password">
                                            @error('konfirmasi_password')
                                                <div class="invalid-feedback pt-1 pl-3">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Register Account
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/login">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection