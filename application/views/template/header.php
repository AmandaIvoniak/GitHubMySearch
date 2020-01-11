<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">
		<title>MadeiraMadeira</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
	<?php if(isset($styles)){
		foreach ($styles as $styles_name) {
			$href = base_url()."public/css/".$styles_name ?>
			<link href="<?=$href?>" rel="stylesheet">
		<?php }
	} ?>

	</head>
	<body>
		<!-- Navigation -->
		<nav>
			<div class="nav-wrapper black">
				<a href="#" class="brand-logo">Logo</a>
				<ul class="right hide-on-med-and-down">
						<li>
							<a class="" href="<?php echo base_url(); ?>home">Home</a>
						</li>
						<li>
							<a class="" href="<?php echo base_url(); ?>perfil">Perfil</a>
						</li>
						<li>
							<a class="" href="<?php echo base_url(); ?>">Sair</a>
						</li>
						<li>
							<a class="" href="<?php echo base_url(); ?>login">Login</a>
						</li>
					</ul>
			</div>
		</nav>

