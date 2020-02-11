

<!-- Conteudo da Pagina -->

<section class="content-header">

    <h1>

        <i class="fa fa-book"></i> Consultar Finalizados

    </h1>

</section>



<!-- Main content -->

<section class="content container-fluid">



  



        <div class="box-body">

           <table id="example1" class="display" class="table table-hover" border="0" width="100%">

                <thead>

                    <tr>

                        <th class="hidden-xs text-center">ID</th>

                        <th>NOME</th>

                        <th>BASE DE OPERAÇÃO</th>

                        <th class="hidden-xs">INICIO</th>

                        <th class="hidden-xs">TERMINO</th>

                        <th class="hidden-xs">TEMPO</th>												

                        <th class="hidden-xs" >OPERADOR</th>												

                        <th>STATUS</th>

                

                     </tr>

                </thead>

                <?php foreach ($list as $provider) : ?>

				<tr>

                      <td class="hidden-xs text-center"><?= $provider['id'];?></td>

                      <td><?= $provider['nome'];?></td>

                      <td><?= $provider['base'];?></td>

					  <td class="hidden-xs"><?= date('d/m/Y H:i:s', strtotime($provider['dtinicial'])); ?></td>

					  <td class="hidden-xs"><?= date('d/m/Y H:i:s', strtotime($provider['dtfinal'])); ?></td>

					  <td class="hidden-xs"><?= $provider['diferenca'];?></td>

					  <td class="hidden-xs"><?= $provider['name'];?></td>					  

					  <td><?php

							

						switch ($provider["status"]) {

						case 1:

							echo '<span class="badge bg-red">PENDENTE</span>';

							break;

						case 2:

							echo '<span class="badge bg-yellow">ANALISE</span>';

							break;

						case 3:

							echo '<span class="badge bg-green">RESPONDIDO</span>'; 

							break;	

						case 4:

							echo '<span class="badge bg-red">CONDUZIR</span>';

							break;	

						case 5:

							echo '<span class="badge bg-red">FECHADO</span>';

							break;	

						case 6:

							echo '<span class="badge bg-red">PRESO</span>';

							break;		

						case 7:

							echo '<span class="badge bg-green">LIERADO</span>';

							break;		

							}					

						?> 

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

    var table = $('#example1').DataTable({

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

	

} );

</script>



