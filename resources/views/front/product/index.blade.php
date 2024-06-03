@extends('layouts.web.web')
@section('custom_header')
<link href="{{ asset('web_assets/css/product_page.css') }}" rel="stylesheet">
@endsection

@section('content')
<main>
    <div class="container margin_30">
        <!-- <div class="countdown_inner">-20% This offer ends in <div data-countdown="2019/05/15" class="countdown"></div> -->
        <!-- </div> -->
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            @foreach($data->products_images as $image_key => $image_item)
                            <div style="background-image: url(<?php echo asset('uploads/product') . '/' . $image_item->image; ?>);" class="item-box"></div>
                            @endforeach
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            @foreach($data->products_images as $image_key => $image_item)
                            <div style="background-image: url(<?php echo asset('uploads/product') . '/' . $image_item->image; ?>);" class="item {{ $loop->first ? 'active' : '' }}"></div>
                            @endforeach
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <!-- /page_header -->
                <div class="prod_info">
                    <h1>{{$data->name}}</h1>
                    <br />
                    {!! $data->body !!}
                    <div class="prod_options">
                        <!-- <div class="row">
                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="custom-select-form">
                                    <select class="wide">
                                        <option value="" selected>Small (S)</option>
                                        <option value="">M</option>
                                        <option value=" ">L</option>
                                        <option value=" ">XL</option>
                                    </select>
                                </div>
                            </div>
                        </div> -->

                        <!-- /table-responsive -->
                        <div class="row">
                            <label class="col-xl-6 col-lg-6 col-md-6 col-6">
                                <strong>Quantity</strong>
                            </label>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="price_main">
                                <span class="new_price">Rs. {{ number_format($data->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-6 col-md-6">
                            <div class="btn_add_to_cart"><a href="#0" class="btn_1 action_btn"><i class="ti-shopping-cart"></i> Add to Cart</a></div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="btn_add_to_cart"><a href="#0" class="btn_1 action_btn wish_btn"><i class="ti-heart"></i><span> Add to Wishlist</span></a></div>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <br />
                @if(count($data['products_attributes']) > 0)
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <tbody>
                            @foreach($data['products_attributes'] as $key => $item)
                            <tr>
                                <td><strong>{{ $item['name'] }}</strong></td>
                                <td>{{ $item['value'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /product_actions -->
                @endif
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Review Images</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                Description
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-12">
                                    <h3>Details</h3>
                                    <p>Lorem ipsum dolor sit amet, in eleifend <strong>inimicus elaboraret</strong> his, harum efficiendi mel ne. Sale percipit vituperata ex mel, sea ne essent aeterno sanctus, nam ea laoreet civibus electram. Ea vis eius explicari. Quot iuvaret ad has.</p>
                                    <p>Vis ei ipsum conclusionemque. Te enim suscipit recusabo mea, ne vis mazim aliquando, everti insolens at sit. Cu vel modo unum quaestio, in vide dicta has. Ut his laudem explicari adversarium, nisl <strong>laboramus hendrerit</strong> te his, alia lobortis vis ea.</p>
                                    <p>Perfecto eleifend sea no, cu audire voluptatibus eam. An alii praesent sit, nobis numquam principes ea eos, cu autem constituto suscipiantur eam. Ex graeci elaboraret pro. Mei te omnis tantas, nobis viderer vivendo ex has.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->

            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>You may also like</h2>
            <span>Products</span>
        </div>
        <div class="row small-gutters">
            @foreach($related_data as $product)
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <figure>
                        <!-- <span class="ribbon off">-30%</span> -->
                        <a href="{{ route('product', ['id'=>$product['id'],'slug' => $product['slug']]) }}">
                            <img class="img-fluid lazy" src="<?php echo asset('uploads/product') . '/' . $product->products_images->first()->image; ?>" data-src="<?php echo asset('uploads/product') . '/' . $product->products_images->first()->image; ?>" alt="">
                        </a>
                        <!-- <div data-countdown="2019/05/15" class="countdown"></div> -->
                    </figure>
                    <a href="{{ route('product', ['id'=>$product['id'],'slug' => $product['slug']]) }}">
                        <h3>{{ $product->name }}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">Rs. {{ number_format($product->price, 2) }}</span>
                        <!-- <span class="old_price">$60.00</span> -->
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
            @endforeach
        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->
</main>
<!-- /main -->

@endsection
@section('custom_footer')
<script src="{{ asset('web_assets/js/carousel_with_thumbs.js') }}"></script>
@endsection