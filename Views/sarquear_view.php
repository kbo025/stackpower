<!-- Conteudo da Pagina -->
<section class="content-header">
  
</section>

<!-- Main content -->
<section class="content container-fluid">

		<div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">Resposta da Consulta</div>
            </div>	
            <div class="box-body">
			      <div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="situacao">Situação</label>
							<select name="situacao" id="situacao" class="form-control" disabled>
										<option>Selecione....</option>
										<option value="1"<?= ($info['situacao'] == '1') ? 'selected' : ''?>>Anotações Criminais</option>
										<option value="2"<?= ($info['situacao'] == '2') ? 'selected' : ''?>>Busca e Apreensão</option>
										<option value="3"<?= ($info['situacao'] == '3') ? 'selected' : ''?>>Dados Inconsistentes</option>
										<option value="4"<?= ($info['situacao'] == '4') ? 'selected' : ''?>>Desaparecidos</option>
										<option value="5"<?= ($info['situacao'] == '5') ? 'selected' : ''?>>Evadido</option>
										<option value="6"<?= ($info['situacao'] == '6') ? 'selected' : ''?>>Mandado</option>
										<option value="6"<?= ($info['situacao'] == '7') ? 'selected' : ''?>>Nada Constatado</option>
										<option value="7"<?= ($info['situacao'] == '8') ? 'selected' : ''?>>Veiculo Roubado</option>
										<option value="8"<?= ($info['situacao'] == '9') ? 'selected' : ''?>>Veciulo Furtados</option>
										<option value="8"<?= ($info['situacao'] == '10') ? 'selected' : ''?>>Outros</option>
								</select>
							</select>
						</div>
					</div>	
					</div>
				    <div class="row">
					<div class="col-md-4">
					   <label for="status">Status</label>
						<select name="status" id="status" class="form-control" disabled>
								<option>Selecione....</option>
								<option value="3"<?= ($info['status'] == '3') ? 'selected' : ''?>>Respondido</option>
								<option value="2"<?= ($info['status'] == '2') ? 'selected' : ''?>>Análise</option>
								<option value="1"<?= ($info['status'] == '1') ? 'selected' : ''?>>Pendente</option>
								<option value="4"<?= ($info['status'] == '4') ? 'selected' : ''?>>Conduzir</option>
								<option value="5"<?= ($info['status'] == '5') ? 'selected' : ''?>>Fechado</option>
								<option value="6"<?= ($info['status'] == '6') ? 'selected' : ''?>>Preso</option>
								<option value="7"<?= ($info['status'] == '7') ? 'selected' : ''?>>Liberado</option>
						</select>
					</div>	
					<div class="col-md-4">
						<div class="form-group">
						   <label for="pesquisador">Operador</label>
							<select name="pesquisador" id="pesquisador" class="form-control" disabled>
								<?php
									foreach ($list_pesq as $list) : ?>
									<option><?= $list['name']?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>	
					</div>					
					 <div class="row">
						<div class="col-md-8">
						  <div class="form-group">
							<label for="placa">Resposta:</label>
							<textarea class="form-control"  name="obs" id="obs" rows="4" disabled><?= $info['resposta']?></textarea>
							 </div>
						</div> 
					</div>		
					<form action="<?= BASE_URL.'sarquear/fechar/'.$info['id']?>" METHOD="post">		
					<?php if($info['resposta_usuario']){?>		 
					<div class="row">
						<div class="col-md-8">
						  <div class="form-group">
							<label for="txtresposta_usuario">Contra-resposta:</label>
							<textarea class="form-control"  name="txtresposta_usuario" id="txtresposta_usuario" disabled rows="4" ><?= $info['resposta_usuario']?></textarea>
							 </div>
						</div> 
					</div>
					<?php } elseif($info['id_usuario'] == $_SESSION['StockPower']['id'] ) { ?>
						<div class="row">
						<div class="col-md-8">
						  <div class="form-group">
							<label for="txtresposta_usuario">Contra-resposta:</label>
							<textarea class="form-control"  name="txtresposta_usuario" id="txtresposta_usuario" rows="4" ></textarea>
							 </div>
						</div> 
					</div>
					<div class="box-tools">
						<?php 
						$a = array(3, 6, 7);
						if(in_array($info['status'], $a)) {?>
						<input type="submit" value="Fechar" class="btn btn-success">
						<?php }?>
						<?php }?>
						<a href="<?= BASE_URL.'sarquear/voltar'?>" class="btn btn-danger">Voltar</a>
					</div>
					</form>					

			</div>
		</div>					

</section>

<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>
