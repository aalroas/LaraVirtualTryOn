@extends('frontend.layouts.app')
@section('content')
    <!-- personal deatail section start -->
    <section class="contact-page register-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>PERSONAL DETAIL</h3>


                        <form id="edit_user"
                              action="{{route('frontend.account.update')}}"
                              enctype="multipart/form-data"
                              method="post"
                              class="theme-form">
                            @csrf
                            @method('PUT')


                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{auth()->user()->name}}" name="name" placeholder="Enter Your name"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="last-name" name="email"  value="{{auth()->user()->email}}" placeholder="Email" required="">
                            </div>

                            <div class="col-md-6">
                                <label for="email">password</label>
                                <input type="text" class="form-control" id="password" placeholder="password" >
                            </div>

                        </div>
                        <div class="form-group mb-0">
                            <div class="product-buttons text-center">
                                <button type="submit"
                                        class="btn btn-primary">update</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection
