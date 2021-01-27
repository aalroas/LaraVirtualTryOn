@extends('backend.layouts.app')

@section('custom-css')
 <!-- INCLUDE MAIN SCRIPT: -->
    <script src='{{asset('try-on/release/JeelizNNCwidget.js')}}'></script>

    <!-- For icons adjust fame or resize canvas -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

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
                                           <button type="button"
                                                    class="btn btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal" onclick="main()">
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

 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

   <div id='JeeWidget'>
        <!-- MAIN CANVAS: -->
        <!--
             canvas with id='JeeWidgetCanvas' is the canvas where the VTO widget will be rendered
             it should have CSS attribute position: absolute so that it can be resized without
             changing the total size of the placeholder
            -->
        <canvas id='JeeWidgetCanvas'></canvas>

        <div class='JeeWidgetControls JeeWidgetControlsTop'>
            <!-- ADJUST BUTTON: -->
            <button id='JeeWidgetAdjust'>
                <div class="buttonIcon"><i class="fas fa-arrows-alt"></i></div>Adjust
            </button>

            <!-- RESIZE WIDGET BUTTON: -->
            <button id='buttonResizeCanvas'
                    onclick='test_resizeCanvas();'>
                <div class="buttonIcon"><i class="fas fa-sync-alt"></i></div>Resize widget
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
        <!-- END AJUST NOTICE -->

        <!-- BEGIN LOADING WIDGET (not model) -->
        <div id='JeeWidgetLoading'>
            <div class='JeeWidgetLoadingText'>
                LOADING...
            </div>
        </div>
        <!-- END LOADING -->

    </div>

</div>


@endsection

@section('custom-js')
<script>
    let _isResized = false;
          function test_resizeCanvas() {
            // halves the height:
            let halfHeightPx = Math.round(window.innerHeight / 2).toString() + 'px';

            const domWidget = document.getElementById('JeeWidget');
            domWidget.style.maxHeight = (_isResized) ? 'none' : halfHeightPx;

            _isResized = !_isResized;
          }

          // entry point:
          function main() {

            JEEWIDGET.start({
              sku: 'rayban_aviator_or_vertFlash',
              searchImageMask: 'https://appstatic.jeeliz.com/jeewidget/images/target.png',
              searchImageColor: 0xeeeeee,
              callbackReady: function(){
                console.log('INFO: JEEWIDGET is ready :)');
              },
              onError: function(errorLabel){ // this function catches errors, so you can display custom integrated messages
                alert('An error happened. errorLabel =' + errorLabel)
                switch(errorLabel) {
                  case 'NOFILE':
                    // the user send an image, but it is not here
                    break;

                  case 'WRONGFILEFORMAT':
                    // the user upload a file which is not an image or corrupted
                    break;

                  case 'INVALID_SKU':
                    // the provided SKU does not match with a glasses model
                    break;

                  case 'FALLBACK_UNAVAILABLE':
                    // we cannot switch to file upload mode. browser too old?
                    break;

                  case 'PLACEHOLDER_NULL_WIDTH':
                  case 'PLACEHOLDER_NULL_HEIGHT':
                    // Something is wrong with the placeholder
                    // (element whose id='JeeWidget')
                    break;

                  case 'FATAL':
                  default:
                    // a bit error happens:(
                    break;
                } // end switch
              } // end onError()
            }) // end JEEWIDGET.start call
          } // end main()
</script>
@endsection
