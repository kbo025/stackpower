
<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        <i class="fa fa-laptop"></i> Monitorar
    </h1>
</section>

<!-- Main content -->
<section  class="content container-fluid"> 

    <div class="box">
        <div class="box-header">
            <div class="box-title">Sarque - Listagem</div>
            <div class="box-tools">
              <!--  <a href="<?= BASE_URL ?>sarquear/list" class="btn btn-success">
                    Adicionar
                </a>-->
            </div>
        </div>
        <div class="box-body">
            <div class="col-md-6">
              <div class="form-group">
                <label>Base</label>
                <select class="form-control select2" id="select-base" multiple="multiple" data-placeholder="Selecione a Base"
                        style="width:100%">
                        <?php foreach ($base_list as $base) : ?>
                        <option value="<?= $base['base']?>"><?= $base['base']?></option>
                        <?php endforeach;?>
                </select>
              </div>
           </div>
       </div>
       <div id="entry">
       </div>
        <div class="box-body">
            <table id="example" class="display"  class="table table-hover" border="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>BASE DE OPERAÇÃO</th>
						<th class="hidden-xs">PLACA/CHASSI</th>
                        <th>INICIO</th>																								
                        <th class="hidden-xs">STATUS</th>
						<?php 
						 if($_SESSION['StockPower']['tipo_usuario'] != 3){ ?>
                        <th class="text-center">AÇÕES</th>
						 <?php } else { ?>
						 <th></th>
						 <?php } ?>
						 
                     </tr>
                </thead>
                <?php foreach ($list as $provider) : ?>
                  <tr>
                      <td class="hidden-xs text-center"><?= $provider['id'];?></td>
                      <td ><?= $provider['nome'];?></td>
                      <td class="hidden-xs"><?= $provider['base'];?></td>
					  <td ><?= $provider['placa'];?></td>
					  <td class="hidden-xs"><?= date('d/m/Y H:i:s', strtotime($provider['dtinicial'])); ?></td>
					  <td><?php
					  if ($provider["status"] == 2) {
						 echo '<span class="badge bg-yellow">ANALISE</span>';
					 } elseif($provider["status"] == 1) {
					     echo '<span class="badge bg-red">PENDENTE</span>';
					 }elseif($provider["status"] == 4) {
					     echo '<span class="badge bg-red">CONDUZIR</span>';
						 }else{
							echo '<span class="badge bg-green">Respondido</span>'; 
						 }
					 ?> 
					  </td>
					 
					<?php if($_SESSION['StockPower']['tipo_usuario'] != 3) {?>
                      <td>
                          <div class="btn-group"> 
						  <?php if($provider['status'] == 1) {?>
					          <a href="<?= BASE_URL.'sarquear/atender/'.$provider['id']?>" class="btn btn-success">Atender</a>
						  <?php } else if ($provider['id_usuario'] == $_SESSION['StockPower']['id'] && $provider['status'] == 4){?>	  
					          <a href="<?= BASE_URL.'sarquear/conduzir/'.$provider['id']?>" class="btn btn-danger">Conduzir</a>
						  <?php } else if ($provider['id_usuario'] == $_SESSION['StockPower']['id']){ ?>	  
					          <a href="<?= BASE_URL.'sarquear/responder/'.$provider['id']?>" class="btn btn-primary">Responder</a>
						  <?php } ?>							  
                          </div>
                      </td>
					<?php }else{ ?>
					     <td>
                          <div class="btn-group">
                              <a href="<?= BASE_URL.'sarquear/view/'.$provider['id']?>" class="btn btn-success">Visualizar</a>
                          </div>
                      </td>
					<?php } ?>
                  </tr>
                <?php endforeach;?>
            </table>
        </div>

    </div>

</section>
<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>

<script type="text/javascript">
$(function () {
 $('.select2').select2()
  })
 var table = $('table').DataTable({
                     "bJQueryUI": true,
				    "order": [[ 0, "desc" ]],
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

 var dataTable = $('table').dataTable();
$('#select-base').change( function () {
    var choosedFilter = $('#select-base').val();
    var choosedString = choosedFilter.join("|");
    dataTable.fnFilter(choosedString,2,true,false);
});


</script>

<script type="text/javascript">


//chamada a função
getNotifications();

function getNotifications( entry )
{   
    // cria array de dados
    var data = {};
    // verifica se existe um tempo definido
    if(typeof entry != 'undefined'){
        // atribui o tempo definido ao objeto
        data.entry = entry;
    }

    // envia os dados para o script de polling
    $.post('sarquear/consultan', data, function(result) {           
        for(i in result.notify){
            // passa os valores para a lista de notitficações
            $('#entry').append(result.notify[i].title);
        }
        // reinicia a busca por dados
        getNotifications(result.entry);
    });
}


</script>