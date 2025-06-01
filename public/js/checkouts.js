



function quantity_infor(type, key) {
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

    total_amount();
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


// form validation
(function () {
    'use strict';
    window.addEventListener('load', function () {
        var form = document.getElementById('myForm');
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    }, false);
})();


document.getElementById('expDate').addEventListener('input', function (e) {
    let input = e.target.value;

    // Remove non-digits
    input = input.replace(/\D/g, '');

    // Format as MM / YY
    if (input.length >= 3) {
        input = input.slice(0, 2) + ' / ' + input.slice(2, 4);
    }

    e.target.value = input;
});

// Optional: prevent non-numeric input via keyboard
document.getElementById('expDate').addEventListener('keypress', function (e) {
    if (!/[0-9]/.test(e.key)) {
        e.preventDefault();
    }
});
