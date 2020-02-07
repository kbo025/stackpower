<?php
    $listUrl = BASE_URL . 'sarquear/asyncdata';
?>


<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        <i class="fa fa-laptop"></i> Monitoramento de Consultas
    </h1>
</section>

<!-- Main content -->
<section  class="content container-fluid"> 

    <div class="box">
        <div class="box-header">
            <div class="box-title">Listagem</div>
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
                        <option value="<?= $base['id']?>"><?= $base['base']?></option>
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
                        <th>BASE </th>
						<th class="hidden-xs">PLACA</th>
                        <th>INICIO</th>																								
                        <th class="hidden-xs">STATUS</th>
<<<<<<< HEAD
                        <th class="hidden-xs">OPERADOR</th>
=======
>>>>>>> dcb0adfe8ef904e9e19835700277d7d538bc6409
                        <th class="hidden-xs">OPÇOES</th>
                     </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>

    </div>

</section>
<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>

<script type="text/javascript">
var listurl = "<?= $listUrl ?>";
$(function () {
    $('.select2').select2()
    var table = $('table').DataTable({
        "bJQueryUI": true,
        "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": listurl,
            "type": "GET",
            // "dataSrc": function ( json ) {
            //     for (let i = 0; i < json.length; i++ ) {
            //         json[i][0] = '<a href="/message/'+json[i][0]+'>View message</a>';
            //     }
            //     return json;
            // }
        },
        "columns": [
            { "data": "id" },
            { "data": "nome" },
            { "data": "base" },
            { "data": "placa" },
            { "data": "dtinicial" },
            {
                "data": "status",
                "render": function ( data, type, row, meta ) {
                    let tag = '';
                    if (data == 1) { 
                        tag = '<span class="badge bg-red">PENDENTE</span>';
                    } else if (data == 2) {
                        tag = '<span class="badge bg-yellow">ANALISE</span>';
                    } else if (data == 3) {
                        tag = '<span class="badge bg-green">RESPONDIDO</span>';
                    } else if (data == 4) {
                        tag = '<span class="badge bg-red">CONDUZIR</span>';
                    } else if (data == 5) {
                        tag = '<span class="badge bg-red">FECHADO</span>';
                    } else if (data == 6) {
                        tag = '<span class="badge bg-red">PRESO</span>';
                    } else if (data == 7) {
                        tag = '<span class="badge bg-green">LIBERADO</span>';
                    }

                    return tag;
                }
            },
<<<<<<< HEAD
            { "data": "name" },
=======
>>>>>>> dcb0adfe8ef904e9e19835700277d7d538bc6409
            { "data": "opcoes" }
        ],
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

    /** busca na fonte de dados cada 30seg */
    setInterval( function () {
        table.ajax.reload(null, false);
    }, 30000);

    $('#select-base').change( function () {
        var choosedFilter = $('#select-base').val();
        var choosedString = choosedFilter.join("|");
        listurl = "<?= $listUrl ?>";
        if (choosedString.length > 0) {
            listurl = listurl + '?filter=' +  choosedString;
        }
        table.ajax.url(listurl).load();
        //table.fnFilter(choosedString, 2, true, false);
    });
})

</script>

<script type="text/javascript">


// //chamada a função
// getNotifications();

// function getNotifications( entry )
// {   
//     // cria array de dados
//     var data = {};
//     // verifica se existe um tempo definido
//     if(typeof entry != 'undefined'){
//         // atribui o tempo definido ao objeto
//         data.entry = entry;
//     }

//     // envia os dados para o script de polling
//     $.post('sarquear/consultan', data, function(result) {           
//         for(i in result.notify){
//             // passa os valores para a lista de notitficações
//             $('#entry').append(result.notify[i].title);
//         }
//         // reinicia a busca por dados
//         getNotifications(result.entry);
//     });
// }


</script>