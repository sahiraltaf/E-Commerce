@if($products->count()>0)    
@foreach($products as $product)
<div class="col-md-6 col-lg-6 col-xl-4">
    <div class="rounded position-relative fruite-item">
        <div class="fruite-img">
            <img src="{{asset($product->image)}}" class="img-fluid w-100 rounded-top">
        </div>
        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$product->subcategory->name}}</div>
        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
            <h4>{{$product->title}}</h4>
            <p>{{$product->description}}</p>
            <div class="d-flex justify-content-between flex-lg-wrap">
                <p class="text-dark fs-5 fw-bold mb-0">{{$product->price}}</p>
                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="col-md-6 col-lg-6 col-xl-4" style="margin-left:230px;">
    <img src="{{asset('img/no-product.png')}}" alt="">
</div>
@endif