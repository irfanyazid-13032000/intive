@extends('layouts.master')

@section('content')


  <div class="container mt-5">
    <div class="card mx-auto" style="width:400px">
    <div class="card-body">

      
      
      <form method="POST" action="{{ route('stok.store') }}">
          @csrf
     
          <label for="">nama stok</label>
          @error('stock_name')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="text" class="form-control" name="stock_name" value="">


          <label for="">harga</label>
          @error('price')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="number" class="form-control" name="price" value="">


          <label for="">kuntitas</label>
          @error('qty')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="number" class="form-control" name="qty" value="">
          
                    
                    
          <label for="" style="display:block;">Category</label>
          <select name="stock_category"  class="form-control" style="width:100%">
          <option value="" selected>pilih</option>
         @foreach ($categories as $category)
         <option value="{{$category}}">{{$category}}</option>
             
         @endforeach
                    
          </select>
      
      
          <button type="submit" class="btn btn-primary mt-5" style="width:100%;">change</button>
      
    </form>
    
    </div>
    </div>
  </div>
@endsection