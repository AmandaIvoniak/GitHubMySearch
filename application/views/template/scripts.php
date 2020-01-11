		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<?php if(isset($scripts)){
			foreach ($scripts as $scripts_name) {
				$src = base_url()."public/js/".$scripts_name ?>
				<script src="<?=$src?>"></script>
				<?php }
			}
		?>
	</body>
</html>