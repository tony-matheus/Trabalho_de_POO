$(document).ready(function () {
    Order.FindAll();
    Deliveryman.FindAll();
    ItemsOrder.FindAll();
});

var Order = {
    FindAll : function () {
        $.post("http://localhost/projeto_belson_active/index.php/manager/getOrder", {
        }, function (response) {
            let list_order = "";
            let opacity_class = ["", "", "opacity-on", "opacity-on"];
            $.each(response, function (index, value) {
                list_order += [
                    {
                        id : index,
                        client : value.client,
                        phone : value.phone,
                        status : status_order(value.status),
                        items : createListItems(value.items),
                        opacity : opacity_class[value.status],
                        total_items : totalItems(value.items),
                        date_hour : value.date_hour,
                        status_code: value.status
                    },
                ].map(list_order_status).join('');
            });
            $("#items-order-status").html(list_order);

        }, "json");
    },
    UpdateStatus : function (id, status_code){
        id, status_code
        $.post("http://localhost/projeto_belson_active/index.php/Manager/alterStatus", {
            id          : id,
            status_code : status_code
        },function(response) {
            if (response) {
                console.log(response);
                Order.FindAll();
            }
        })

    }
}

function status_order(status)
{
    let text = ["EM ESPERA", "REALIZADO", "CANCELADO", "DEVOLVIDO"];
    let style_class = ["warning", "success", "danger", "secondary"];
    let template = `<small class="badge badge-${style_class[status]} text-uppercase float-right">${text[status]}</small>`;
    return template;;
}

function totalItems(items)
{
    let total = 0;
    $.each(items, function (index, value) {
        total += (value.amount * value.price);
    });
    return `<p style="border-top: 1px solid #f5f5f5"><b>TOTAL <span class="float-right">R$ ${total}</span></b></p>`;
}

function createListItems(items)
{
    let items_content = "";
    $.each(items, function(index, value){
        items_content += `
        <p style="margin-bottom: 0;"><span>${value.item}</span> <span class="float-right">${value.amount}x R$ ${value.price}</span></p>
        `;
    });
    return items_content;
}

var Deliveryman = {
    FindAll: function () {
        $.post("http://localhost/projeto_belson_active/index.php/manager/getDeliverymans", {
        }, function (response) {
            let list_delivery = "";
            $.each(response, function (index, value) {
                list_delivery += [
                    {
                        name : value.name,
                        total : value.total,
                        percent: value.percent
                    },
                ].map(table_delivery).join('');
            });
            $("#table_delivery tbody").html(list_delivery);

        }, "json");
    },
    UpdateStatus: function (id, status_code) {
        console.log(id, status_code);
    }
}

var ItemsOrder = {
    FindAll: function () {
        $.post("http://localhost/projeto_belson_active/index.php/manager/getItemsOrder", {
        }, function (response) {
            let list_product = "";
            $.each(response, function (index, value) {
                list_product += [
                    {
                        product: value.product,
                        total: value.total
                    },
                ].map(table_items_orders).join('');
            });
            $("#table_items_order tbody").html(list_product);

        }, "json");
    },
    UpdateStatus: function (id, status_code) {
        console.log(id, status_code);
    }
}
