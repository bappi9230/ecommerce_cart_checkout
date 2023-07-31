@extends('frontend.master')
@section('content')

<div class="content pt-3">
    <div class="container-fluid">
        <div class="card-group">

          @foreach($products as $item)
          <div class="card mr-3">
                  <a href="#" title="Add To Cart" ><img class="card-img-top" style="width: 200px;height:200px" src="{{asset($item->product_thumbnail)}}"  alt="Card image cap">  </a>
            <div class="card-body">
              <h5 class="card-title">{{ $item->title }}</h5>
              <p class="card-text">{{ $item->description }}</p>
              <p class="card-text"><small class="text-muted">{{ $item->price }}</small></p>
              <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" id="{{ $item->id }}" onclick="productView(this.id)">Buy</button>
            </div>
          </div>
           @endforeach
        </div>
    </div>

</div>


@endsection
