@extends('backend.layouts.app')
@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Add Products
                            <small>{{ config('app.name', 'Laravel') }} Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Digital</li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row product-adding">

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>General</h5>
                    </div>
                    <form id="edit_user"
                          action="{{route('backend.users.update',$user->id)}}"
                          enctype="multipart/form-data"
                          method="post">
                        @csrf
                        @method('PUT')


                        <div class="card-body">
                            <div class="digital-add needs-validation">

                                <div class="form-group">
                                    <label for="validationCustom02"
                                           class="col-form-label"><span>*</span> user
                                        name</label>
                                    <input class="form-control"
                                           name="name"
                                           type="text"
                                           value="{{$user->name}}"
                                           required="">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom02"
                                           class="col-form-label"><span>*</span> email
                                    </label>
                                    <input class="form-control"
                                           name="email"
                                           type="text"
                                           value="{{$user->email}}"
                                           required="">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom02"
                                           class="col-form-label"><span>*</span>
                                        password</label>
                                    <input class="form-control"
                                           name="password"
                                           type="text">
                                </div>

                                <div class="form-group">
                                    <label for="validationCustom02"
                                           class="col-form-label"><span>*</span> is admin
                                    </label>
                                    <input class="form-control"
                                           name="is_admin"
                                           type="text"
                                           value="{{$user->is_admin}}"
                                           required="">
                                </div>


                            </div>
                        </div>
                </div>
                <div class="form-group mb-0">
                    <div class="product-buttons text-center">
                        <button type="submit"
                                class="btn btn-primary">update</button>
                        <button type="reset"
                                class="btn btn-light">Discard</button>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>
<!-- Container-fluid Ends-->

</div>
@endsection
