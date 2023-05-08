@extends('layouts.layout')

@section('title')
Admin - Accueil
@endsection

@section('content')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="file-container border-top">
            <div class="file-panel mt-4">
                <h1 class="h3 mb-3">Bienvenue!</h6>
                <p class="text-muted">Vous etes connecté en tant qu'Administrateur.</p>
                <input type="hidden" id="nombrearticle" name="nombrearticle" value="{{ $nbrarticle }}">
                <input type="hidden" id="nomcategorie" name="nomcategorie" value="{{ $ncategorie }}">
                @isset($success)
                    <div class="alert alert-success" role="alert">
                        <span class="fe fe-minus-circle fe-16 mr-2"></span> {{ $success }} 
                    </div>
                @endisset
                <div class="col-12 col-md-3">
                    <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title mb-0">Proportion d'article par catégorie</strong>
                    </div>
                    <div class="card-body text-center">
                        <div id="donutChart"></div>
                    </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-3">
                        <div class="card shadow text-center mb-4">
                            <a href="{{ route('admin_acceuil') }}">
                                <div class="card-body file">
                                    <div class="circle circle-lg bg-secondary my-4">
                                        <span class="fe fe-home fe-24 text-white"></span>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 fname">
                                    <strong><span class="dot dot-md mr-2"></span>Acceuil</strong>
                                </div>
                            </a>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="card shadow text-center mb-4">
                            <a href="{{ route('admin_categorie_form') }}">
                                <div class="card-body file">
                                    <div class="circle circle-lg bg-secondary my-4">
                                    <span class="fe fe-file-plus fe-24 text-white"></span>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 fname">
                                    <strong><span class="dot dot-md mr-2"></span>Ajout catégorie</strong>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow text-center mb-4">
                            <a href="{{ route('admin_categorie_list') }}">
                                <div class="card-body file">
                                    <div class="circle circle-lg bg-secondary my-4">
                                    <span class="fe fe-package fe-24 text-white"></span>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 fname">
                                    <strong><span class="dot dot-md mr-2"></span>Liste catégorie</strong>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow text-center mb-4">
                            <a href="{{ route('article_list') }}">
                                <div class="card-body file">
                                    <div class="circle circle-lg bg-secondary my-4">
                                    <span class="fe fe-map fe-24 text-white"></span>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 fname">
                                    <strong><span class="dot dot-md mr-2"></span>Liste article</strong>
                                </div>
                            </a>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="card shadow text-center mb-4">
                            <a href="{{ route('article_form') }}">
                                <div class="card-body file">
                                    <div class="circle circle-lg bg-secondary my-4">
                                    <span class="fe fe-save fe-24 text-white"></span>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 fname">
                                    <strong><span class="dot dot-md mr-2"></span>Ajout article</strong>
                                </div>
                            </a>
                        </div>
                    </div> 
                    <div class="col-md-3">
                        <div class="card shadow text-center mb-4">
                            <a href="{{ route('admin_deconnect') }}">
                                <div class="card-body file">
                                    <div class="circle circle-lg bg-secondary my-4">
                                    <span class="fe fe-log-out fe-24 text-white"></span>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent border-0 fname">
                                    <strong><span class="dot dot-md mr-2"></span>Se déconnecter</strong>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('assets/js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/gauge.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/apexcharts.custom.js') }}"></script>
<script type="text/javascript">
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script type="text/javascript">
    window.onload = function() {
        var nom = document.getElementById("nomcategorie").value;
        var nombre = document.getElementById("nombrearticle").value;
        var nbr=nombre.split(";");
        var nomcat=nom.split(";");
        var n=[];
        for(let i=0;i<nbr.length;i++){
            n.push(parseInt(nbr[i]));
        }
        var donutchart,donutChartOptions={
            series:n,
            chart:{type:"donut",height:305,zoom:{enabled:!1}},
            theme:{mode:colors.chartTheme},
            plotOptions:{pie:{donut:{size:"40%"},expandOnClick:!1}},
            labels:nomcat,
            legend:{
                position:"bottom",
                fontFamily:base.defaultFontFamily,
                fontWeight:400,
                labels:{colors:colors.mutedColor,useSeriesColors:!1},
                horizontalAlign:"left",
                fontFamily:base.defaultFontFamily,
                markers:{width:10,height:10,strokeWidth:0,strokeColor:"#fff",radius:6},
                itemMargin:{horizontal:10,vertical:2},
                onItemClick:{toggleDataSeries:!0},onItemHover:{highlightDataSeries:!0}
            },
            stroke:{colors:[colors.borderColor],width:1},fill:{opacity:1,colors:chartColors}
        },donutchartCtn=document.querySelector("#donutChart");
        donutchartCtn&&(donutchart=new ApexCharts(donutchartCtn,donutChartOptions)).render();    
    };
</script>
@endsection