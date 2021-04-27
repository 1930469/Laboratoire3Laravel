@include("stylesheet")
        <div class="dashboard-main-wrapper">
               @include("navbar")
            <div class="dashboard-wrapper" >
                <div class="dashboard-ecommerce">
                    <div class="container-fluid dashboard-content ">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12" >
                                <div class="row">
                                    @foreach($db as $produit)
                                        @component("components.afficher-liste")
                                            @slot("image")
                                                {{$produit["image"]}}
                                            @endslot
                                            @slot("nom")
                                                {{$produit["nom"]}}
                                            @endslot
                                            @slot("quantite")
                                                {{$produit["quantite"]}}
                                            @endslot
                                            @slot("id")
                                                {{$produit["id"]}}
                                            @endslot
                                        @endcomponent
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

