$(document).ready(function(){
      generateMenu.Pizza();
      generateMenu.Meal();
      generateMenu.Drinks();
      generateMenu.Dessert();
      $('input').on('ifChecked', function(event){

      });
});

function icheckCharge()
{
    $('input').iCheck({
      checkboxClass: 'icheckbox_flat',
      radioClass: 'iradio_flat'
    });
}

function callModal()
{
    $("#modal-client").modal("show");
}

function createOrder()
{
    let client_id = $("#client_name").val();
    let argument = {client_id:client_id}
    $.post("http://localhost/projeto_belson_active/projeto_belson_active/index.php/manager/createOrder",{
        client_id:client_id
    },function(response){
        console.log(response);
    },"json");
}

// function createOrder()
// {
//     let id_client = 1;
//     let itens = {
//         pizzas:[1,4],
//         drinks:[2,5]
//     };
//
//     let order = {
//         id_client : id_client,
//         itens:itens
//     }
//     $.post("http://localhost/projeto_belson_active/index.php/manager/createOrder",{
//         order : order
//     },function(response){
//
//     },"json");
// }

let generateMenu = {
    Pizza : function()
    {
        $.post("http://localhost/projeto_belson_active/index.php/manager/findPizza",{
        },function(response){
            var template = {
                listmenu : '<li class="list-group-item" id="pizza_@id"><img src="img/plus.svg" height="17px" width="20px">    <img src="img/negative.svg" height="17px" width="20px">    @name - @price - @size </li>'
            }
            var list_pizza = "";
            $.each(response, function(index, value){
                let item = template["listmenu"].replace('@id', value["id"]).replace('@name', value["name"]).replace('@price', value["price"]).replace('@size', value["size"])
                list_pizza += item;
            })
            $("#pizza").html(list_pizza);
            icheckCharge();
        },"json");
    },
    Meal : function()
    {
        $.post("http://localhost/projeto_belson_active/index.php/manager/findMeal",{
        },function(response){
            var template = {
                listmenu : '<li class="list-group-item" id="meal_@id"><img src="img/plus.svg" height="17px" width="20px">  <img src="img/negative.svg" height="17px" width="20px">  @name - @price </li>'
            }
            var list_meal="";
            $.each(response, function(index, value){
                let item = template["listmenu"].replace('@id', value["id"]).replace('@name', value["name"]).replace('@price', value["price"]);
                list_meal += item;
            })
            $("#meal").html(list_meal);
            icheckCharge();
        },"json");
    },
    Drinks : function()
    {
        $.post("http://localhost/projeto_belson_active/index.php/manager/findDrink",{
        },function(response){
            var template = {
                listmenu : '<li class="list-group-item" id="drinks_@id"><img src="img/plus.svg" height="17px" width="20px">  <img src="img/negative.svg" height="17px" width="20px">   @name - @price </li>'
            }
            var list_drinks="";
            $.each(response, function(index, value){
                let item = template["listmenu"].replace('@id', value["id"]).replace('@name', value["name"]).replace('@price', value["price"]);
                list_drinks += item;
            })
            $("#drinks").html(list_drinks);
            icheckCharge();
        },"json");
    },
    Dessert : function()
    {
        $.post("http://localhost/projeto_belson_active/index.php/manager/findDessert",{
        },function(response){
            var template = {
                listmenu : '<li class="list-group-item dessert_@id"> <a id="dessert_@id" onclick="OrderManipulation(this.id)" ><img  src="img/plus.svg" height="17px" width="20px"></a> <img src="img/negative.svg" id="dessert_@id" onclick="OrderManipulation(this.id, "remove") height="17px" width="20px" style="display:none" >  @name - @price <span id="qtd_dessert_@id"></span></li>'
            }
            var list_drinks="";
            $.each(response, function(index, value){
                let item = template["listmenu"].replace(/\@id/g, value["id"]).replace('@name', value["name"]).replace('@price', value["price"]);
                list_drinks += item;
            })
            $("#dessert").html(list_drinks);
            icheckCharge();
        },"json");
    }
}

function finalizarPedido()
{
  let element = $('li');
  $.each(element, function(index, value){
    let id = $(value).data('id');
    let price = $(value).data('price');
    let qtd = $(value).data('qtd');
    console.log(id+' valor Total: R$ '+(qtd*price));
      });
}

// function OrderManipulation(id_item, action)
function OrderManipulation(id_item)
{
    let element = $("."+id_item).parent();
    if ( $("."+id_item).length > 1 ){
        console.log("dssdsd")
        $("."+id_item+":eq(1) #qtd_"+id_item).html(parseInt($("."+id_item+":eq(1) #amount_"+id_item).text()) + 1)

        return;
    }
    $("#order").append($("."+id_item).parent().html())
    $("."+id_item+":eq(1) #qtd_"+id_item).html(1)
}

function createClient()
{
    let name = $("#name").val();
    let phone = $("#phone").val();
    let street = $("#street").val();
    let number = $("#number").val();
    let reference_point = $("#reference_point").val();

    $.post("http://localhost/projeto_belson_active/index.php/manager/createClient", {
        name            : name,
        phone           : phone,
        street          : street,
        number          : number,
        reference_point : reference_point
    }, function(){

    },"json");

}
