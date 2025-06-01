

function quantity_infor(type, key, id) {
    var q = parseInt($(".quantity_input_" + key).val()) || 0;

    var price = parseInt($(".price_input_" + key).val()) || 0;

    var value = 1;

    if (type == 'add') {
        value = q + 1;
    } else {
        if (q > 1) {
            value = q - 1;
        }
    }
    console.log(value);
    $(".quantity_input_" + key).val(value);
    $(".quantity_text_" + key).text(value);
    $(".total_sum_" + key).text((value * price));
    $(".total_am_" + key).val((value * price));

    // update_cart(key,'quantity',value)


    total_amount();

    update_cart(key, id, 'quantity', value);
}

function total_amount() {
    let sum = 0;
    $('input[name="total_amount[]"]').each(function () {
        let val = parseFloat($(this).val()) || 0;
        sum += val;
    });

    console.log(sum);

    $('.full_total_amount').text(sum);
}




// Update cart

function update_cart(key, id, type, quantity) {

    // var quantity='';
    // if(type=='quantity'){
    //    var quantity=quantity;
    // }
    $.ajax({
        url: '/update_cart',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: {
            cart_id: id,
            type: type,
            quantity: quantity,

        },
        success: function (data) {
            if (data.code == 200) {
                $(".cart_count").text(data.cart_count);

                if (type == "remove") {
                    $(".remove_row_" + key).remove();

                    var rowCount = $('table tbody tr').length;
                    if (rowCount == 0) {
                        $(".cart_empty_design").show();
                        $(".cart_hide").hide();


                    }


                }



            }

        },
        error: function (xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}
