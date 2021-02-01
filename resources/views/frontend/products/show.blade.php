@extends('frontend.layouts.app')
@section('custom-css')
<!-- INCLUDE MAIN SCRIPT: -->
<script src='{{asset('try-on/release/JeelizNNCwidget.js')}}'></script>

<!-- For icons adjust fame or resize canvas -->
{{-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> --}}

<!-- Font for the header only: -->
{{-- <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> --}}

<!-- main stylesheet: -->
<link rel='stylesheet'
      href="{{asset('try-on/css/JeeWidget.css')}}" />

@endsection
@section('content')
<!-- section start -->
<section>
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-slick">
                        <div>
                            <div class="lable-wrapper">
                                <button style="border: none !important;background-color: transparent; "
                                        type="button"
                                        data-toggle="modal"
                                        data-target="#letsGoModal"
                                        onclick="letsGo('{{$product->sku}}')">
                                    <span style="color:red" class="lable1">Try it now</span><span class="lable2"> VTO</span>
                                    </i>
                                </button>
                            </div>
                            <img src="{{asset($product->image)}}" style="width: 100%;height:50%;background-size: 100% 100%;"

                                 class="  blur-up lazyload image_zoom_cls-0"></div>

                    </div>
                </div>
                <div class="col-lg-6 rtl-text">
                    <div class="product-right">
                        <h2 class="mb-0">{{$product->name}}</h2>

                        <h4><del>${{$product->old_price}}</del></h4>
                        <h3>${{$product->price}}</h3>

                        {{-- <div class="product-description border-product">

                            <div class="modal fade"
                                 id="sizemodal"
                                 tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered"
                                     role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalLabel">Sheer Straight Kurta</h5>
                                            <button type="button"
                                                    class="close"
                                                    data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body"><img src="../assets/images/size-chart.jpg"
                                                 alt=""
                                                 class="img-fluid blur-up lazyload"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="size-box">
                                <ul>
                                    <li class="active"><a href="#">s</a></li>
                                    <li><a href="#">m</a></li>
                                    <li><a href="#">l</a></li>
                                    <li><a href="#">xl</a></li>
                                </ul>
                            </div>
                            <h6 class="product-title">quantity</h6>
                            <div class="qty-box">
                                <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                class="btn quantity-left-minus"
                                                data-type="minus"
                                                data-field=""><i class="ti-angle-left"></i></button> </span>
                                    <input type="text"
                                           name="quantity"
                                           class="form-control input-number"
                                           value="1">
                                    <span class="input-group-prepend"><button type="button"
                                                class="btn quantity-right-plus"
                                                data-type="plus"
                                                data-field=""><i class="ti-angle-right"></i></button></span></div>
                            </div>
                        </div> --}}
                        <div class="product-buttons">
                             <a href="{{route('frontend.cart.index',$product->id)}}"  class="btn btn-solid">buy now</a>
                             <button  class="btn btn-solid"
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#letsGoModal"
                                    onclick="letsGo('{{$product->sku}}')">
                                <span
                                      class="lable1">Try it now</span><span class="lable2"> VTO</span>
                                </i>
                            </button>
                        </div>
                        <div class="border-product">
                            <h6 class="product-title">product details</h6>
                            <p> {{$product->body}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<div class="modal fade bd-example-modal-xxl"
     id="letsGoModal"
     tabindex="-1"
     aria-labelledby="letsGoModalModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Virtual Try On (VTO)</h5>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                        onclick="vidOff()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div width="400"
                 height="500"
                 class="modal-body">

                <div class="spinner-border"
                     role="status">
                    <span class="sr-only">Loading...</span>
                </div>

                <div style="width: 450px !important; height: 550px !important;"
                     width="450"
                     height="550"
                     id='JeeWidget'>
                    <canvas id='JeeWidgetCanvas'></canvas>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script>
    function letsGo(sku) {
        JEEWIDGET.start({
            sku: sku,
            searchImageMask: 'https://appstatic.jeeliz.com/jeewidget/images/target.png',
            searchImageColor: 0xeeeeee
        })
        // JEEWIDGET.load(sku);
    }
    function vidOff() {
        console.log('video');
        JEEWIDGET.pause();
    };
</script>
@endsection
