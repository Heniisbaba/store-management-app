$(document).ready(function () {
    $('#input-search').change(function () {
        $('#result').html('');
        var text = $(this).val();
        if (text != '') {
            $('#result').html('');
            $.ajax({
                url: '/search',
                method: 'post',
                data: {
                    _token: '{{csrf_token()}}',
                    search: text
                },
                success: function (data) {
                    table = '<table id="example3" class="table table-bordered table-hover">';
                    table += '<thead><tr><th>Action</th><th>Products</th><th>Quantity</th><th>Stock</th><th>Price</th></tr></thead>';
                    table += '<tbody>';
                    for (let i = 0; i < data.success.length; i++) {
                        table += '<tr><td><button onclick="purchase(' + data.success[i].id + ')" class="btn btn-xs btn-success"><i class="fa fa-shopping-cart"></i></button></td>';
                        table += '<td>' + data.success[i].product_name + '</td>';
                        table += '<td>' + data.success[i].physical_quantity + ' ' + data.success[i].physical_quantity_units + '</td>';
                        table += '<td>' + data.success[i].stock_quantity + ' units</td>';
                        table += '<td>' + data.success[i].selling_price + ' </td>';
                        table += '</tr>';
                    }
                    table += '</tbody></table>'
                    $('#result').html(table);
                }
            });
        }
    });
});

function purchase(id) {
    var purchaseId = id;
    var content;
    $.ajax({
        url: '/itempurchase/' + purchaseId,
        method: 'post',
        data: {
            _token: '{{csrf_token()}}',
        },
        success: function (data) {
            $('#product_id').val(data.purchase.id);
            $('#product_name').val(data.purchase.product_name);
            $('#size').val(data.purchase.physical_quantity + ' ' + data.purchase.physical_quantity_units);
            $('#quantity').val(1);
            $('#rate').val(data.purchase.selling_price);
            var stock = data.purchase.stock_quantity;
            $('#stock').val(stock + ' units');
            $("#quantity").attr({
                "max": stock
            });
            // $('#image').html(data.images[0]);
            $('#total').val(data.purchase.selling_price * 1);
            $('#modal-info').modal('show');
        }
    });
}

function register_purchase() {
    var product_id = $('#product_id').val();
    var product_name = $('#product_name').val();
    var size = $('#size').val();
    // alert(size);
    var rate = $('#rate').val();
    var customer_name = $('#customer_name').val();
    var customer_phone = $('#customer_phone').val();
    var customer_mail = $('#customer_mail').val();
    var customer_address = $('#customer_address').val();
    var purchase_quantity = $('#purchase_quantity').val();
    var total = $('#total').val();
    var data =
        $.ajax({
            url: '/purchase',
            method: 'post',
            data: {
                _token: '{{csrf_token()}}',
                'product_id': product_id,
                'product_name': product_name,
                'size': size,
                'rate': rate,
                'customer_name': customer_name,
                'customer_phone': customer_phone,
                'customer_mail': customer_mail,
                'customer_address': customer_address,
                'purchase_quantity': purchase_quantity,
                'total': total, _token: '{{csrf_token()}}',
            },
            success: function (data) {
                var content = $('.modal-body').html();
                $('.modal-body').html(data.status);
                setTimeout(() => {
                    $('#modal-info').modal('hide');
                    $('.modal-body').html(content);
                }, 4000);
            }
        });
}