// ***** Slick *****
$('.moreSlick').slick({
    dots: true,
})



// ***** Navbar *****
// Danh mục
var clickProduct = document.querySelector('.clickProduct');
var displayProduct = document.querySelector('.displayProduct');
clickProduct.addEventListener('click', function(){
    displayProduct.style.display = displayProduct.style.display === 'none' ? 'block' : 'none';
});

// Hãng sản xuất
var clickManu = document.querySelector('.clickManu');
var displayManu = document.querySelector('.displayManu');
clickManu.addEventListener('click', function(){
    displayManu.style.display = displayManu.style.display === 'none' ? 'block' : 'none';
});

var search = document.getElementById('search');
if(search !== null && search.addEventListener){
    search.addEventListener('input', function(){
        search.value = search.value.replace(/[^\w\s]/gi, '');
    });
}


$('.click_image').click(function(){
    $('.chon_anh').click();
});
$(".chon_anh").change(function(){
    var nameImage = $(this).prop('files')[0].name;
    $(".name_img").html(nameImage);
});

function close_popup(){
    document.querySelector('.close_popup').style.display = 'none';
}

function open_popup(){
    document.querySelector('.close_popup').style.display = 'block';
}


function price(gia){
    console.log(gia)
}

var price = document.querySelector('.price');
price.addEventListener('input', function(){
    price.value = price.value.replace()
});



function loadImage(input, output) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $(output).attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
}

var appendHtml = '<div class="slide-item box1Img" hidden>';
appendHtml += '<div class="slide-item-title">Ảnh 1</div>';
appendHtml += '<div class="slide-item-img">';
appendHtml += '<input type="text" hidden name="idImgSlider[]" value="" id="idImage">';
appendHtml += '<img src="assets/image/car2.png" alt="" class="imgElement">';
appendHtml += '<div class="update_delete">';
appendHtml += '<div class="btn_update_delete" onclick="image_upload(this)">Cập nhật</div>';
appendHtml += '<div class="btn_update_delete" onclick="image_delete(this)">Xóa</div>';
appendHtml += '</div>';
appendHtml += '<input type="file" class="inputElement" hidden name="imageSlide[]">';
appendHtml += '</div>';
appendHtml += '</div>';


// ============================== Phần ảnh SLIDE
// Click thêm ảnh slide
function addElement(addImage){
    var slideItem = $(addImage).closest('.slide-item');
    slideItem.before(appendHtml);
    var inputElement = $(addImage).parents('.slide-image').find('.inputElement').last();
    var imgElement = $(addImage).parents('.slide-image').find('.imgElement').last();
    inputElement.click();

    inputElement.on('change', function(){
        if($(".box1Img").length === 4 && $(".box1Img").css('display', 'block')){
            $(".box2Add").hide();
        }

        if (this.files.length > 0) {
            $(".box1Img").show();
        }
        loadImage(this, imgElement);
    })
}

// $(document).on('change', '.inputElementAdd', function(){
//     var slideItem = $(this).closest('.slide-item');
    
//     if (this.files.length > 0) {
//         slideItem.before(appendHtml);
//         var imgElement = $(this).parents('.slide-image').find('.imgElement').last();
//         loadImage(this, imgElement);
//     }

//     if($(".box1Img").length === 4){
//         $(".box2Add").hide();
//     }
// });

// Cập nhật ảnh slide
function image_upload(update_image) {
    var slideItemImage = update_image.closest('.slide-item-img');
    var inputElement = slideItemImage.querySelector('.inputElement');

    $(inputElement).off('change').on('change', function(){
        var imgElement = slideItemImage.querySelector('.imgElement');
        loadImage(inputElement, imgElement);
    });
    inputElement.click();
}

// Xóa ảnh slide
function image_delete(delete_image){
    var idImage = $(delete_image).parents('.slide-item-img').find("#idImage").val();
    if (idImage  !== "") {
        $(delete_image).parents('.slide-item-img').find("#getIdImage").attr('value', idImage);
    }
    
    $(delete_image).parents(".box1Img").hide();

    if($(".box1Img").length !== 4){
        $(".box2Add").show();
    }else{
        $(".box2Add").hide();
    }
}

// =====================================

// ================== Phần ảnh minh họa
// Click cập nhật

$('.updateIllustration').click(function(){
    $(".imageIllustration").click();
});

$('.imageIllustration').change(function(){
    loadImage(this, '.editIllustration');
})


// =====================================

// Đủ 4 ảnh sẽ ẩn nút thêm ảnh
$(".box1Img").each(function(){
    if($(".box1Img").length === 4){
        $(".box2Add").remove();
    }
})



// Hiển thị popup thêm thành công
function clickPopupSuccess(closePopupSuccess){
    // document.querySelector('.PopupSuccess_Delete').style.display = 'none';
    $(closePopupSuccess).parents('.PopupSuccess').remove();
}

// Hiển thị popup xóa sản phẩm
function popupDelete(deleteProduct){
    var linkProduct = $(deleteProduct).parents('.item_info-function').find('.dataDestroyProduct').attr('data-link');
    var nameProduct = $(deleteProduct).parents('.item_info').find('.item_info-title').text();
    $("#delete").show();
    $(".pullNameProduct").html(nameProduct);
    $("#FormDelete").attr('action', linkProduct);
}


// Hủy xóa sản phẩm
$(".clickHuy").click(function(){
    $("#delete").hide();
});


// Mô tả
var textarea = document.getElementById("countCharacter");
var countCharacter = document.querySelector('.countCharacter');
textarea.addEventListener('input', function(){
    var currentLength = this.value.length;
    countCharacter.textContent = currentLength;
})

// Click quay lại trang chủ
$('.details_back').click(function(){
    // var link = $('.data_link').attr('data_link');
    window.history.back()
});


// ************************************************************

// ************************* Filter ***************************

// const categoryItems = document.querySelectorAll('.navbar_direc-a');
// const manufacturerItems = document.querySelectorAll('.navbar_direc-sub .navbar_direc-a');
// categoryItems.forEach(function(item){
//     item.addEventListener('click', function() {
//         categoryItems.forEach(function(item){
//             item.classList.remove('color_loc');
//         });
//         this.classList.add('color_loc');
//     });
// })

const progress_bar = document.querySelector('.progress-bar');
const progress = document.querySelector('.progress');


function hideProgressBar() {
    progress.style.width = '100%';
    setTimeout(() => {
      progress_bar.style.opacity = '0';
      setTimeout(() => {
        progress_bar.style.display = 'none';
      }, 500); // đợi 0.5 giây để ẩn progress bar container
    }, 500); // đợi 0.5 giây để progress bar đạt 100%
  }
  
  // thêm sự kiện "load" vào trang
window.addEventListener('load', hideProgressBar);








// --------------------------------------------
