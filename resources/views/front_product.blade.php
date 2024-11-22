@if($product_four->count()>0)
@foreach($product_four as $product)
    <div class="col-md-6 col-lg-4 col-xl-3" >
        <div class="rounded position-relative fruite-item">
            <div class="fruite-img">
                <img src="{{asset($product->image)}}" style="height:200px;" class="img-fluid w-100 rounded-top" alt="">
            </div>
            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$product->subcategory->name}}</div>
            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                <h4>{{$product->name}}</h4>
                <p>{{$product->description}}</p>
                <div class="d-flex justify-content-between flex-lg-wrap">
                    <p class="text-dark fs-5 fw-bold mb-0">{{$product->price}}</p>
                    <a href="{{Auth::user() ? 'javascript:void(0)' : route('login')}}" class="btn border border-secondary rounded-pill px-3 text-primary add_to_cart" data-prod_id="{{$product->id}}"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
<h5>No Product Found</h5>
@endif