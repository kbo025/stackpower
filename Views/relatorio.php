<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        <i class="fa fa-paste"></i> Relatórios
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
 <form action="<?= BASE_URL ?>relatorio/rel_action" METHOD="post">
   		<div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">Sarque</div>
            </div>	
            <div class="box-body">
					<Label>Período</Label>
					<div class="row ">
						<div class="col-md-4">
						  <div class="form-group">
							<label for="nome">Data inicial:</label>
							<input type="date" name="data" class="form-control"><br>
						 </div>
						</div> 
						<div class="col-md-4">
						  <div class="form-group">
							<label for="nome">Data Final:</label>
							<input type="date" name="data1" class="form-control">
						 </div>
						</div> 
					</div> 
					<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="base">Base</label>
							<select name="base" class="form-control">
							<option value="">Todos</option>
								<?php foreach ($base_list as $base) : ?>
									<option value="<?= $base['id']?>"><?= $base['base']?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						  <div class="form-group">
						  <label>Status:</label>
							<select name="status" id="status" class="form-control">
									<option value ="">Todos</option>
									<option value="1">PENDENTE</option>
									<option value="2">ANALISE</option>
									<option value="3">RESPONDIDO</option>
									<option value="4">CONDUZIR</option>
							</select>
						 </div>
						</div> 	
		</div>					
					<div class="box-tools">
						<input type="submit" value="Gerar" class="btn btn-success">
					</div>
		</div>

	</form>
</section>
<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>