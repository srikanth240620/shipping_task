
$(window).on('load', function () {
    $('.slideshow-items').first().addClass('active');
    $('.slideshow-thumbnails').first().addClass('active');
});

function add_cart(event, type, id) {
    event.stopPropagation();
    event.preventDefault();

    if (type == 'multiple') {
        var data = {
            product_id: $(".product_id_in").val(),
            color: $("input[name='color']:checked").val(),
            size: $("input[name='size']:checked").val(),
            quantity: $(".quantity_input").val(),

        }
    } else {
        var data = {
            product_id: id,
        }
    }

    var id = 1;

    $.ajax({
        url: '/save_cart',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: data,
        success: function (data) {
            if (data.code == 200) {
                $(".cart_count").text(data.cart_count);


                if (type == 'multiple') {
                    var color = $("input[name='color']:checked").val();
                    var size = $("input[name='size']:checked").val();
                } else {
                    var color = data.data.color;
                    var size = data.data.size;

                }

                $(".product_title").text(data.data.name);
                $(".cart_image_in").attr('src', data.data.img);

                $(".product_color").text(color);
                $(".product_size").text(size);
                // $(".check_out_rul").attr("href", data.data.encode);
                $("#ProductDetails").modal('hide');
                $(".add_to_cart").css("display", "none").fadeIn(500).slideDown(500);

            }

        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}



function view_product(event, encode) {
    event.stopPropagation();
    event.preventDefault();

    var decodedString = decodeURIComponent(encode);
    var jsonData = JSON.parse(decodedString);
    console.log(jsonData);

    $(".product_id_in").val(jsonData.id);
    $(".product_encode").val(jsonData.encode);
    $(".product_description_in").text(jsonData.description);
    $(".product_title_in").text(jsonData.name);
    $(".product_img_in").attr('src', jsonData.img);
    $(".quantity_input").val(1);
    $("#counter").text(1);
    $(".price").val(jsonData.price);


    $(".product_price").val(jsonData.price);
    $(".price_value").text(jsonData.price);





    // size


    $(".size_details").html('');
    $.each(jsonData.size, function (index, item) {
        var checked = '';
        if (index == 0) {
            var checked = 'checked';
        }
        $(".size_details").append(`
 <input type="radio" id="size-`+ index + `"  ` + checked + ` name="size" value="` + item + `">
               <label for="size-`+ index + `">` + item + `</label>`);
    });
    // color 
    $(".color_details").html('');
    $.each(jsonData.color, function (index, item) {
        var checked = '';
        if (index == 0) {
            var checked = 'checked';
        }
        $(".color_details").append(`
 <input type="radio" id="color-`+ index + `"  ` + checked + ` name="color" value="` + item + `">
               <label for="color-`+ index + `">` + item + `</label>`);
    });

    // images

    $(".production_top_images").html('');
    $(".production_bottom_images").html('');

    $.each(jsonData.image, function (index, item) {
        var active = '';
        if (index == 0) {
            var active = 'active';
        }
        $(".production_top_images").append(`
  <img class='slideshow-items `+ active + `'
               src='`+ item + `'>`);

        $(".production_bottom_images").append(`
  <img class='slideshow-thumbnails `+ active + `'
               src='`+ item + `'>`);
    });

    $("#ProductDetails").modal('show');


}


$(document).ready(function () {

    // Change slide on thumbnail hover
    $(document).on('mouseenter', '.slideshow-thumbnails', function () {
        var index = $('.slideshow-thumbnails').index(this);
        changeSlide(index);
    });

    function changeSlide(index) {
        $('.slideshow-items').removeClass('active').hide();
        $('.slideshow-items').eq(index).addClass('active').show();
        $('.slideshow-thumbnails').removeClass('active');
        $('.slideshow-thumbnails').eq(index).addClass('active');

        // Update #result background to the new image
        let activeImg = $('.slideshow-items.active');
        $('#result').css('backgroundImage', 'url(' + activeImg.attr('src') + ')');
    }

    // Zoom functionality on mouse move
    $(document).on('mousemove', function (e) {
        var activeImg = $('.slideshow-items.active');
        if (activeImg.length === 0) return;

        var imgOffset = activeImg.offset();
        var imgWidth = activeImg.outerWidth();
        var imgHeight = activeImg.outerHeight();

        var x = e.pageX;
        var y = e.pageY;

        // Check if mouse is over the active image
        if (x > imgOffset.left && x < imgOffset.left + imgWidth &&
            y > imgOffset.top && y < imgOffset.top + imgHeight) {

            $('#lens').show();
            $('#result').show();
            imageZoom(activeImg, $('#result'), $('#lens'), x, y);
        } else {
            $('#lens').hide();
            $('#result').hide();
        }
    });

    function imageZoom(img, result, lens, x, y) {
        const lensWidth = 165;
        const lensHeight = 165;
        const resultWidth = 330;
        const resultHeight = 330;

        lens.width(lensWidth);
        lens.height(lensHeight);
        result.width(resultWidth);
        result.height(resultHeight);

        result.offset({
            top: img.offset().top,
            left: img.offset().left + img.outerWidth() + 10
        });

        const cx = resultWidth / lensWidth;
        const cy = resultHeight / lensHeight;

        result.css('backgroundImage', 'url(' + img.attr('src') + ')');
        result.css('backgroundSize', (img.width() * cx) + 'px ' + (img.height() * cy) + 'px');

        let lensX = x - lensWidth / 2;
        let lensY = y - lensHeight / 2;

        const imgOffset = img.offset();
        const maxX = img.outerWidth() + imgOffset.left - lensWidth;
        const maxY = img.outerHeight() + imgOffset.top - lensHeight;

        if (lensX > maxX) lensX = maxX;
        if (lensX < imgOffset.left) lensX = imgOffset.left;
        if (lensY > maxY) lensY = maxY;
        if (lensY < imgOffset.top) lensY = imgOffset.top;

        lens.offset({ top: lensY, left: lensX });

        result.css('backgroundPosition', `-${(lensX - imgOffset.left) * cx}px -${(lensY - imgOffset.top) * cy}px`);
    }
});