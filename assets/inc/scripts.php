		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js"></script>

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<?php if(isset($scripts)){
			foreach ($scripts as $scripts_name) {
				$src = base_url()."assets/js/".$scripts_name ?>
				<script src="<?=$src?>"></script>
				<?php }
			}
		?>
	</body>
</html>