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

</head>

<body class="bg-light">

	<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Heystaurante</a>
		<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
                <li class="nav-item active">
					<a class="nav-link" href="http://localhost/Trabalho_de_POO/index.php/Dashboard">Dashboard <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="http://localhost/Trabalho_de_POO/index.php/Manager">Pedido</a>
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
		<ul class="nav nav-tabs" id="menu" role="tablist" style="background: #fff;">
			<li class="nav-item">
				<a class="nav-link active" id="order-tab" data-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="true">Pedidos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="deliveryman-tab" data-toggle="tab" href="#deliveryman" role="tab" aria-controls="deliveryman" aria-selected="false">Entregadores</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="products-tab" data-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="false">Produtos</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade show active" id="order" role="tabpanel" aria-labelledby="order-tab">
				<div style="padding: 1em 0em;" id="order-itens">
					<div class="row" style="padding: 0em 1em;" id="items-order-status">

					</div>
				</div>
			</div>
			<div class="tab-pane fade show" id="deliveryman" role="tabpanel" aria-labelledby="deliveryman-tab">
				<div style="padding: 1em 0em" id="deliveryman-itens">
					<table class="table table-striped" style="background:#fff" id="table_delivery">
						<thead>
							<tr>
								<th scope="col">Entregador</th>
								<th scope="col">Total de Vendas</th>
								<th scope="col">Comissão</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade show" id="products" role="tabpanel" aria-labelledby="products-tab">
				<div style="padding: 1em 0em" id="products-itens">
					<table class="table table-striped" style="background:#fff" id="table_items_order">
						<thead>
							<tr>
								<th scope="col">Produto</th>
								<th scope="col">Quantidade Vendida</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
			<div class="tab-pane fade show" id="dessert" role="tabpanel" aria-labelledby="dessert-tab">
				<div style="padding: 1em" id="dessert-itens">
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
	<script src="../View/js/dashboard.js"></script>

</body>
</html>
