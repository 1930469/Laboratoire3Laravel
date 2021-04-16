@include("stylesheet");
    <div class="dashboard-main-wrapper">
        @include("navbar");
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <form action="{{route("modifier",$id)}}" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    @method("PUT")
                                    @component("components.afficher-formulaire")
                                            @slot("image")
                                                {{$image}}
                                            @endslot
                                            @slot("nom")
                                                {{$nom}}
                                            @endslot
                                            @slot("prix")
                                                {{$prix}}
                                            @endslot
                                            @slot("fournisseur")
                                                {{$fournisseur}}
                                            @endslot
                                            @slot("quantite")
                                                {{$quantite}}
                                            @endslot
                                            @slot("description")
                                                {{$description}}
                                            @endslot
                                    @endcomponent
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
