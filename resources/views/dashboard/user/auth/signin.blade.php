@extends('layouts.master2')
@section('title', 'Login')
@section('css')
    <style>
        .panel {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ asset('assets/login.jpg') }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto"
                             alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"><a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('assets/dashboard/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Choose type</label>
                                                <select class="form-control" id="sectionChooser">
                                                    <option value="" selected disabled>Choose</option>
                                                    <option value="user">مريض</option>
                                                    <option value="admin">ادمن</option>
                                                    <option value="doctor">الدخول دكتور</option>
                                                    <option value="ray_employee">موظف اشعة</option>
                                                    <option value="laboratorie_employee">موظف مختبر</option>
                                                </select>
                                            </div>

                                            <h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>

                                            {{-- form user --}}
                                            <div class="panel" id="user">
                                                <h2>الدخول كمريض</h2>
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input class="form-control"
                                                                                    placeholder="Enter your email" type="email" name="email"
                                                                                    value="{{ old('email') }}" required autofocus>
                                                        @error('email')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control"
                                                                                       placeholder="Enter your password" type="password"
                                                                                       name="password" required autocomplete="current-password">
                                                        @error('password')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In
                                                    </button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                Signup with Facebook
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with Twitter
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create an Account</a>
                                                    </p>
                                                </div>
                                            </div>

                                            {{-- form admin --}}
                                            <div class="panel" id="admin">
                                                <h2>الدخول ادمن</h2>
                                                <form method="POST" action="{{ route('login.admin') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input class="form-control"
                                                                                    placeholder="Enter your email" type="email" name="email"
                                                                                    value="{{ old('email') }}" required autofocus>
                                                        @error('email')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control"
                                                                                       placeholder="Enter your password" type="password"
                                                                                       name="password" required autocomplete="current-password">
                                                        @error('password')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In
                                                    </button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                Signup with Facebook
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with Twitter
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create an
                                                            Account</a>
                                                    </p>
                                                </div>
                                            </div>

                                            {{-- form Doctor --}}
                                            <div class="panel" id="doctor">
                                                <h2>الدخول دكتور</h2>
                                                <form method="POST" action="">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input class="form-control"
                                                                                    placeholder="Enter your email" type="email" name="email"
                                                                                    value="{{ old('email') }}" required autofocus>
                                                        @error('email')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control"
                                                                                       placeholder="Enter your password" type="password"
                                                                                       name="password" required autocomplete="current-password">
                                                        @error('password')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In
                                                    </button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i> Signup with
                                                                Facebook
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with
                                                                Twitter
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create an
                                                            Account</a>
                                                    </p>
                                                </div>
                                            </div>

                                            {{-- form RayEmployee --}}
                                            <div class="panel" id="ray_employee">
                                                <h2>الدخول موظف اشعة</h2>
                                                <form method="POST" action="">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input class="form-control"
                                                                                    placeholder="Enter your email" type="email" name="email"
                                                                                    value="{{ old('email') }}" required autofocus>
                                                        @error('email')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control"
                                                                                       placeholder="Enter your password" type="password"
                                                                                       name="password" required autocomplete="current-password">
                                                        @error('password')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In
                                                    </button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i> Signup with
                                                                Facebook
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with
                                                                Twitter
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create an
                                                            Account</a>
                                                    </p>
                                                </div>
                                            </div>

                                            {{-- form laboratorie_employee --}}
                                            <div class="panel" id="laboratorie_employee">
                                                <h2>الدخول موظف مختبر</h2>
                                                <form method="POST" action="">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input class="form-control"
                                                                                    placeholder="Enter your email" type="email" name="email"
                                                                                    value="{{ old('email') }}" required autofocus>
                                                        @error('email')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control"
                                                                                       placeholder="Enter your password" type="password"
                                                                                       name="password" required autocomplete="current-password">
                                                        @error('password')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">Sign
                                                        In
                                                    </button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i
                                                                    class="fab fa-facebook-f"></i> Signup with
                                                                Facebook
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with
                                                                Twitter
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create an
                                                            Account</a>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="main-signin-footer mt-5">
                                                <p><a href="">Forgot password?</a></p>
                                                <p>Don't have an account? <a href="{{ route('register') }}">Create an
                                                        Account</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#sectionChooser').change(function() {
            var myID = $(this).val();
            $('.panel').each(function() {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
