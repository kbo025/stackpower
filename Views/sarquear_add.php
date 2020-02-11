

<style type="text/css">
  h11 {
    color:red;
}

#logo {
        width:50%;
        height:50%;
}

.panel-heading{
    font-size:150%;
}


</style>

<!-- Main content -->
<section class="content container-fluid">
    <?php if(!empty($error)): ?>
    	<div class="callout callout-danger">
    		<p><?php echo $error; ?></p>
    	</div>
    <?php endif; ?>



<form class="form-horizontal" action="<?= BASE_URL ?>sarquear/add_action" METHOD="post" enctype="multipart/form-data">
<fieldset>
<div class="panel panel-primary">
    <div class="panel-heading">Abrir Sarc</div>
    
<div class="panel-body">
<div class="form-group">
<div class="container">
      <div class="row">
          <div class="col-md-2 control-label"></div>
          <div class="col-sm-3">
              <input type="file" name="image" class="dropify-pt" data-height="300" data-default-file="<?= BASE_URL ?>/imagens/default-avatar-male.png" />
          </div>
      </div>
  </div>
   
<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
</div>
</div>


<div class="form-group">
<label class="col-md-2 control-label" for="selectbasic">Base <h11>*</h11></label>
  
  <div class="col-md-3">
    <select required id="base" name="base" class="form-control">
    <option value=""></option>
	<?php foreach ($base_list as $base) : ?>
	<option value="<?= $base['id']?>"><?= $base['base']?></option>
	<?php endforeach;?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">RG Policia Militar<h11>*</h11></label>  
  <div class="col-md-2">
  <input id="rg" name="txtrgpm" placeholder="" class="form-control input-md" required="" type="text">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="telefone">Telefone <h11>*</h11></label>
  <div class="col-md-2">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
      <input id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
      OnKeyPress="formatar('## #####-####', this)">
    </div>
  </div>
 </div>

 <div class="form-group">
  <label class="col-md-2 control-label" for="bairroocorrencia">Bairro Ocorrência <h11>*</h11></label>
  <div class="col-md-3">
    <select name="bairroocorrencia" id="bairroocorrencia" class="form-control">
      <option value=""></option>
      <?php foreach ($bairros_list as $bairro) : ?>
        <option value="<?= $bairro['cod_bairro']?>"><?= $bairro['nome']?></option>
      <?php endforeach;?>      
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="ruaocorrencia">Rua Ocorrência <h11>*</h11></label>
  <div class="col-md-3">
    <select name="ruaocorrencia" id="ruaocorrencia" class="form-control"></select>
  </div>
</div>

<!--
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Local Ocorrência <h11>*</h11></label>  
  <div class="col-md-8">
    <input id="Nome" name="localocorrencia" placeholder="" class="form-control input-md" required="" type="text">
  </div>
</div>
-->

<div class="form-group">
<label class="col-md-2 control-label" for="Filhos">Tipo<h11>*</h11></label>
<div class="col-md-3">
    <div class="input-group">
      <span class="input-group">     
        <label class="radio-inline" for="radios-0">
      <input type="radio" name="tpconsulta" id="1" value="1" onclick="habilita()" required>
      Pessoa
    </label> 
    <label class="radio-inline" for="radios-1">
      <input type="radio" name="tpconsulta" id="2" value="2" onclick="desabilita()">
      Veículo
    </div>
  </div>
</div>

<div class="form-group">
<label class="col-md-2 control-label" for="selectbasic">Motivação da abordagem <h11>*</h11></label>
  <div class="col-md-3">
    <select required id="motivo" name="motivo" class="form-control">
    <option value=""></option>
	<option value="1">Situaçao de rua</option>
	<option value="2">Exercíco de irregular de profissão(flanelinha)</option>
	<option value="3">Entorpecentes</option>
	<option value="4">Condução irregular de veículo</option>
	<option value="5">Local com alto índice criminal</option>
	<option value="6">Comportamento desordeio</option>
	<option value="7">Outros</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Placa ou Chassi <h11>*</h11></label>  
  <div class="col-md-3">
  <input id="placa" name="txtplaca" class="form-control" type="text" placeholder="Placa ou Chassi"  >
 </div>
