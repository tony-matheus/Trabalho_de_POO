<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="https://getbootstrap.com/favicon.ico">

	<title>Heystaurante</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

	<!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/offcanvas/offcanvas.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <link href="../View/css/style.css" rel="stylesheet">

	<script src="sweetalert2/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

</head>

<body class="bg-light">

	<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Heystaurante</a>
		<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
                <li class="nav-item">
					<a class="nav-link" href="http://localhost/projeto_belson_active/index.php/Dashboard">Dashboard <span class="sr-only"></span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="http://localhost/projeto_belson_active/index.php/Manager">Pedido <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#modal-client" data-toggle="modal" data-target="#modal-client">Clientes</a>
				</li>
			</ul>
		</div>
	</nav>

	<main role="main" class="container">
		<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
			<img class="mr-3" src="https://image.flaticon.com/icons/svg/224/224457.svg" alt="" width="48" height="48">
			<div class="lh-100">
				<h4 class="mb-0 text-white lh-100">Hey Pizza</h4>
			</div>
		</div>

		<div class="my-3 bg-white rounded box-shadow">
            <div class="row">
                <div class="col-7">
                    <ul class="nav nav-tabs" id="menu" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pizza-tab" data-toggle="tab" href="#pizza" role="tab" aria-controls="pizza" aria-selected="true">Pizza</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="meal-tab" data-toggle="tab" href="#meal" role="tab" aria-controls="meal" aria-selected="false">Refeições</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="drink-tab" data-toggle="tab" href="#drink" role="tab" aria-controls="drink" aria-selected="false">Bebidas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="dessert-tab" data-toggle="tab" href="#dessert" role="tab" aria-controls="dessert" aria-selected="false">Sobremesas</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="pizza" role="tabpanel" aria-labelledby="pizza-tab">
                            <div style="padding: 1em" id="pizza-itens">
                            </div>
                        </div>
						<div class="tab-pane fade show" id="meal" role="tabpanel" aria-labelledby="meal-tab">
                            <div style="padding: 1em" id="meal-itens">
                            </div>
                        </div>
						<div class="tab-pane fade show" id="drink" role="tabpanel" aria-labelledby="drink-tab">
                            <div style="padding: 1em" id="drink-itens">
                            </div>
                        </div>
						<div class="tab-pane fade show" id="dessert" role="tabpanel" aria-labelledby="dessert-tab">
                            <div style="padding: 1em" id="dessert-itens">
                            </div>
                        </div>
					</div>
                </div>
                <div class="col-5" style="border-left:4px solid #f8f9fa;padding-bottom: 1em;">
                    <div class="p-3">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Seu Pedido</span>
                            <span class="badge badge-secondary badge-pill">Nº <?= rand(0,999)?></span>
                        </h4>
                        <ul class="list-group mb-3" id="order-itens">
                            <items-order></items-order>


                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Total </strong>
                                <strong>R$ <span id="total-order">0.00</span></strong>
                            </li>
                        </ul>

                        <button type="submit" class="btn btn-outline-danger float-left" onclick="Order.Remove()">Cancelar</button>
                        <button type="submit" class="btn btn-success float-right" onclick="Order.Confirm()">Confirmar Pedido</button>
                        </div>
                </div>
            </div>

        </div>

        <div class="modal fade" id="modal-order" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background: #f6f6f6;border: 0px;">
                    <div class="modal-header bg-d">
                        <h1 class="text-center" style="width: 100%;"><sup style="font-size:0.5em">R$</sup> <span id="total-finalize-order">999,99<span></h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="top: -20px;padding-top: 0px;">
                        <items-finalize></items-finalize>
                        <div class="form-group">
                            <label for="client">Cliente</label>
                            <select class="form-control custom-select js-example-responsive" id="client_order">
                                <option>Carregando...</option>
                            </select>
                        </div>

						<div class="form-group">
                            <label for="deliveryman">Entregador</label>
                            <select class="form-control custom-select js-example-responsive" id="deliveryman_order">
                                <option>Carregando...</option>
                            </select>
                        </div>

						<div class="form-group">
                            <label for="payment">Forma de Pagamento</label>
                            <select class="form-control custom-select js-example-responsive"  onchange="getCheck(this.value)" id="payment_order">
								<option> Selecione um metodo de pagamento </option>
                                <option value="bank_check">Cheque</option>
								<option value="credit_card">Cartão credito</option>
								<option value="debit_card">Cartão debito</option>
								<option value="money">Dinheiro</option>
                            </select>
                        </div>

						<div class="form-group" id="check_params" style="display:none">
							<div class="row">
								<div class="col">
									<label> Numero do Cheque</label>
									<input type="text"  class="form-control" id="check_number">
								</div>
								<div class="col">
									<label> Numero da Conta</label>
									<input type="text" class="form-control" id="check_account">
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label> Digito da Agencia</label>
									<input type="text" class="form-control" id="check_agency">
								</div>
								<div class="col">
									<label> Nome do Banco</label>
									<input type="text" class="form-control" id="check_bank">
								</div>
							</div>
						</div>

                    </div>
                    <div class="modal-footer">
                        <!-- <div class="row"> -->
                            <div class="col-4">
                                <button type="button" class="btn btn-outline-dark btn-block" data-dismiss="modal">Cancelar</button>
                            </div>
                            <div class="col-8">
                                <button type="button" class="btn btn-primary btn-block" onclick="Order.Finalize()">Finalizar Pedido</button>
                            </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-client" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:;" onsubmit="Client.Create()">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" id="name">
                                </div>
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" id="phone">
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group">
                                        <label>Rua</label>
                                        <input type="text" class="form-control" id="place">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <input type="text" class="form-control" id="number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ponto de Referência</label>
                                <input type="text" class="form-control" id="reference_point">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="Client.Create()">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

	</main>
    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
	<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
	<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
	<script src="https://getbootstrap.com/docs/4.0/examples/offcanvas/offcanvas.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<script src="../View/js/templates.js"></script>
	<script src="../View/js/helper.js"></script>
	<script src="../View/js/order.js"></script>

</body>
</html>
