$(document).ready(function () {
    // Open overlay
    $('#openSearch').on('click', function () {
        $('.searchOverlay').addClass('active');
        $('#searchInput').focus();
    });

    // Close button
    $('#closeSearch, .container-fluid').on('click', function () {
        $('.searchOverlay').removeClass('active');
    });


    // Close if clicking outside the input
    $('.searchOverlay').on('click', function (e) {
        if (!$(e.target).is('#searchInput, #closeSearch')) {
            $('.searchOverlay').removeClass('active');
        }
    });

    // Prevent bubbling when clicking inside input
    $('#searchInput').on('click', function (e) {
        e.stopPropagation();
    });

    // cart design 
    $('.close_cart').click(function () {
        $(".add_to_cart").css("display", "none").slideUp(500);
    });




});
$(document).mouseup(function (e) {
    var container = $(".add_to_cart");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
    }
});


function quantity_update(type) {
    var q = parseInt($(".quantity_input").val()) || 0;

    var price = parseInt($(".price").val()) || 0;



    var value = 1;

    if (type == 'add') {
        value = q + 1;
    } else {
        if (q > 1) {
            value = q - 1;
        }
    }
    console.log(value);
    $(".quantity_input").val(value);
    $(".quantity_text").text(value);
    $(".price_value").text((value * price));

}


