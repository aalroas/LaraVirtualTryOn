@extends('frontend.layouts.app')
@section('content')
<!--section start-->
<section class="cart-section section-b-space">
    <form action="{{route('frontend.orders.new')}}"
          method="post">
        @csrf
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <table class="table cart-table table-responsive-xs">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <a href="#"><img src="{{asset($product->image)}}"
                                         alt=""></a>
                            </td>
                            <td><a href="#">{{$product->name}}</a>
                            </td>
                            <td>
                                <h2 >${{$product->price}}</h2>
                                <input type="hidden" id="price" name="price" value="{{$product->price}}">
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number"
                                               name="qty"
                                               id="qty"
                                               class="form-control input-number"
                                               value="1">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                        <tr>
                            <td>total price :</td>
                            <td>
                                {{-- <h2 id="total">$6935.00</h2> --}}
                                <input type="text" disabled name="total" id="total" value="{{$product->price}}">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="col-6"><button href="#" type="submit"
                   class="btn btn-solid">check out</button></div>
        </div>
        </form>
    </div>
</section>
<!--section end-->
@endsection
@section('custom-js')
<script>
        $(".input-number").on("change", function() {
        var ret = document.getElementById('qty').value *  document.getElementById('price').value
        console.log(ret);
        $("#total").val(ret);
    })
    </script>
@endsection
