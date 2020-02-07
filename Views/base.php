

<!-- Conteudo da Pagina -->
<section class="content-header">
    
</section>

<!-- Main content -->
<section class="content container-fluid">

    <div class="box">
        <div class="box-header">
            <div class="box-title">Listagem de Base</div>
            <div class="box-tools">
                <a href="<?= BASE_URL ?>base/add" class="btn btn-success">
                    Novo
                </a>
            </div>
        </div>

        <div class="box-body">
            <table id="example" class="display"  class="table table-hover" border="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>AÇÕES</th>
                     </tr>
                </thead>
                <?php foreach ($list as $provider) : ?>
                  <tr>
                      <td><?= $provider['id'];?></td>
                      <td><?= $provider['base'];?></td>
                      <td>
                          <div class="btn-group">
                              <a href="<?= BASE_URL.'base/edit/'.$provider['id']?>" class="btn btn-primary">Editar</a>
                              <a href="<?= BASE_URL.'base/delete/'.$provider['id']?>" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja Excluir')"> Excluir </a>
                          </div>
                      </td>
                  </tr>
                <?php endforeach;?>
            </table>
        </div>

    </div>

</section>
<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#example').DataTable({
                "bJQueryUI": true,
				
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            });
} );
</script>