@extends('backend.layouts.app')
@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>settings
                            <small>{{ config('app.name', 'Laravel') }}</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="{{route('backend.index')}}"><i data-feather="home"></i></a></li>

                        <li class="breadcrumb-item active">settings</li>
                    </ol>
                </div>
                <div class="col-md-6 col-sm-12 text-right hidden-xs">

                    @include('includes.messages')

                </div>
            </div>
        </div>
    </div>


<!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row product-adding">


            <div class="col-xl-6">
                <form role="form"
                      action="{{ route('backend.setting.UpdateSiteInfo') }}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-header">
                        <h5>General</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span> Site Title</label>
                                <input class="form-control"
                                       id="site_title"
                                       name="site_title"
                                       type="text"
                                       value="{{ $Setting->site_title }}"
                                       required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01"
                                       class="col-form-label pt-0"><span>*</span> logo</label>
                                       <input type="file"
                                           class="form-control"
                                           class="dropify"
                                           data-default-file="{{ URL::to('uploads/settings', $Setting->site_logo) }}"
                                           data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG"
                                           name="site_logo" value="{{ $Setting->site_logo }}">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom01"
                                       class="col-form-label pt-0"><span>*</span> icon</label>
                                <input type="file"
                                       class="form-control"
                                       class="dropify"
                                       data-default-file="{{ URL::to('uploads/settings', $Setting->site_icon) }}"
                                       data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG"
                                       name="site_icon" value="{{ $Setting->site_icon }}">
                            </div>


                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span>site_url</label>
                                <input class="form-control"
                                       id="site_url"
                                       name="site_url" value="{{ $Setting->site_url }}"
                                       type="text"
                                       required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span>site_email</label>
                                <input class="form-control"
                                       id="site_email"
                                       name="site_email" value="{{ $Setting->site_email }}"
                                       type="text"
                                       required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span>site_address</label>
                                <input class="form-control"
                                       id="site_address"
                                       name="site_address" value="{{ $Setting->site_address }}"
                                       type="text"
                                       required="">
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02"
                                       class="col-form-label"><span>*</span>site_mobile</label>
                                <input class="form-control"
                                       id="site_mobile"
                                       name="site_mobile" value="{{ $Setting->site_mobile }}"
                                       type="text"
                                       required="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">

                <div class="card">
                    <div class="card-header">
                        <h5>Meta Data</h5>
                    </div>
                    <div class="card-body">
                        <div class="digital-add needs-validation">
                            <div class="form-group">
                                <label for="validationCustom05"
                                       class="col-form-label pt-0"> copy_right</label>
                                <input class="form-control"
                                       id="copy_right"
                                       name="copy_right"
                                       type="text" value="{{ $Setting->copy_right }}"
                                       required="">
                            </div>

                            <div class="form-group">
                                <label for="validationCustom05"
                                       class="col-form-label pt-0"> site_meta_description</label>
                                <input class="form-control"
                                       id="site_meta_description"
                                       name="site_meta_description"
                                       type="text" value="{{ $Setting->site_meta_description }}"
                                       required="">
                            </div>


                            <div class="form-group">
                                <label for="validationCustom05"
                                       class="col-form-label pt-0"> site_meta_keywords</label>
                                <input class="form-control"
                                       id="site_meta_keywords"
                                       name="site_meta_keywords"
                                       type="text" value="{{ $Setting->site_meta_keywords }}"
                                       required="">
                            </div>





                            <div class="form-group mb-0">
                                <div class="product-buttons text-center">
                                            <button type="submit"
                                                    class="btn btn-primary btn-round">save</button>
                                            <a type="button"
                                               class="btn btn-light"
                                               href="{{   route('backend.index')   }}">back</a>
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
@endsection
