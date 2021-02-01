@extends('frontend.layouts.app')

@section('custom-css')
<!-- INCLUDE MAIN SCRIPT: -->
<script src='{{asset('try-on/release/JeelizNNCwidget.js')}}'></script>

<!-- For icons adjust fame or resize canvas -->
{{-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> --}}

<!-- Font for the header only: -->
{{-- <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> --}}

<!-- main stylesheet: -->
<link rel='stylesheet' href="{{asset('try-on/css/JeeWidget.css')}}" />

@endsection
@section('content')
<section class=" ratio_asos section-b-space">
    <div class="title2">
        <h2 class="title-inner2">Products</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-4 product-m no-arrow">
                    @foreach ($products as $product)
                        <div class="product-box">
                            <div class="img-block">
                                <div class="lable-wrapper">
                                    <button style="border: none !important;background-color: transparent; " type="button"
                                            data-toggle="modal"
                                            data-target="#letsGoModal"
                                            onclick="letsGo('{{$product->sku}}')">
                                        <span class="lable1">Try it now</span><span class="lable2">VTO</span>
                                        </i>
                                    </button>
                                </div>

                                <div class="front">
                                    <a href="{{route('frontend.product.show',$product->id)}}"><img
                                            src="{{asset($product->image)}}" style="background-size: 100% 100%;"
                                            class=" blur-up lazyload bg-img" alt="{{$product->name}}"></a>
                                </div>
                             </div>
                            <div class="product-detail">
                                <a href="{{route('frontend.product.show',$product->id)}}">
                                    <h6>{{$product->name}}</h6>
                                </a>
                                <h4>${{$product->price}}</h4>
                            </div>

                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

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
    var isRuning = false;
    function letsGo(sku) {
        JEEWIDGET.start({
            // sku: sku,
            searchImageMask: 'https://appstatic.jeeliz.com/jeewidget/images/target.png',
            searchImageColor: 0xeeeeee
        });
        if (!isRuning) {
             stateChange(sku);
        }else{
            JEEWIDGET.load(sku);
        }
    }
        function stateChange(sku) {
        setTimeout(function () {
        JEEWIDGET.load(sku);
        }, 5000);
        }

    function vidOff() {
        console.log('video');
        isRuning = true;
        console.log(isRuning);
        JEEWIDGET.pause();
    };
</script>
@endsection
