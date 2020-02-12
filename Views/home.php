<!-- Conteudo da Pagina -->
<section class="content-header">
<h1>
    <i class="fa fa-tachometer-alt"></i>
	Meu Dashboard 
</h1>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <!--<div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-laptop"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Consultas em Abertos</span>
                    <span class="info-box-number"><h2><?= $listaSarcAberto; ?></h2></span>
                </div>
            </div>
        </div>

        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fas fa-clipboard-list"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Consultas Finalizadas</span>
                    <span class="info-box-number"><h2><?= $listaSarcFechado; ?></h2></span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-car"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Consultas Placas</span>
                    <span class="info-box-number"><h2><?= $listaSarcCar;?></h2></span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fas fa-user"></i></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Consultas Pessoa</span>
                    <span class="info-box-number"><h2><?= $listaSarcUser;?></h2></span>
                </div>
            </div>
        </div>
    </div>-->
    <div class="row">
        <div class="col-xs-12 col-md-3">
            <canvas id="myChart" width="50" height="50"></canvas>
        </div>
    </div>
</section>
<script>
    $(function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {}
        });
    })
</script>