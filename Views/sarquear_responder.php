<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        Consultas <i class="fa fa-users"></i>
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <form action="<?= BASE_URL ?>sarquear/responder_aqui/<?= $info['id']?>" METHOD="post">
		<div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">Consultas- Resposta</div>
            </div>	
            <div class="box-body">
				<div class="row">
						<div class="col-md-8">
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
						  <input type="text" name="txttelefonepm" class="form-control" value="<?= $info['telefonepm']?>">
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
										<option value="9">Outros</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
						   <label>Status Consulta:</label>
							<select name="status" id="status" class="form-control">
									<option>Selecione....</option>
									<option value="1">Pendente</option>
									<option value="3">Respondido</option>
									<option value="4">Conduzir</option>
							</select>
						</div>			
					</div>	
				 <div class="row">					
						<div class="col-md-4">
							<div class="form-group">
							<label for="situacao">Bases Consultadas:</label>
							<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="check[portal]" id="input" value="1">
							<label class="form-check-label" for="inlineCheckbox1">Portal da Seguranca</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="check[sinesp]" id="input1"  value="2">
								<label class="form-check-label" for="inlineCheckbox2">SINESP-INFOSEG</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="check[sispes]"id="input2"  value="3">
								<label class="form-check-label" for="inlineCheckbox3">SISPES</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="check[bnmp]" id="input3"  value="4">
								<label class="form-check-label" for="inlineCheckbox4">BNMP</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" name="check[outros]" id="input4"  value="5">
								<label class="form-check-label" for="inlineCheckbox5">Outros</label>
							</div>
							</div>
						</div>		
					</div>		
					 <div class="row">
						<div class="col-md-12">
						  <div class="form-group">
							<label for="placa">Resposta e anexo,fotos ou documentos:</label>
							<textarea class="form-control"  name="resposta" id="resposta" rows="4"></textarea>
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
<script> 