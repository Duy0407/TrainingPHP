@extends('master.master')
@section('title','Cập nhật sản phẩm')
@section('content')
    <!-- Content -->
    <div class="update">
        <form action="{{route('product.update', $edit->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="update_padding">
                <div class="update_form">
                    <h2 class="update_form-title">Thông tin sản phẩm</h2>

                    <div class="form_import">
                        <div class="form_import-lable">Tên sản phẩm<span class="color_red">*</span> </div>
                        <div class="form_import-input">
                            <input type="text" value="{{$edit->name}}" placeholder="Nhập tên sản phẩm " name="update_name">
                            {!! ShowError($errors,'update_name') !!}
                        </div>
                    </div>

                    <div class="form_import">
                        <div class="form_import-lable">Danh mục sản phẩm<span class="color_red">*</span></div>
                        <div class="form_import-select">
                            <select name="update_category" id="" class="select_option">
                                <option value="">Chọn danh mục sản phẩm</option>
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id }}" {{$edit->id_category == $categorie->id ? 'selected' : ''}}>{{$categorie->category_name}}</option>
                                @endforeach
                            </select>
                            {!! ShowError($errors,'update_category') !!}
                        </div>
                    </div>

                    <div class="form_import">
                        <div class="form_import-lable">Hãng sản xuất<span class="color_red">*</span></div>
                        <div class="form_import-select">
                            <select name="update_hangsx" id="" class="select_option">
                                <option value="">Chọn hãng sản xuất</option>
                                @foreach($facturers as $facturer)
                                    <option value="{{$facturer->id}}" {{$edit->id_manufacturer == $facturer->id ? 'selected' : ''}}>{{$facturer->manufacturer_name}}</option>
                                @endforeach
                            </select>
                            {!! ShowError($errors,'update_hangsx') !!}
                        </div>
                    </div>

                    <div class="form_import">
                        <div class="form_import-lable">Giá<span class="color_red">*</span></div>
                        <div class="form_import-input">
                            <input type="text" placeholder="Nhập giá sản phẩm" value="{{$edit->price}}" name="update_price">
                            {!! ShowError($errors,'update_price') !!}
                        </div>
                    </div>

                    <div class="form_import">
                        <div class="form_import-lable">Mô tả<span class="color_red">*</span></div>
                        <div class="po_relative">
                            <textarea name="update_description" id="countCharacter" class="from_import-textarea" maxlength="500" placeholder="Nhập mô tả">{{$edit->description}}</textarea>
                            <div class="characters">
                                <div class="characters-text">
                                    <span class="countCharacter">0</span>
                                    <span>/</span>
                                    <span>500</span>
                                </div>
                            </div>
                        </div>
                        {!! ShowError($errors,'update_description') !!}
                    </div>

                    <div class="form_btn-update">
                        <div class="btn_chung-update btn_huy">Hủy</div>
                        <input type="submit" value="Sửa" class="btn_chung-update btn_add">
                    </div>

                </div>

                <div class="update_image">

                    <div class="update_image-illustration">
                        <div class="illustration-title">Ảnh minh họa <span class="color_red">*</span></div>
                        <div class="illustration-img">
                            <img src="uploads/products/{{$edit->id .'/'. $edit->images}}" alt="" class="editIllustration" >
                            <div class="update_delete_illustration">
                                <div class="btn_update_delete_illustration updateIllustration">Cập nhật</div>
                            </div>
                            <input type="file" class="imageIllustration" hidden name="editIllustration">
                        </div>
                    </div>

                    <div class="update_image-slide">
                        <div class="slide-title">Ảnh slide</div>
                        <div class="slide-image">
                            @foreach($imgSliderProducts as $imgSlider)
                                <div class="slide-item box1Img">
                                    <div class="slide-item-title">Ảnh 1</div>
                                    <div class="slide-item-img">
                                        <input type="text" hidden name="idImgSlider[]" value="{{$imgSlider->id}}" id="idImage">
                                        <img src="uploads/products/{{$imgSlider->id_product .'/'. $imgSlider->image_slider}}" alt="" class="imgElement">
                                        <div class="update_delete">
                                            <div class="btn_update_delete" onclick="image_upload(this)">Cập nhật</div>
                                            <div class="btn_update_delete ghiDe" onclick="image_delete(this)">Xóa</div>
                                        </div>
                                        <input type="text" name="idImageDelete[]" hidden value="" id="getIdImage">
                                        <input type="file" class="inputElement" hidden name="imageSlide[]">
                                    </div>
                                </div>
                            @endforeach


                            <div class="slide-item box2Add">
                                <div class="slide-item-title">Ảnh 1</div>
                                <div class="slide-item-vector addElement">
                                    <div class="vector_sub">
                                        <div class="vector_padding" onclick="addElement(this)">
                                            <img src="assets/image/Vector.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Content -->
@endsection
