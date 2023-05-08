@extends('master.master')
@section('title','Quản lý sản phẩm')
@section('content')
<!-- Content -->
    <div class="content">
        <div class="content_head">
            <div class="content_head-add" onclick="open_popup()">
                <div class="add_product">Add Product</div>
            </div>

            <form action="" method="GET">
                <div class="content_head-search">
                    <input type="text" id="search" placeholder="Search..." name="search">
                    <div class="icon_search">
                        <button type="submit"><img src="assets/image/search.svg" alt=""></button>
                    </div>
                </div>
            </form>

        </div>


        <div class="content_main">
            @if(count($products) > 0)
                <!-- Product -->
                    <div class="product">
                        @foreach($products AS $product)
                        <div class="item">
                            <div class="item_image">
                                <img src="uploads/products/{{$product->id .'/'. $product->images}}" alt="">
                            </div>
                            <div class="item_info">
                                <a href="{{ route('product.show', $product->id) }}">
                                    <h3 class="item_info-title">{{$product->name}}</h3>
                                </a>

                                <div class="item_info-function">
                                    <div class="dataDestroyProduct" data-link="{{route('product.destroy', $product->id)}}" hidden=""></div>
                                    <a href="{{ route('product.edit', $product->id) }}" class="">
                                        <div class="function-update function_chung">Update</div>
                                    </a>
                                    <div class="function-delete function_chung" onclick="popupDelete(this)">Delete</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                <!-- End Product -->

                <!-- Phân trang -->
                    <div class="paragrap">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                <!-- End Phân trang -->
            @else
                <div class="notProduct">
                    <div class="notProduct-img">
                        <img src="assets/image/noProduct.png" alt="">
                    </div>
                    <h2 class="notProduct-text">Không có sản phẩm</h2>
                </div>
            @endif
            
        </div>
    </div>
<!-- End Content -->
@endsection
