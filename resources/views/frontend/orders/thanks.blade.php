@extends('frontend.layouts.app')
@section('content')
 <!-- thank-you section start -->
<section class="section-b-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text"><i class="fa fa-check-circle"
                       aria-hidden="true"></i>
                    <h2>thank you</h2>
                    <p>Payment is successfully processsed and your order is on the way</p>
                    <p>Transaction ID:{{$order->id}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

@endsection
