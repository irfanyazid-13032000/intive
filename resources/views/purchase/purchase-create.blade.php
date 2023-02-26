@extends('layouts.master')

@section('content')


  <div class="container mt-5">
    <div class="card mx-auto" style="width:400px">
    <div class="card-body">

      
      
      <form method="POST" action="{{ route('purchase.create',['id_nota'=>$id_nota]) }}">
          @csrf
     
          <label for="">id nota</label>
          @error('id_nota')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="text" class="form-control" name="id_nota" value="{{$id_nota}}" readonly>
          
          
          <label for="" style="display:block;">Category</label>
          <select name="category" class="form-control" onchange="ubahInputanStockName(value)">
            <option value="">pilih</option>
            @foreach ($categories as $category)
            <option value="{{$category}}">{{$category}}</option>
            
            @endforeach
          </select>
          
          <div class="inputBaru" id="inputBaru"></div>

          


          <label for="">Kuantitas</label>
          @error('qty')
          <p style="color:red">{{$message}}</p>
          @enderror
          <input type="text" class="form-control" name="qty">

          <div class="inputHarga" id="inputHarga"></div>




      
          <button type="submit" class="btn btn-primary mt-5" style="width:100%;">change</button>
      
    </form>
    
    </div>
    </div>
  </div>

  <script>




function ubahInputanStockName(value) {
  // Cari elemen div yang akan diisi dengan inputan select baru
  const inputDiv = document.querySelector('#inputBaru');
  const inputHarga = document.querySelector('#inputHarga');

  inputDiv.innerHTML = '';
  inputHarga.innerHTML = '';

  // Buat request Ajax untuk mengambil data dropdown baru
  fetch(`{{url('/purchase/stock_name/data/')}}/`+value)
    .then(response => response.json())
    .then(data => {
      // Buat elemen select baru jika data berhasil diambil
      const selectElement = document.createElement('select');
      selectElement.name = 'stock_id';
      selectElement.classList.add('form-control');
      selectElement.setAttribute('onchange', 'pasangHarganya(value)');

      // Tambahkan setiap opsi dari data ke dalam elemen select baru
      data.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option.value;
        optionElement.textContent = option.text;
        selectElement.appendChild(optionElement);
      });

      // Tambahkan label untuk elemen inputan baru
      const labelElement = document.createElement('label');
      labelElement.textContent = 'Stock Name';
      inputDiv.appendChild(labelElement);

      // Tambahkan elemen select baru ke dalam elemen div
      inputDiv.appendChild(selectElement);
    })
    .catch(error => {
      console.log(error);
    });
}


function pasangHarganya(value)
{
  fetch(`{{url('/stok/show/')}}/`+value)
    .then(response => response.json())
    .then(data => {
      // create the input element
      const inputElement = document.createElement('input');
      inputElement.type = 'text';
      inputElement.name = 'price';
      inputElement.value = data.price;
      inputElement.setAttribute('readonly',true)
      inputElement.classList.add('form-control');

      // add a label for the input element
      const labelElement = document.createElement('label');
      labelElement.textContent = 'Price';
      labelElement.htmlFor = 'price';

      // append the input and label elements to the DOM
      const inputDiv = document.querySelector('#inputHarga');
      inputDiv.innerHTML = '';
      inputDiv.appendChild(labelElement);
      inputDiv.appendChild(inputElement);
    })
    .catch(error => {
      console.log(error);
    });
}







    
  </script>
@endsection