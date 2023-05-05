$(document).ready(function(){
    $("#formProduct").validate({
        rules: {
            name: "required",
            price: {
                required: true,
                number: true,
                min: 10000,
                max: 1000000000,
            },
            id_category: "required",
            id_manufacturer: "required",
            description: "required",
            fileInput: {
                required: true,
            }

        },
        messages: {
            name: "Vui lòng nhập tên sản phẩm.",
            price: {
                required: "Vui lòng nhập giá sản phẩm",
                number: "Giá sản phẩm phải là số",
                min: "Giá sản phẩm tối thiểu là 10000",
                max: "Giá sản phẩm tối đa là 1000000000",
            },
            id_category: "Vui lòng chọn danh mục",
            id_manufacturer: "Vui lòng chọn hãng sản xuất",
            description: "Vui lòng nhập mô tả",
            fileInput: {
                required: "Vui lòng chọn tệp tin",
            }
        },

        errorElement: "div",
        errorPlacement: function(error, element) {
          error.addClass("validate_error");
          error.insertAfter(element);
        },

        submitHandler: function(form) {
            if($("#fileInput").val() == "") {
                // var NameImage = $("#fileInput").prop('file')[0].type;
                // if (!(NameImage.startsWith('image/'))) {
                //     alert("Vui lòng chọn định dạng ảnh")
                // }
                alert("Vui lòng chọn ảnh minh họa");
                return false;
            }
          form.submit();
        }
    });
});
