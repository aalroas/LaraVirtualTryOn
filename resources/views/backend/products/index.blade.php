@extends('backend.layouts.app')

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
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Product List
                            <small>Multikart Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Physical</li>
                        <li class="breadcrumb-item active">Product List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row products-admin ratio_asos">

            @foreach ($products as $product)
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="#"><img src="../assets/images/pro3/34.jpg"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                <div class="product-hover">
                                    <ul>

                                        <li>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal" onclick="letsGo()">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </li>

                                        {{-- <li>
                                            <button class="btn" type="button" data-original-title="" title=""><i
                                                    class="ti-pencil-alt"></i></button>
                                        </li> --}}
                                        {{-- <li>
                                            <button class="btn" type="button" data-toggle="modal"
                                                data-target="#{{$product->name}}" data-original-title="" title=""><i
                                            class="ti-trash"></i></button>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                            <a href="#">
                                <h6>{{$product->name}}</h6>
                            </a>
                            <h4>$500.00 <del>$600.00</del></h4>
                            <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
<div class="modal fade bd-example-modal-xxl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered d-flex justify-content-center"
     role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Virtual Try On (VTO)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="vidOff()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div  width="400"  height="500"  class="modal-body">

                <div class="spinner-border"
                     role="status">
                    <span class="sr-only">Loading...</span>
                </div>

               <div style="width: 450px !important; height: 550px !important;" width="450"  height="550"  id='JeeWidget'>
                    <canvas  id='JeeWidgetCanvas'></canvas>
                </div>

                <div class='JeeWidgetControls JeeWidgetControlsTop'>
                    <!-- ADJUST BUTTON: -->
                    <button id='JeeWidgetAdjust'>
                        <div class="buttonIcon"><i class="fas fa-arrows-alt"></i></div>Adjust
                    </button>

                </div>

                <!-- CHANGE MODEL BUTTONS: -->
                <div class='JeeWidgetControls'
                     id='JeeWidgetChangeModelContainer'>
                    <button onclick="JEEWIDGET.load('rayban_aviator_or_vertFlash')">Model 1</button>
                    <button onclick="JEEWIDGET.load('rayban_round_cuivre_pinkBrownDegrade')">Model 2</button>
                    <button onclick="JEEWIDGET.load_modelStandalone('{{asset('try-on/glasses3D/glasses1.json')}}')">Model 3</button>
                </div>

                <!-- BEGIN ADJUST NOTICE -->
                <div id='JeeWidgetAdjustNotice'>
                    Move the glasses to adjust them.
                    <button class='JeeWidgetBottomButton'
                            id='JeeWidgetAdjustExit'>Quit</button>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script>
    // entry point:
    function letsGo() {
        function getRandomInt(max) {
            return Math.floor(Math.random() * Math.floor(max));
        }
        const glassesSkus = ['blaze_round_or_bleudegrademiroir',
            'rayban_wayfarer_havane_vert'
        ];
        JEEWIDGET.start({
            // sku: 'aliexpress_wayfarer_style_brown_brown',
            searchImageMask: 'https://appstatic.jeeliz.com/jeewidget/images/target.png',
            searchImageColor: 0xeeeeee
        }) // end JEEWIDGET.start call
        JEEWIDGET.load(glassesSkus[getRandomInt(2)]);
    }

    function vidOff() {
        console.log('video');
        JEEWIDGET.pause();
    };
</script>
@endsection
