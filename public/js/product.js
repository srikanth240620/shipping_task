
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