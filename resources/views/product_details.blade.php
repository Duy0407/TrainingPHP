@extends('master.master')
@section('title','Chi tiết sản phẩm')
@section('content')
    <!-- Content -->
    <div class="content">
        <div class="product_details">
            <div class="details_back">
                <div class="data_link" data-link="{{route('product.index')}}" hidden></div>
                <div class="details_back-icon"><img src="assets/image/back.svg" alt=""></div>
                <div class="details_back-text">Quay lại</div>
            </div>

            <div class="details_main">
                <div class="details_main-info">
                    <h2 class="name_product-detail">{{$detail->name}}</h2>
                    <div class="details_info mb_5">
                        <div class="details_info-title fz_14 lh_24">Danh Mục:</div>
                        <p class="details_info-p fz_14 lh_24">{{$detail->category->category_name}}</p>
                    </div>
                    <div class="details_info mb_5">
                        <div class="details_info-title fz_14 lh_24">Hãng Sản Xuất:</div>
                        <p class="details_info-p fz_14 lh_24">{{$detail->hangsx->manufacturer_name}}</p>
                    </div>
                    <div class="details_info mb_10">
                        <div class="details_info-title fz_14 lh_24">Giá Sản phẩm:</div>
                        <p class="details_info-p fz_14 lh_24">{{$detail->price}}</p>
                    </div>
                    <div class="details_info">
                        <div class="details_info-title fz_14 lh_24">Mô Tả Sản Phẩm:</div>
                        <p class="details_info-p fz_14 lh_24">{{$detail->description}}</p>
                    </div>
                </div>
                
                <div class="details_main-image moreSlick">
                    @php
                        $image = array($detail->images);
                        $arrayImg = [];
                        if (count($imgSliderProducts) > 0) {
                            foreach($imgSliderProducts as $imgSlider){
                                $arrayImg[] = $imgSlider->image_slider;
                            }
                            $successImges = array_merge($image, $arrayImg);
                        }else{
                            $successImges = $image;
                        }
                    @endphp
                    @foreach($successImges as $successImge)
                        <div class="detail_img">
                            <img src="uploads/products/{{$detail->id . '/' . $successImge}}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="details_suggest">
                <div class="details_suggest-title">Gợi Ý Cho Bạn:</div>

                <div class="details_suggest-item">

                    @foreach($productSuggestions as $suggestion)
                        <a href="{{ route('product.show', ['name' => Str::slug($suggestion->name), 'id' => $suggestion->id]) }}" class="suggest-item">
                            <div class="item_image">
                                <img src="uploads/products/{{$suggestion->id . '/' . $suggestion->images}}" alt="{{$suggestion->name}}">
                            </div>
                            <div class="item_info">
                                <h3 class="item_info-title">{{$suggestion->name}}</h3>
                                <p class="item_info-price">$ {{$suggestion->price}}</p>
                            </div>
                        </a>
                    @endforeach

                    

                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection
