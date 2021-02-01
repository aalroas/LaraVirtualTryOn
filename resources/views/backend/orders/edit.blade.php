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
<form  id="edit_order" action="{{route('backend.orders.update',$order->id)}}" enctype="multipart/form-data"
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
                                       name="user_id"
                                       type="text"
                                       disabled
                                       value="{{$order->user->name}}"
                                       required="">
                            </div>

                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span> Product
                                    name</label>
                                <input class="form-control"
                                       name="name" disabled
                                       type="text"

                                       value="{{$order->product->name}}"
                                       required="">
                            </div>

                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span>
                                    status</label>
                                <input
                                       class="form-control"
                                       name="status"
                                       type="text"
                                       value="{{$order->status}}"
                                       required="">
                            </div>

                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span> Product
                                    Price</label>
                                <input class="form-control" disabled name="price" type="text" value="{{$order->product->price}}"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span> qty
                                   qty</label>
                                <input disabled class="form-control"
                                       name="qty"
                                       type="text"
                                       value="{{$order->qty}}"
                                       required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span>
                                    total</label>
                                <input  disabled class="form-control"
                                       name="total"
                                       type="text"
                                       value="{{$order->total}}"
                                       required="">
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-form-label"><span>*</span> Status</label>
                                <div class="m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                    <label class="d-block"
                                           for="edo-ani">
                                        <input class="radio_animated"
                                               id="edo-ani"
                                               type="radio"
                                               name="rdo-ani">
                                        Enable
                                    </label>
                                    <label class="d-block"
                                           for="edo-ani1">
                                        <input class="radio_animated"
                                               id="edo-ani1"
                                               type="radio"
                                               name="rdo-ani">
                                        Disable
                                    </label>
                                </div>
                            </div> --}}
                            {{-- <label class="col-form-label pt-0"> Product Upload</label> --}}
                            {{-- <form class="dropzone digits"
                                  id="singleFileUpload"
                                  action="https://themes.pixelstrap.com/upload.php">
                                <div class="dz-message needsclick"><i class="fa fa-cloud-upload"></i>
                                    <h4 class="mb-0 f-w-600">Drop files here or click to upload.</h4>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Image</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group mb-0">
                                <div class="description-sm">
                                <img class="text-center" width="100" height="150" src="{{asset($order->product->image)}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="product-buttons text-center">
                                <button type="submit" class="btn btn-primary">update</button>
                                <button type="reset"  class="btn btn-light">Discard</button>
                            </div>
                        </div>
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
