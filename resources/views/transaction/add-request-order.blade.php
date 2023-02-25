@extends('layouts.master')

@section('content')


  <div class="container mt-5">
    <div class="card mx-auto" style="width:400px">
    <div class="card-body">

      
      
      <form method="POST" action="{{ route('create.nota',['id_nota'=>$id_nota]) }}">
          @csrf
     
          <label for="">ID Nota</label>
          @error('id_order')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="text" class="form-control" name="id_order" value="{{$id_nota}}" readonly>


          <label for="">pembeli</label>
          @error('buyer')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="text" class="form-control" name="buyer" value="">


          
          
                    
                    
          
      
      
          <button type="submit" class="btn btn-primary mt-5" style="width:100%;">add</button>
      
    </form>
    
    </div>
    </div>
  </div>
@endsection