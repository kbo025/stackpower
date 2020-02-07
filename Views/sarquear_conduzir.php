<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        SICA <i class="fa fa-users"></i>
    </h1>
</section>
<script>



function verifica(value){
	var input = document.getElementById("input");

  if(value == 17){
    input.disabled = false;
  }else if(value != 17){
    input.disabled = true;
  }
};

</script>

<!-- Main content -->
<section class="content container-fluid">

    <form action="<?= BASE_URL ?>sarquear/conduzir_aqui/<?= $info['id']?>" METHOD="post">
		<div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">SICA - Conduzir</div>
            </div>	
            <div class="box-body">
				<div class="row">
						<div class="col-md-4">
						<div class="form-group">
						   <label>RO DELEGACIA:</label>
						   <input type="text" name="txtro" required class="form-control">
						</div>			
					</div>	
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
						   <label>Nome:</label>
						  <input type="text" name="txtnome" disabled class="form-control" value="<?= $info['nome']?>">
						</div>			
					</div>				
				</div>				
                <div class="row">
					<div class="col-md-4">
						<div class="form-group">
						   <label>RG Condutor:</label>
						  <input type="text" name="txtcondutor" required class="form-control">
						</div>			
					</div>	
                    <div class="col-md-4">
						<div class="form-group">
						   <label>RG ou Funcional Testemunha:</label>
						  <input type="text" name="txtrgtestmunha" required class="form-control">
						</div>			
					</div>				
				</div>                
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="data">Data Entrada DP:</label>
							<input type="date" name="data" id="data" required class="form-control"><br>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="hora">Hora Entrada DP:</label>
							<input type="time" name="hora" id="hora" required class="form-control"><br>
						</div>
					</div>
				</div>			
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="data">Data Saida Delegacia:</label>
						<input type="date" name="datad" required class="form-control"><br>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="hora">Hora Saida Delegacia:</label>
							<input type="time" name="horad" required class="form-control"><br>
						</div>
					</div>
				</div>								
			      <div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="situacao">Crime:</label>
								<select name="delito" id="delito" required class="form-control">
										<option value="1">Apreensão de Drogas</option>
										<option value="2">Cumprimento de mandado de prisão</option>
										<option value="14">Pessoa Desaparecida</option>
										<option value="2">Ameaça</option>
										<option value="3">Estelionato</option>
										<optgroup label="Furto">
										<option value="4">Furto Celular</option>
										<option value="5">Furto Transeunte</option>
										<option value="5">Coletivo</option>
										<optgroup label="Lesão">
										<option value="6">Corporal Dolosa</option>
										<option value="7">Corporal Culposa Trânsito</option>											
										<option value="8">Porte Ilegal de armas</option>		
										<option value="9">Tentativa de homicídio</option>		
										<option value="10">Posse e Uso de Drogas</option>	
										<option value="11">Receptação</option>	
										<optgroup label="Veiculo">										
										<option value="12">Veiculo Roubado</option>
										<option value="15">Veiculo Furtado</option>
										<option value="16">Recuperação de Veiculo</option>
										<optgroup label="Outros">	
										<option value="17">Outros</option>
	
								</select>
							</div>
						</div>
						<div class="col-md-4">
						   <label>Condição RO:</label>
							<select name="status" id="status" required class="form-control">
									<option>Selecione....</option>
									<option value="6">Preso</option>
									<option value="7">Liberado</option>
							</select>
						</div>			
					</div>			
					 <div class="row">
						<div class="col-md-8">
						  <div class="form-group">
							<label for="txtdinaminca">Dinâmica dos Fatos:</label>
							<textarea class="form-control" required  name="txtdinamica" id="txtdinamica" rows="4"></textarea>
							 </div>
						</div> 
					</div>	
					<?php 
					if(!empty($anexo) && isset($info['id']) &&  !in_array($info['id'], $anexo)){?>
					<div class="row">
						<div class="col-md-8">
						  <div class="form-group">
					      <label for="txtdinaminca">Anexo</label>
							<table class="table">
						  <thead>
							<tr>
							  <th scope="col">Nome</th>
							  <th scope="col"></th>
							</tr>
						  </thead>
						  <tbody>
						   <?php foreach ($anexo as $provider) : ?>
							<tr>
							  <td><?= $provider['nome'];?></td>
							  <td>
							  <div class="btn-group">
							   <a href="<?= BASE_URL.$provider['caminho']?>" class="btn btn-success" target="_blank">Abrir</a>
								</div>
							  </td>
							</tr>
							 <?php endforeach;?>
						  </tbody>
						</table>

						  </div>
						</div> 
					</div>	
					<?php }?>
					</br>
					<div class="box-tools">
						<input type="submit" value="Encerrar" class="btn btn-danger">
					</div>
			</div>
		</div>					
    </form>

</section>

<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>

