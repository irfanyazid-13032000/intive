@extends('layouts.master')

@section('content')


  <div class="container mt-5">
    <div class="card mx-auto" style="width:400px">
    <div class="card-body">

      
      
      <form method="POST" action="{{ route('stok.update', $stock->id) }}">
          @csrf
     
          <label for="">nama stok</label>
          @error('stock_name')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="text" class="form-control" name="stock_name" value="{{$stock->stock_name}}">


          <label for="">harga</label>
          @error('price')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="text" class="form-control" name="price" value="{{$stock->price}}">

          <label for="">kuantitas</label>
          @error('qty')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="text" class="form-control" name="qty" value="{{$stock->qty}}">
          
                    
                    
          <label for="" style="display:block;">Category</label>
          <select name="stock_category"  class="form-control" style="width:100%">

         @foreach ($categories as $category)
         @if($category === $stock->stock_category)
         <option selected value="{{$category}}">{{$category}}</option>
         @else
         <option value="{{$category}}">{{$category}}</option>
         @endif
             
         @endforeach
                    
          </select>
      
      
          <button type="submit" class="btn btn-primary mt-5" style="width:100%;">change</button>
      
    </form>
    
    </div>
    </div>
  </div>
@endsection