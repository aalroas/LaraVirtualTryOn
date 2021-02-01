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
                        <h3>users List
                            <small>{{ config('app.name', 'Laravel') }} Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">users</li>

                    </ol>


                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row products-admin ratio_asos">

            <div class="col-xl-12 col-sm-12">
                <div class="card">
                    <div class="card-body product-box">

                        <table class="table cart-table table-responsive-xs">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">is admin</th>
                                 <th scope="col">edit</th>
                                 <th scope="col">delete</th>
                                </tr>
                            </thead>

                            <tbody>
@foreach ($users as $user)
 <tr>
<td>{{$user->name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->is_admin}}</td>
<td>
    <a class="btn"
       href="{{route('backend.users.edit',$user->id)}}">
        <i class="fa fa-pencil"></i> </a>
</td>
<td>
    <a href=""
       onclick="event.preventDefault(); document.getElementById('delete-form-{{$user->id}}').submit();">
        <i class="fa fa-trash"></i></a>
</td>

<form id="delete-form-{{$user->id}}"
      action="{{route('backend.users.destroy',$user->id)}}"
      method="POST"
      class="d-none">
    @csrf
    @method('delete')
</form>

</tr>
@endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
<div class="modal fade bd-example-modal-xxl" id="letsGoModal" tabindex="-1" aria-labelledby="letsGoModalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Virtual Try On (VTO)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="vidOff()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div width="400" height="500" class="modal-body">

                <div class="spinner-buser" role="status">
                    <span class="sr-only">Loading...</span>
                </div>

                <div style="width: 450px !important; height: 550px !important;" width="450" height="550" id='JeeWidget'>
                    <canvas id='JeeWidgetCanvas'></canvas>
                </div>

                {{-- <div class='JeeWidgetControls JeeWidgetControlsTop'>
                    <!-- ADJUST BUTTON: -->
                    <button id='JeeWidgetAdjust'>
                        <div class="buttonIcon"><i class="fas fa-arrows-alt"></i></div>Adjust
                    </button>

                </div> --}}

                <!-- CHANGE MODEL BUTTONS: -->
                {{-- <div class='JeeWidgetControls'
                     id='JeeWidgetChangeModelContainer'>
                    <button onclick="JEEWIDGET.load('rayban_aviator_or_vertFlash')">renk 1</button>
                    <button onclick="JEEWIDGET.load('rayban_round_cuivre_pinkBrownDegrade')">renk 2</button>
                    <button onclick="JEEWIDGET.load_modelStandalone('{{asset('try-on/glasses3D/glasses1.json')}}')">renk
                3</button>
            </div> --}}

            <!-- BEGIN ADJUST NOTICE -->
            {{-- <div id='JeeWidgetAdjustNotice'>
                    Move the glasses to adjust them.
                    <button class='JeeWidgetBottomButton'
                            id='JeeWidgetAdjustExit'>Quit</button>
                </div> --}}

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
