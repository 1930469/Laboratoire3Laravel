@include("stylesheet");
    <div class="dashboard-main-wrapper">
        @include("navbar");
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <form action="{{route("ajouter")}}" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    @method("POST")
                                    @component("components.afficher-formulaire")
                                @endcomponent
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
