<style type="text/css">
/* Style the form */


/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<!-- Conteudo da Pagina -->
<section class="content-header">
    <h1>
        ABRIR-SARC <i class="fa fa-users"></i>
    </h1>

</section>

<!-- Main content -->
<section class="content container-fluid">
    <?php if(!empty($error)): ?>
    	<div class="callout callout-danger">
    		<p><?php echo $error; ?></p>
    	</div>
    <?php endif; ?>

    <form id="regForm" action="<?= BASE_URL ?>sarquear/add_action" METHOD="post">	
	    <div class="col-md-7">
          <div class="box box-primary">
            <div class="box-header">
              <div class="box-title">Solicitação de Antecedentes </div>
            </div>	
            <div class="box-body">						
			  <div class="row tab">
				<div class="col-md-8">
						<label for="base">BASE  *:</label>
						<select name="base" class="form-control">
							<?php foreach ($base_list as $base) : ?>
							<option value="<?= $base['id']?>"><?= $base['base']?></option>
							<?php endforeach;?>
						</select>
					</div>
					<div class="col-md-8">
							<label for="txtrgpm">RG (POLICIAL MILITAR) *:</label>
							<br>
							<small>Não utilize pontos, traços ou espaços. Somente Números!</small>
							<input type="text" name="txtrgpm" id="txtrgpm" class="form-control" oninput="this.className = ''" required placeholder="Sua Resposta">
				    </div>	
					<div class="col-md-8">
							<label for="telefone">Telefone de Contato *:</label>
							<br>
							<small>Não utilize pontos, traços ou espaços. Somente Números! Ex.: 21999999999</small>
							<input type="text" name="telefone" id="telefone" class="form-control" placeholder="Sua Resposta">
					</div> 
						
					<div class="col-md-8">
							<label for="localocorrencia">Local da Ocorrências *:</label>
							<br>
							<input type="text" name="localocorrencia" id="localocorrencia" class="form-control" placeholder="Sua Resposta">
					</div>  					
						<div class="col-md-5">
							<label for="tipoconsulta">Tipo da Consulta *:</label>
							<div class="form-group">
							  <div class="col-sm-4">
								<div class="form-check">
								<label for="1">Pessoa</label>
								  <input type="radio" name="tpconsulta" id="1" onclick="RemoverUltimo()" value="1">
								</div>
								<div class="form-check">
								 <label for="2">Veículo</label>
								  <input type="radio" name="tpconsulta"id="2" onclick="Remover()" value="2"> 
								</div>
								</div>
							</div>
						</div> 						
					</div>
					  <div id="demo" class="row tab">
							<div class="col-md-8">
								<div class="form-group">
									<div class="box-header">
									  <div class="box-title">FUNDA SUSPEITA</div>
									  <h5>Qual o motivo da fundada suspeita na abordagem?</h5>
									</div>							
									<label for="motivo">Motivo da Fundada Suspeita *</label>
									<select name="motivo" class="form-control">
										<option value="">Escolher</option>
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
					</div> 		
					  <div id="demo1" class="row tab">
					  	<div class="col-md-8">
							<div class="form-group">
									<div class="box-header">
									<div class="box-title">DADOS DO SUSPEITO</div>
									<h6>Preencha com atenção e com o maior número de detalhes possível, a fim de agilizar a consulta.</h6>
									</div>	
									<div class="box-header">									
									<label for="base">Nome Completo *</label>
									<input type="text" name="txtnome" id="txtnome" class="form-control" placeholder="Sua Resposta">
									</div> 	
									<div class="box-header">
									<label for="txtrg">RG ou Identidade *:</label>
									<br>
									<small>Não utilize pontos, traços ou espaços. Somente Números! Ex.: 12345678</small>
									<input type="text" name="txtrg" id="txtrg" class="form-control" placeholder="Sua Resposta">
									</div> 									
									<div class="box-header">
									<label for="txtcpf">CPF :</label>
									<br>
									<small>Não utilize pontos, traços ou espaços. Somente Números! Ex.: 12345678900</small>
									<input type="text" name="txtcpf" id="txtcpf" class="form-control" placeholder="Sua Resposta">
									</div>									
									<div class="box-header">
									<label for="txtdtnasc"> DATA DE NASCIMENTO :</label>
									<br>
									<small>Ex.: 01/01/1900</small>
									<input type="text" name="txtdtnasc" id="txtdtnasc" class="form-control" placeholder="Sua Resposta">
									</div> 						
									<div class="box-header">
									<label for="txtmae">MÃE :</label>
									<br>
									<input type="text" name="txtmae" id="txtmae" class="form-control" placeholder="Sua Resposta">
									</div> 							
									<div class="box-header">
									<label for="txtpai">PAI :</label>
									<br>
									<input type="text" name="txtpai" id="txtpai" class="form-control" placeholder="Sua Resposta">
									</div> 
							    </div>				
							</div>					
					</div>
					<div id="demo3" class="row tab">
					  	<div class="col-md-8">
							<div class="form-group">
									<div class="box-header">
									<div class="box-title">PLACA OU CHASSI *:</div>
									<h6>Não utilize pontos, traços ou espaços!</h6>
									<input type="text" name="txtplaca" id="txtplaca" class="form-control" placeholder="Sua Resposta">
									</div>	 
							    </div>				
							</div>					
					</div>
					<div class="row tab">
					  	<div class="col-md-8">
							<div class="form-group">
									<div class="box-header">
									<div class="box-title">Observações:</div>
									<h6>Insira observações que possam auxiliar na consulta solicitada, tais como, tatuagens, apelidos, marcas características, marca, modelo, cor do veículo e outras que julgar cabíveis.</h6>
									<textarea id="txtobs" name="txtobs" rows="5" cols="85" placeholder="Sua Resposta"></textarea>
									</div>	 
							    </div>				
							</div>					
					</div>
			<div style="overflow:auto;">
			  <div style="float:right;">
				<button type="button" id="prevBtn" onclick="nextPrev(-1)">Voltar</button>
				<button type="button" id="nextBtn" onclick="nextPrev(1)">Proximo</button>
			  </div>
			</div>

			<!-- Circles which indicates the steps of the form: -->
			<div style="text-align:center;margin-top:40px;">
			  <span class="step"></span>
			  <span id="demo" class="step"></span>
			  <span id="demo1" class="step"></span>
			  <span id="demo2" class="step"></span>
			  <span id="demo3" class="step"></span>
			</div>	
			</div>
			</div>	
		</div>
    </form>

</section>

<script type="text/javascript" src="<?= BASE_URL?>assets/js/jquery.mask.js"></script>
<script>
function Remover() {
  var myobj = document.getElementById("demo");
  myobj.remove();  
  var myobj = document.getElementById("demo1");
  myobj.remove();  
}
function RemoverUltimo() {
  var myobj = document.getElementById("demo3");
  myobj.remove();
}
</script>
<script type="text/javascript">
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Gravar";
  } else {
    document.getElementById("nextBtn").innerHTML = "Proximo";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
function validateForm() {
  // This function deals with validation of the form fields
  var x,
    y,
    i,
    valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
  
    // If a field is empty...
    if (y[i].required && y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}


function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}


</script>
