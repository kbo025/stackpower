<style type="text/css">
 #esquerda {
    transform: rotate(90deg);
}
</style>
  
<!-- Conteudo da Pagina -->
<section class="content-header">
    
</section>

<!-- Main content -->
<section class="content container-fluid">
<?php if(!empty($error)): ?>
    	<div class="callout callout-danger">
    		<p><?php echo $error; ?></p>
    	</div>
    <?php endif; ?>
    <form action="<?= BASE_URL ?>sarquear/responder_aqui/<?= $info['id']?>" METHOD="post" enctype="multipart/form-data">
		<div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">Consultas- Resposta</div>
            </div>	
            <div class="box-body">
			<?php if(!empty($info['caminhofoto'])){?>
				<div class="container">
					<div class="row">
						<div class="col-md-4 control-label"></div>
						<div class="col-sm-2">
						<img id="esquerda" src="../../<?= $info['caminhofoto']?>" height="200" width="200">
						</div>
					</div>
				</div>
			<?php }?>
				<br>
				<br>
				<div class="row">
						<div class="col-md-12">
						<div class="form-group">
						   <label>Nome</label>
						   <input type="text" name="txtnome" class="form-control" value="<?= $info['nome']?>">
						</div>	
					</div>	
				</div>				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						   <label>RG</label>
						  <input type="text" name="txtrg" class="form-control" value="<?= $info['rg']?>">
						</div>			
					</div>			
					<div class="col-md-4">
						<div class="form-group">
						   <label>CPF</label>
						  <input type="text" name="txtcpf" class="form-control" value="<?= $info['cpf']?>">
						</div>			
					</div>	
					<div class="col-md-4">
						<div class="form-group">
						   <label>Data Nascimento</label>
						  <input type="text" name="txtdatanascimento" class="form-control" value="<?= date('d/m/Y', strtotime($info['nascimento'])); ?>">
						</div>			
					</div>	
				</div>	
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
						   <label>Pai</label>
						  <input type="text" name="txtpai" class="form-control" value="<?= $info['pai']?>">
						</div>			
					</div>			
				</div>		
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
						   <label>Mae</label>
						  <input type="text" name="txtmae" class="form-control" value="<?= $info['mae']?>">
						</div>			
					</div>			
				</div>							
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						   <label>PLACA</label>
						  <input type="text" name="txtplaca" class="form-control" value="<?= $info['placa']?>">
						</div>			
					</div>	
					<div class="col-md-4">
						<div class="form-group">
						   <label>Telefone Policial</label>
						  <input type="text" name="txttelefonepm" class="form-control" value="<?= $info['telefone']?>">
						</div>			
					</div>				
				</div>
				<br>				
			      <div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="situacao">Situação:</label>
								<select name="situacao" id="situacao" class="form-control">
										<option>Selecione....</option>
										<option value="1">Anotações Criminais</option>
										<option value="2">Busca e Apreensão</option>
										<option value="3">Dados Inconsistentes</option>
										<option value="4">Desaparecidos</option>
										<option value="5">Evadido</option>
										<option value="6">Mandado</option>
										<option value="7">Nada Constatado</option>
										<option value="8">Veiculo Roubado</option>
									    <option value="9">Veiculo Furtado</option>
										<option value="10">Outros</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
						   <label>Status Consulta:</label>
							<select name="status" id="status" class="form-control">
									<option value="">Selecione....</option>
									<option value="1">Pendente</option>
									<option value="3">Respondido</option>
									<option value="4">Conduzir</option>
							</select>
						</div>			
					</div>	
				 <div class="row">					
						<div class="col-md-4">
							<div class="form-group">
							<label for="baseconsultas">Bases Consultadas:</label>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="check[]" value="1">
							<label class="form-check-label" for="inlineCheckbox1">Portal da Seguranca</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="check[]"  value="2">
								<label class="form-check-label" for="inlineCheckbox2">SINESP-INFOSEG</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="check[]"  value="3">
								<label class="form-check-label" for="inlineCheckbox3">SISPES</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="check[]" value="4">
								<label class="form-check-label" for="inlineCheckbox4">BNMP</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="check[]"  value="5">
								<label class="form-check-label" for="inlineCheckbox5">Outros</label>
							</div>
							</div>
						</div>		
					</div>
					 <div class="row">
						<div class="col-md-12">
						  <div class="form-group">
							<label for="placa">Observações:</label>
							<textarea class="form-control"  name="obs" id="obs" disabled  rows="4"><?= $info['obs']?></textarea>
							 </div>
						</div> 
					</div>						
					 <div class="row">
						<div class="col-md-12">
						  <div class="form-group">
							<label for="placa">Resposta e anexo,fotos ou documentos:</label>
							<textarea class="form-control"  name="resposta" id="resposta"  rows="4"></textarea>
							 </div>
						</div> 
					</div>	
					<div class="row">
						<div class="col-md-12">
			                <div class="form-group">
							  <label for="anexo">Anexar</label>
							  <input type="file" name="anexo[]" multiple>
							</div>
						</div> 
					</div>	
					<div class="box-tools">
						<input type="submit" value="Responder" class="btn btn-success">
					</div>
			</div>
		</div>					
    </form>

</section>

<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>

	

