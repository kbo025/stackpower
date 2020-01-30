<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        Usúario - Editar<i class="fa fa-users"></i>
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <form action="<?= BASE_URL ?>usuario/edit_action/<?= $info['id']?>" METHOD="post">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Usuário - Editar</div>
                <div class="box-tools">
                    <input type="submit" value="Salvar" class="btn btn-primary">
                </div>
            </div>
            <br class="box-body">
            <label for="nome">Nome:</label>
            <input type="text" value="<?= $info['name'];?>" name="nome" class="form-control" required><br>
            <label for="email">Email:</label>
            <input type="text" value="<?= $info['email'];?>" name="email" class="form-control" required><br>
            <label for="senha">Senha:</label>
            <input type="text" name="senha" id="senha" class="form-control" required><br>
			<label for="tipo">Tipo Usuário</label>
            <select name="tipo" class="form-control">
                    <option value="1">Administrador</option>
                    <option value="2">Operador</option>
                    <option value="3">Usuário</option>
            </select><br>
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