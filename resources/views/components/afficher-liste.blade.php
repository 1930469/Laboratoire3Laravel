<div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
    <div class="product-thumbnail">
        <div class="product-img-head">
            <div class="product-img">
                <img src="{{asset($image)}}" alt="" class="img-fluid"></div>
        </div>

        <div class="product-content">
            <div class="product-content-head">
                <h3 class="product-title">{{$nom}}</h3>
                <div class="product-price">{{$quantite}}</div>
            </div>
            <div class="product-btn">
                <a href="{{route('modification',$id)}}" class="btn btn-primary">Modifier</a>
                <a href="{{route('detail',$id)}}" class="btn btn-outline-light">Détails</a>
            </div>
        </div>
    </div>
</div>
