<div class="container-narrow">
	<div class="jumbotron">
        <h1>Dobrodošli na myBook.hr!</h1>
        <p class="lead"></p>
        <!-- Button to trigger modal -->
		<a href="#myModal" role="button" class="btn btn-large btn-success" data-toggle="modal">Prijava</a>
		<a class="btn btn-large btn-primary" href="#">Registracija</a>

		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Unesite svoje podatke</h3>
			</div>
			<div class="modal-body">
				<?php echo $this->Element('Users/login');?>
			</div>
		</div>

		<hr>

		<div class="row-fluid marketing">
			<div class="span6">
				<h4>Subheading</h4>
				<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

				<h4>Subheading</h4>
				<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

				<h4>Subheading</h4>
				<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
			</div>

			<div class="span6">
				<h4>Subheading</h4>
				<p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

				<h4>Subheading</h4>
				<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

				<h4>Subheading</h4>
				<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
			</div>
		</div>
	</div>
</div>
