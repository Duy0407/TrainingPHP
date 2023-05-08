<!-- Add Product -->
<!-- close_popup -->
<div class="popup_add close_popup">
    <div class="popup_add-box">
        <div class="popup_add-head">
            <h3 class="popup_add-head-text">Thêm sản phẩm</h3>
            <div class="popup_add-head-icon" onclick="close_popup()">
                <img src="assets/image/icon_close.svg" alt="">
            </div>
        </div>

        <div class="popup_add-content">
            <form action="{{route('product.store')}}" method="POST" id="formProduct" onsubmit="return validateForm()" enctype="multipart/form-data">
                @csrf
                <div class="form_import">
                    <div class="form_import-lable">Tên sản phẩm<span class="color_red">*</span></div>
                    <div class="form_import-input">
                        <input type="text" placeholder="Nhập tên sản phẩm" name="name">
                    </div>
                </div>

                <div class="form_import">
                    <div class="form_import-lable">Danh mục sản phẩm<span class="color_red">*</span></div>
                    <div class="form_import-select">
                        <select name="id_category" id="" class="select_option">
                            <option value="">Chọn danh mục sản phẩm</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form_import">
                    <div class="form_import-lable">Hãng sản xuất<span class="color_red">*</span></div>
                    <div class="form_import-select">
                        <select name="id_manufacturer" id="" class="select_option">
                            <option value="">Chọn hãng sản xuất</option>
                            @foreach($facturers as $facturer)
                                <option value="{{$facturer->id}}">{{$facturer->manufacturer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form_import">
                    <div class="form_import-lable">Giá<span class="color_red">*</span></div>
                    <div class="form_import-input">
                        <input type="text" name="price" maxlength="10" class="price" placeholder="Nhập giá sản phẩm">
                    </div>
                </div>

                <div class="form_import">
                    <div class="form_import-lable">Mô tả</div>
                    <div class="po_relative">
                        <textarea name="description" id="countCharacter" class="from_import-textarea" maxlength="500" placeholder="Nhập mô tả"></textarea>
                        <div class="characters">
                            <div class="characters-text">
                                <span class="countCharacter">0</span>
                                <span>/</span>
                                <span>500</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form_image">
                    <div class="form_image-click click_image">Thêm ảnh minh họa<span class="color_red">*</span><span class="name_img"></span></div>
                    <input type="file" class="chon_anh" name="fileInput" id="fileInput" hidden>

                </div>

                <div class="form_btn">
                    <div class="btn_chung btn_huy" onclick="close_popup()">Hủy</div>
                    <input type="submit" value="Thêm" class="btn_chung btn_add">
                    <!-- <button type="submit" class="btn_chung btn_add">Thêm</button> -->
                </div>

            </form>
        </div>
    </div>
</div>

<!-- POPUP Thêm, Cập nhật, Xóa Thành Công -->

@if(session()->has('success'))
    <div class="success PopupSuccess">
        <div class="success_padding">
            <div class="success_close" onclick="clickPopupSuccess(this)">
                <img src="assets/image/icon_close.svg" alt="">
            </div>
            <div class="success_main">
                <div class="success_main-img">
                    <img src="assets/image/gif.svg" alt="">
                </div>
                <h2 class="success_main-text">{{ session()->get('success') }}</h2>
            </div>
        </div>
    </div>
@endif

@if(session()->has('successDelete'))
    <div class="success PopupSuccess">
        <div class="success_padding">
            <div class="success_close" onclick="clickPopupSuccess(this)">
                <img src="assets/image/icon_close.svg" alt="">
            </div>
            <div class="success_main">
                <div class="success_main-img">
                    <img src="assets/image/delete.svg" alt="">
                </div>
                <h2 class="success_main-text">{{ session()->get('successDelete') }}</h2>
            </div>
        </div>
    </div>
    <!-- @php
        session()->forget('successDelete');
    @endphp -->
@endif


<!-- POPUP Xóa Sản Phẩm -->

<div id="delete" hidden>
    <div class="delete_padding">
        <div class="delete_main">
            <div class="delete_img">
                <img src="assets/image/delete.svg" alt="">
            </div>
            <p class="delete_text">
                Bạn có chắc muốn xóa sản phẩm
                <span class="colorDeleteProduct pullNameProduct">QUang duy 1</span>
                Sản phẩm sẽ bị <span class="colorDeleteProduct">xóa vĩnh viễn</span>
            </p>
            <div class="delete_main_btn">
                <div class="delete_btn-chung delete_btn-huy clickHuy">Hủy</div>
                <form method="POST" action="" id="FormDelete">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="delete_btn-chung delete_btn-xoa">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>




