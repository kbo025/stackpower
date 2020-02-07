<!-- Conteudo da Pagina -->
<section class="content-header">
<h1>
	Meu Dashboard <i class="fa fa-tachometer-alt"></i>
</h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

<div class="row">


      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-laptop"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Consultas em Abertos</span>
            <span class="info-box-number"><?= $listaSarcAberto; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

        <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fas fa-clipboard-list"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Consultas Finalizadas</span>
            	<span class="info-box-number"><?= $listaSarcFechado; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
        <!-- /.col -->

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fas fa-car"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Consultas Placas</span>
            <span class="info-box-number"><?= $listaSarcCar;?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div><br><div class="row">


      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fas fa-user"></i></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Consultas Pessoa</span>
            <span class="info-box-number"><?= $listaSarcUser;?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>


      <!-- /.col -->
    </div><br>


</section>