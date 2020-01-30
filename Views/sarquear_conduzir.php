<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        Sarque <i class="fa fa-users"></i>
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <form action="<?= BASE_URL ?>sarquear/conduzir_aqui/<?= $info['id']?>" METHOD="post">
		<div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">Sarque - Conduzir</div>
            </div>	
            <div class="box-body">
				<div class="row">
						<div class="col-md-4">
						<div class="form-group">
						   <label>RO DELEGACIA:</label>
						   <input type="text" name="txtro" class="form-control">
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
						  <input type="text" name="txtcondutor" class="form-control">
						</div>			
					</div>	
                    <div class="col-md-4">
						<div class="form-group">
						   <label>RG ou Funcional Testemunha:</label>
						  <input type="text" name="txtrgtestmunha" class="form-control">
						</div>			
					</div>				
				</div>                
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="data">Data:</label>
							<input type="date" name="data" id="data" class="form-control"><br>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="hora">Hora:</label>
							<input type="time" name="hora" id="hora" class="form-control"><br>
						</div>
					</div>
				</div>				
				<br>				
			      <div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="situacao">Crime:</label>
								<select name="delito" id="delito" class="form-control">
										<option>Selecione....</option>
										<option value="1">Apreensão de drogas</option>
										<option value="2">Cumprimento de mandado de prisão</option>
										<option value="3">Estelionato</option>
										<option value="4">Furto de celular</option>
										<option value="5">Furto a transeunte</option>
										<option value="6">Lesão corporal dolosa</option>
										<option value="7">Lesão corporal culposa de trânsito</option>											
										<option value="8">Porte Ilegal de armas</option>		
										<option value="9">Tentativa de homicídio</option>		
										<option value="10">Posse e Uso de Drogas</option>		
										<option value="11">Receptação</option>		
										<option value="12">Roubo de veículo</option>		
										<option value="13">Veiculo Roubado</option>
										<option value="14">Posse e Uso de Drogas</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
						   <label>Condição RO:</label>
							<select name="status" id="status" class="form-control">
									<option>Selecione....</option>
									<option value="6">Preso</option>
									<option value="7">Liberado</option>
									
									
							</select>
						</div>			
					</div>			
					 <div class="row">
						<div class="col-md-12">
						  <div class="form-group">
							<label for="txtdinaminca">Dinâmica dos Fatos:</label>
							<textarea class="form-control"  name="txtdinamica" id="txtdinamica" rows="4"></textarea>
							 </div>
						</div> 
					</div>	
					<div class="box-tools">
						<input type="submit" value="Conduzir" class="btn btn-danger">
					</div>
			</div>
		</div>					
    </form>

</section>

<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>

