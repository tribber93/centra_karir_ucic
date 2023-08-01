@extends('layouts.master') @section('judul', 'Login') @section('konten')
<div class="container-fluid">
    <div class="row vh-100">
        <div class="col-md-7 d-none d-md-block bg-login-left"></div>
        <div class="col-12 col-md-5 p-4 bg-login-right position-relative">
            <div class="top-right"></div>
            <div class="bottom-left"></div>
            <div class="row align-items-center mb-4 justify-content-center">
                <div class="col-5">
                    <img src="assets/images/cic.png" alt="" height="100" />
                </div>
                <div class="col-5">
                    <img
                        src="assets/images/logo-kampus-merdeka.png"
                        alt=""
                        height="100"
                    />
                </div>
            </div>

            <div class="mx-1">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-2">
                             Centra Karir UCIC
                        </h2>
                        <!-- <h3>Login</h3> -->
                        <form action="{{route('authenticate')}}" method="POST">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-3">

                                <input
                                    type="email"
                                    id="form3Example3"
                                    class="form-control form-control-lg"
                                    placeholder="Masukan E-mail"
                                    name="email"
                                />
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                                <label
                                    class="form-label"
                                    for="form3Example3"
                                ></label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input
                                    type="password"
                                    id="form3Example4"
                                    class="form-control form-control-lg"
                                    placeholder="Masukan password"
                                    name="password"
                                />
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                                <label
                                    class="form-label"
                                    for="form3Example4"
                                ></label>
                            </div>

                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <!-- Checkbox -->
                                <div></div>
                                <a href="#!" class="text-body"
                                    >Forgot password?</a
                                >
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-lg"
                                    style="
                                        padding-left: 2.5rem;
                                        padding-right: 2.5rem;
                                    "
                                >
                                    Login
                                </button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">
                                    Don't have an account?
                                    <a href="#!" class="link-danger"
                                        >Register</a
                                    >
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
