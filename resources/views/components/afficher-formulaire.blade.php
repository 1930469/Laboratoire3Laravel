<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
    <div class="product-slider">
        <img class="img-fluid" src="{{asset($image ?? 'images/eco-slider-img-1.png')}}" alt="First slide">
        <input type="file" accept="image/x-png"  name="image" class="btn btn-primary btn-block btn-lg">
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
    <div class="product-details">
        <div class="border-bottom pb-3 mb-3">
            <h2 class="mb-3"><input name="nom" type="text" value="{{$nom ?? ""}}" placeholder="Nom"></h2>
            <h3 class="mb-0 text-primary">$<input name="prix" type="number" value="{{$prix ?? ""}}" placeholder="Prix"></h3>
        </div>
        <div class="product-size border-bottom">
            <h4>Fournisseur</h4>
            <input name="fournisseur" type="text" value="{{$fournisseur ?? ""}}" placeholder="Fournisseur">
            <div class="product-qty">
                <h4>Quantité</h4>
                <div class="quantity">
                    <input name="quantite" type="number" value="{{$quantite ?? "10"}}" placeholder="10">
                </div>
            </div>
        </div>
        <div class="product-description">
            <h4 class="mb-1">Description</h4>
            <textarea name="description" rows="4" cols="50" placeholder="Description">{{$description ?? ""}}</textarea>
            <button type="submit" class="btn btn-primary btn-block btn-lg">Sauvegarder</button>
        </div>
    </div>
</div>
