@extends('frontend.layouts.app')

@section('content')
<!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>customer's login</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb"
                         class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('frontend.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">{{route('frontend.login')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="login-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Login</h3>
                    <div class="theme-card">
                         @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form action="{{route('frontend.login')}}" method="POST" class="theme-form">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       placeholder="Email"
                                       required="">
                            </div>
                            <div class="form-group">
                                <label for="review">Password</label>
                                <input type="password"
                                       class="form-control"
                                       id="review"
                                       name="password"
                                       placeholder="Enter your password"
                                       required="">
                            </div><button type="submit"
                               class="btn btn-solid">Login</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3>New Customer</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Create A Account</h6>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                            able to order from our shop. To start shopping click register.</p>
                            <a href="{{route('frontend.register')}}" class="btn btn-solid">Create an Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
