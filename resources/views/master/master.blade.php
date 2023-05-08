<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <base href="{{ asset("") }}">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    
    <link rel="stylesheet" href="assets/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/popup.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div id="background">
        <div id="App">
            <!-- HEADER -->
            <header class="header">
                <a href="#" class="header_logo">
                    <div class="header_logo-icon"><img src="assets/image/logo.svg" alt=""></div>
                    <h1 class="header_logo-text">NCC</h1>
                </a>
                <!-- Đăng ký -->
            </header>
            <!-- END HEADER -->

            <div class="main">
                <!-- Navbar -->
                <div class="navbar">
                    <div class="navbar_common border_b hight_product">
                        <div class="navbar_direc pd_chung clickProduct">
                            <div class="navbar_direc-text en">Category</div>
                            <div class="navbar_direc-icon"><img src="assets/image/down.svg" alt=""></div>
                        </div>
                        <div class="navbar_direc-sub displayProduct">
                            <div class="navbar_direc-a pd_chung">
                                <a href="{{route('product.index')}}" class="color_loc color_filter">All</a>
                            </div>
                            @foreach($categories as $category)
                                <div class="navbar_direc-a pd_chung color_filter" data-id="{{$category->id}}">
                                    <a href="{{route('product.index', ['category' => $category->id])}}" class="aCategory">{{$category->category_name}}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="navbar_common">
                        <div class="navbar_direc pd_chung clickManu">
                            <div class="navbar_direc-text">Manufacturer</div>
                            <div class="navbar_direc-icon"><img src="assets/image/down.svg" alt=""></div>
                        </div>
                        <div class="navbar_direc-sub displayManu">
                            <div class="navbar_direc-a pd_chung">
                                <a href="" class="color_loc">All</a>
                            </div>
                            @foreach($facturers as $facturer)
                                <div class="navbar_direc-a pd_chung color_filter" data-id="{{$facturer->id}}">
                                    <a href="{{route('product.index', ['manufacturer' => $facturer->id])}}" class="aManufacturer">{{$facturer->manufacturer_name}}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter" hidden data-filter="{{route('product.index')}}"></div>
                </div>
                <!-- End Navbar -->

                <!-- Content -->
                @yield('content')
                <!-- End Content -->

            </div>
        </div>
    </div>
    <div class="progress-bar">
        <div class="progress"></div>
    </div>




@include('popup')

<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $(".select_option").select2({
        width: "100%",
    });
</script>
</body>
</html>