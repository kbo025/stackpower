<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        Sarque <i class="fa fa-users"></i>
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <form action="<?= BASE_URL.'sarquear/'?>"" METHOD="post">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Sarque - Visualizar</div>
                
            </div>
            <br class="box-body">
		   	<div class="form-group">
			<label for="prisao">Mandado de prisão</label>
			<textarea class="form-control" id="prisao" rows="4"><?= $info['prisao']?></textarea>
		   </div>
            <div class="form-group">
			<label for="passagem">Passagem</label>
			<textarea class="form-control" id="passagem" rows="4"><?= $info['passagem']?></textarea>
		   </div>
		   <div class="box-tools">                   
				   <input type="submit" value="Volta" class="btn btn-primary">
           </div>
        </div>
        </div>
    </form>

</section>