</div>
<div id="newpost">
   <div class="form-group">
    <div class="col-md-2 control-label">
        <h4>Dados do Suspeito</h4>
    </div>
    </div>
    
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
  <div class="col-md-8">
  <input id="nome" name="txtnome" placeholder="" class="form-control input-md" required="" type="text">
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="vinculo">RG </label>  
  <div class="col-md-2">
  <input id="rgus" name="txtrg" placeholder="RG" class="form-control input-md"  type="text">
    
  </div>

  
  <label class="col-md-1 control-label" for="Nome">CPF</label>  
  <div class="col-md-2">
  <input id="cpf" name="txtcpf"  class="form-control input-md"  type="text" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
</div>
  <label class="col-md-1 control-label">Nascimento</label>
  <div class="col-md-2"> 
  <input id="datanascimento" name="txtdtnasc"  class="form-control input-md"  type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)">
  </div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label" for="vinculo">Pai</label>  
  <div class="col-md-8">
  <input id="pai" name="txtpai"  class="form-control input-md" type="text">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-2 control-label" for="mae">Mae</label>  
  <div class="col-md-8">
  <input id="mae" name="txtmae"  class="form-control input-md"  type="text">
    
  </div>
</div>

</div>

<div class="form-group">
  <label class="col-md-2 control-label" for="Observações">Observações </label>
  <div class="col-md-8">
      <textarea id="obs" name="txtobs" rows="4" class="form-control input-md" placeholder="Insira observações que possam auxiliar na consulta solicitada, tais como, tatuagens, apelidos, marcas características, marca, modelo, cor do veículo e outras que julgar cabíveis."></textarea>
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  </div>
</div>

</div>
</div>


</fieldset>
</form>


</section>

<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>
<script type="text/javascript">

var localizacaoUlr = "/sarquear/asyncruas";
var localizacao;

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i);
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
 

function exibe(i) {
	document.getElementById(i).readOnly= true;
}

function desabilita(){
     document.getElementById('nome').disabled = true;    
     document.getElementById('rgus').disabled = true;    
     document.getElementById('cpf').disabled = true;    
     document.getElementById('datanascimento').disabled = true;    
     document.getElementById('pai').disabled = true;    
     document.getElementById('mae').disabled = true;    
	 document.getElementById('placa').disabled = false; 
    }
function habilita() {
     document.getElementById('placa').disabled = true;
	 document.getElementById('nome').disabled = false;    
     document.getElementById('rgus').disabled = false;    
     document.getElementById('cpf').disabled = false;    
     document.getElementById('datanascimento').disabled = false;    
     document.getElementById('pai').disabled = false;    
     document.getElementById('mae').disabled = false;       
    }


function showhide()
 {
       var div = document.getElementById("newpost");
       
       if(idade()>=18){
 
    div.style.display = "none";
}
else if(idade()<18) {
    div.style.display = "inline";
}

 }

 
</script>

<script>
$(document).ready(function(){
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify-pt').dropify({
        messages: {
            default: 'Arraste e solte um arquivo aqui ou clique em',
            replace: 'Arraste e solte um arquivo ou clique para substituir',
            remove:  'remover',
            error:   'Desculpe, o arquivo é muito grande'
        }
    });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element){
        return confirm("Deseja realmente excluir \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element){
        alert('Arquivo excluído');
    });

    drEvent.on('dropify.errors', function(event, element){
        console.log('Tem erros');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })

    $('#bairroocorrencia').change(function(e) {
        let selecionado = $(this).val();
        $('#ruaocorrencia').html('');
        $.ajax({
          url: `${localizacaoUlr}?cod_bairro=${selecionado}`,
          type: 'get',
          dataType: 'json',
        })
      .done(jqXHR => {
          let localizacao = jqXHR;
          for (let i = 0; i < localizacao.length; i++) {
              $('#ruaocorrencia').append(`<option value="${ localizacao[i].cod_rua }">${ localizacao[i].nome }</option>`);
          }
      })
      .fail(jqXHR => {
          console.log('error');
      });
    });
});
  
</script>

