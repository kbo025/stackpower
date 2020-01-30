<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        Sarque Veículos  <i class="fa fa-car"></i>
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

	
    <form action="<?= BASE_URL ?>sarquear/veic_action" METHOD="post">
	 <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">Sarque - Veículos</div>
            </div>	
            <div class="box-body">
			      <div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label for="base">Base</label>
							<select name="base" class="form-control">
								<?php foreach ($base_list as $base) : ?>
									<option value="<?= $base['id']?>"><?= $base['base']?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>	
					</div>
					 <div class="row">
						<div class="col-md-3">
						  <div class="form-group">
							<label for="placa">Placa ou CHASSI:</label>
							<input type="placa" name="placa" id="placa" class="form-control"><br>
							 </div>
						</div> 
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