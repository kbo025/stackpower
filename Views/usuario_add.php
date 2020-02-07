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
    <form action="<?= BASE_URL ?>usuario/add_action" METHOD="post">
	 <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">Usuário - Adicionar</div>
            </div>	
            <div class="box-body">
			      <div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input type="text" name="nome" id="nome" class="form-control"><br>
						</div>
					</div>	
					</div>			      
					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="text" name="email" id="email" class="form-control"><br>
						</div>
					</div>	
					</div>			      
					<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label for="senha">Senha:</label>
							<input type="password" name="senha" id="senha" class="form-control"><br>
						</div>
					</div>	
					</div>			      
					<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="tipo">Tipo Usuário</label>
							<select name="tipo" class="form-control">
									<option value="1">Administrador</option>
									<option value="2">Operador</option>
									<option value="3">Usuário</option>
							</select><br>
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
<script type="text/javascript">
    $(document).ready(function () {
        $('input[name=cpf]').mask("000.000.000-00");
    })
</script>