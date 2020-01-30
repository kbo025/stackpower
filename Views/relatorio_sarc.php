	<style type="text/css">
	*{
		word-wrap: break-word;
		font-family: Trebuchet MS, sans-serif;
	},
	 td{
		color:#000;
		padding: 15px;
		font-size : 10px;
		text-align : center;
	},
	th{
		background-color: #DDD;
		color:#000;
		padding: 8px;
		font-size : 10px;
	
	},
	h1{
		text-align: center;
	}

</style>
<h1>Relatório de Sarque</h1>
<br>
<table id="example" class="display"  class="table table-hover" border="0" width="100%">
	<thead>
		<tr>
			<th>BASE</th>
			<th>NOME</th>
			<th>SITUÇÃO</th>
			<th>OPERADOR</th>
			<th>DATA</th>																								
			<th>TEMPO ATENDIMENTO</th>
		 </tr>
	</thead>
	<?php foreach ($list as $provider) : ?>
	  <tr>
		  <td ><?= $provider['base'];?></td>
		  <td ><?= $provider['nome'];?></td>
		  <td ><?= $provider['situacaonova'];?></td>
		  <td ><?= $provider['name'];?></td>
		  <td ><?= date('d/m/Y', strtotime($provider['dtinicial'])); ?></td>
		  <td ><?= $provider['diferenca']; ?></td>
	  </tr>
	<?php endforeach;?>
</table>