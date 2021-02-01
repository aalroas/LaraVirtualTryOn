

@extends('frontend.layouts.app')
@section('content')
    <!-- personal deatail section start -->
    <section class="contact-page register-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>orders list</h3>
 <div class="container-fluid">
    <div class="row products-admin ratio_asos">

        <div class="col-xl-12 col-sm-12">
            <div class="card">
                <div class="card-body product-box">

                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">product name</th>

                                <th scope="col">status</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">total</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>    <a href="{{route('frontend.product.show',$order->product->id)}}"> {{$order->product->name}}  </a></td>

                                <td>{{$order->status}}</td>
                                <td>${{$order->product->price}}</td>
                                <td>{{$order->qty}}</td>
                                <td>${{$order->total}}</td>


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
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection


