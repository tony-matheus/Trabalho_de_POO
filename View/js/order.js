$(document).ready(function () {
    Menu.Gerate('pizza');
    Menu.Gerate('meal');
    Menu.Gerate('drink');
    Menu.Gerate('dessert');
})

var Menu = {
    Gerate : function(menu)
    {
        $.post("http://localhost/projeto_belson_active/index.php/manager/find" + upCaseFirst(menu), {
        }, function (response) {
            var menu_list = '';
            $.each(response, function (index, value) {
                menu_list += [
                    {
                        icon: 'plus',
                        name: returnUndefined(value['name']),
                        onclick: 'Order.Add',
                        price: returnUndefined(value['price']),
                        complement: returnUndefined(value['size']),
                        data: menu,
                        id: returnUndefined(value['id'])
                    },
                ].map(list_template).join('');
            });
            $("#" + menu + "-itens").html(menu_list);
        }, "json");
    }
}

var Order = {
    Add: function (element) {
        var amount = 1;
        var element_tmp = $(element).parent();
        Order.SumTotal($(element_tmp).data('price'));

        if ($("#order-itens [data-item='" + $(element_tmp).data('menu') + $(element_tmp).data('id') +"']").length == 1 ) {
            let tmp_amount = parseInt($(".amount-" + $(element_tmp).data('menu') + $(element_tmp).data('id')).html().replace("x", ""));
            $(".amount-" + $(element_tmp).data('menu') + $(element_tmp).data('id')).html(tmp_amount+1+"x")
            return;
        }

        $('#order-itens items-order').append([
            {
                icon: 'remove',
                name: $(element_tmp).data('name'),
                onclick: 'Order.Remove',
                price: $(element_tmp).data('price'),
                complement: $(element_tmp).data('complement'),
                data: $(element_tmp).data('menu'),
                id: $(element_tmp).data('id'),
                amount: amount
            },
        ].map(list_order).join(''));
        $(".amount-" + $(element_tmp).data('menu') + $(element_tmp).data('id')).html(amount+"x");
    },
    Remove : function(){
        swal({
            title: 'Tem certeza que deseja cancelar o pedido?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não',
            confirmButtonClass: 'btn btn-success btn-lg',
            cancelButtonClass: 'btn btn-danger btn-lg m-r-1',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $("#order-itens items-order").html("");
                $("#total-order").val("0.00");
            }
        })
    },
    SumTotal : function( price ){
        let total = parseFloat($('#total-order').html()) + parseFloat(price);
        $('#total-order').html(total);
    },
    Confirm : function(){

        $("#modal-order").modal("show");
        let items = $('items-order').children();
        $('items-finalize').html("");
        let total = 0
        $.each(items, function(index, value){
            let data = $(value).data();
            let amount = parseInt($(".amount-"+data.item).html().replace('x', ''));
            $('#modal-order items-finalize').append([
                {
                    name: data.name,
                    price: data.price,
                    complement: data.complement,
                    amount: amount
                },
            ].map(list_finalize).join(''));
            total += (data.price * amount);
        });

        $("#total-finalize-order").html(total);
        $('#modal-order').on('shown.bs.modal', function () {
            Client.FindAll();
            Deliveryman.FindAll();
        })
    },
    Finalize : function () {
        let items = $('items-order').children();
        let payment_type = $("#payment_order").val();
        let check_params = "";
        if(payment_type == "bank_check"){
             check_params = {
                number  : $("#check_number").val(),
                account : $("#check_account").val(),
                agency  : $("#check_agency").val(),
                bank    : $("#check_bank").val(),
            }
        }
        let data_insert_order = {
            client_id    : $("#client_order").val(),
            deliveryman  : $("#deliveryman_order").val(),
            payment_type : payment_type,
            items        : [],
            value        : $("#total-order").html(),
            check_params : check_params
        }
        $.each(items, function (index, value) {
            let data = $(value).data();
            data_insert_order['items'].push({
                type   : data.menu,
                id     : data.id,
                amount : parseInt($(".amount-"+data.item).html().replace('x', ''))
            });
        });
        $.post("http://localhost/projeto_belson_active/index.php/Manager/createOrder",{
            data_insert_order : data_insert_order,
            check_params : check_params
        }, function(response){
            console.log(response);
            if(response == false){
                swal({
                    type: "error",
                    title: "Bebidas insuficientes",
                    text: ""
                });
            }else{
                swal({
                    type: "success",
                    title: "Sucesso"
                });
            }
        },"json");
    }
}

var Client = {
    FindAll : function(){
        $.post("http://localhost/projeto_belson_active/index.php/manager/getClients", {
        }, function (response_client) {
            var clients = [
                {
                    value: 0,
                    id: 0,
                    data: '',
                    text: 'Selecione um Cliente',
                },
            ].map(select_option).join('');
            $.each(response_client, function (index, data_client) {
                clients += [
                    {
                        value: data_client.id,
                        id: data_client.id,
                        data: '',
                        text: data_client.name,
                    },
                ].map(select_option).join('');
            });
            $("#client_order").html(clients);
        }, "json");
    },
    Create : function(){
        let client = {
            name : $("#name").val(),
            phone : $("#phone").val()
        };
        let client_address = {
            place: $("#place").val(),
            number: $("#number").val(),
            reference_point: $("#reference_point").val()
        };

        $.post("http://localhost/projeto_belson_active/index.php/manager/createClient", {
            client: client,
            client_address: client_address
        }, function (response) {
            if (response) {
                swal({
                    type:'success',
                    title: "Sucesso",
                    allowOutsideClick: false
                })
            }
        }, "json");
    }
}

var Deliveryman = {
    FindAll : function(){
        $.post("http://localhost/projeto_belson_active/index.php/manager/getDeliverymans", {
        }, function (response_deliveryman) {
            let deliveryman = [
                {
                    value: 0,
                    id: 0,
                    data: '',
                    text: 'Selecione um Entregador',
                },
            ].map(select_option).join('');
            $.each(response_deliveryman, function (index, data_deliveryman) {
                deliveryman += [
                    {
                        value: data_deliveryman.id,
                        id: data_deliveryman.id,
                        data: '',
                        text: data_deliveryman.name,
                    },
                ].map(select_option).join('');
            });
            $("#deliveryman_order").html(deliveryman);
        }, "json");
    }
}

function getCheck(value)
{
    if (value == "bank_check") {
        $("#check_params").show();
    }else{
        $("#check_params").hide();
    }
}
