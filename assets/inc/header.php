<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>GitHubMySearch</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
	<?php if(isset($styles)){
		foreach ($styles as $styles_name) {
			$href = base_url()."assets/css/custom/".$styles_name ?>
			<link href="<?=$href?>" rel="stylesheet">
		<?php }
	} ?>

	</head>
	<body style="min-height:calc(100vh - 83px) !important;">
		<!-- Navigation -->

