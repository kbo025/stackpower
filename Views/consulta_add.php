<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        Sarque <i class="fa fa-users"></i>
    </h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

    <form action="<?= BASE_URL ?>consulta/add_action" METHOD="post">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Sarque - Adicionar</div>
                <div class="box-tools">
                    <input type="submit" value="Salvar" class="btn btn-primary">
                </div>
            </div>
            <br class="box-body">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" required><br>
            <label for="rg">RG:</label>
            <input type="text" name="rg" id="rg" class="form-control" required><br>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required><br>
            <label for="dtnasc">Data Nascimento:</label>
            <input type="date" name="dtnasc" id="dtnasc" class="form-control" required><br>
			<label for="nomemae">Nome Mãe:</label>
            <input type="text" name="nomemae" id="nomemae" class="form-control" required><br>
			<label for="base">Base</label>
            <select name="base" class="form-control">
                <?php foreach ($base_list as $base) : ?>
                    <option value="<?= $base['base']?>"><?= $base['base']?></option>
                <?php endforeach;?>
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