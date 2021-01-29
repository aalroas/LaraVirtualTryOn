@extends('backend.layouts.app')
@section('custom-css')
  <style>

.file-drop-area {
    position: relative;
    display: flex;
    align-items: center;
    max-width: 100%;
    padding: 25px;
    border: 1px dashed rgba(255, 255, 255, 0.4);
    border-radius: 3px;
    transition: .2s
}

.choose-file-button {
    flex-shrink: 0;
    background-color: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    padding: 8px 15px;
    margin-right: 10px;
    font-size: 12px;
    text-transform: uppercase
}

.file-message {
    font-size: small;
    font-weight: 300;
    line-height: 1.4;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
}

.file-input {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    widows: 100%;
    cursor: pointer;
    opacity: 0
}
</style>
@endsection
@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Add Products
                            <small>Multikart Admin panel</small>
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
<form  id="create_product" action="{{route('backend.products.update',$product->id)}}" enctype="multipart/form-data"
      method="post">
    @csrf
    @method('PUT')


                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom01" class="col-form-label pt-0"><span>*</span> Title</label>
                                <input class="form-control" name="name" type="text" value="{{$product->name}}"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustomtitle" class="col-form-label pt-0"><span>*</span>
                                    SKU</label>
                                <input class="form-control" name="sku" type="text" value="{{$product->sku}}" required="">
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-form-label"><span>*</span> Categories</label>
                                <select class="custom-select"
                                        required="">
                                    <option value="">--Select--</option>
                                    <option value="1">eBooks</option>
                                    <option value="2">Graphic Design</option>
                                    <option value="3">3D Impact</option>
                                    <option value="4">Application</option>
                                    <option value="5">Websites</option>
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label class="col-form-label">Body</label>
                                <textarea name="body" rows="5" cols="12">{{$product->body}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02" class="col-form-label"><span>*</span> Product
                                    Price</label>
                                <input class="form-control" name="price" type="text" value="{{$product->price}}"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span> Product
                                    Old Price</label>
                                <input class="form-control"
                                       name="old_price"
                                       type="text"
                                       value="{{$product->old_price}}"
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
                                    <div class="file-drop-area"> <span class="choose-file-button">Choose Files</span> <span class="file-message">or drag and
                                            drop files here</span> <input type="file"
                                               class="file-input"
                                               name="image"
                                               accept=".jfif,.jpg,.jpeg,.png,.gif"
                                               multiple> </div>
                                    <div id="divImageMediaPreview"> </div>
                                    {{-- <input type="file" id="image" name="image"> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="product-buttons text-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="reset"  class="btn btn-light">Discard</button>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- <div class="card">
                    <div class="card-header">
                        <h5>Meta Data</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom05"
                                       class="col-form-label pt-0"> Meta Title</label>
                                <input class="form-control"
                                       id="validationCustom05"
                                       type="text"
                                       required="">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Meta Description</label>
                                <textarea rows="4"
                                          cols="12"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <div class="product-buttons text-center">
                                    <button type="button"
                                            class="btn btn-primary">Add</button>
                                    <button type="button"
                                            class="btn btn-light">Discard</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            </form>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection
@section('custom-js')
<script>
    $(document).on('change', '.file-input', function() {


    var filesCount = $(this)[0].files.length;

    var textbox = $(this).prev();

    if (filesCount === 1) {
    var fileName = $(this).val().split('\\').pop();
    textbox.text(fileName);
    } else {
    textbox.text(filesCount + ' files selected');
    }



    if (typeof (FileReader) != "undefined") {
    var dvPreview = $("#divImageMediaPreview");
    dvPreview.html("");
    $($(this)[0].files).each(function () {
    var file = $(this);
    var reader = new FileReader();
    reader.onload = function (e) {
    var img = $("<img />");
    img.attr("style", "width: 150px; height:100px; padding: 10px");
    img.attr("src", e.target.result);
    dvPreview.append(img);
    }
    reader.readAsDataURL(file[0]);
    });
    } else {
    alert("This browser does not support HTML5 FileReader.");
    }


    });
</script>
@endsection
