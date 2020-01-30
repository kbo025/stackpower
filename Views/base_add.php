<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        Base <i class="fa fa-users"></i>
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <form action="<?= BASE_URL ?>base/add_action" METHOD="post">
	 <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">Base - Adicionar</div>
            </div>	
            <div class="box-body">
			      <div class="row">
					<div class="col-md-8">
						<div class="form-group">
						 <label for="nome">Base:</label>
						<input type="text" name="nome" id="nome" class="form-control"><br>
						</div>
					</div>	
					</div>
					 <div class="row">
					
					</div>	
					<div class="box-tools">
						<input type="submit" value="Salvar" class="btn btn-primary">
					</div>
				</div>
			</div>	
		</div>		
    </form>

</section>

<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>