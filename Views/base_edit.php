<!-- Conteudo da Pagina -->
<section class="content-header">
    
</section>

<!-- Main content -->
<section class="content container-fluid">

    <form action="<?= BASE_URL ?>base/edit_action/<?= $info['id']?>" METHOD="post">
        <div class="box">
            <div class="box-header">
                <div class="box-title">Base - Editar</div>
                <div class="box-tools">
                    <input type="submit" value="Salvar" class="btn btn-primary">
                </div>
            </div>
            <br class="box-body">
            <label for="nome">Base:</label>
            <input type="text" value="<?= $info['base'];?>" name="nome" id="nome" class="form-control"><br>
        </div>
        </div>
    </form>

</section>

<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>