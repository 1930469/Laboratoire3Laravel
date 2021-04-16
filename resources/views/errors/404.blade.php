@include("stylesheet");
<div class="dashboard-main-wrapper">
    @include("navbar");
    @php header("HTTP/1.0 404 Not Found"); @endphp
    <div class="col-md-12 text-center">
        <h3>Oops! La page que tu recherches n'existe pas</h3> <br>
        <h2><a href="/"><span class="text-underline">Clique ici!</span> Pour retourner d'où tu viens</a></h2>
    </div>
</div>


