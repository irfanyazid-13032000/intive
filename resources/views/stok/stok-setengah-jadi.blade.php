@extends('layouts.master')

@section('content')
 

<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <h1>halaman stok setengah jadi</h1>
    
    
            <table id="stocks-table" class="table-view">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>nama stock</th>
                        <th>category</th>
                        <th>kuantitas</th>
                        <th>harga</th>
                        <th>action</th>
                    </tr>
                </thead>
                
            </table>

            <a href="create" class="btn btn-primary">Add</a>
           
        </div>
  
   
    </section>
</div>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    

    <script>
        $(document).ready( function () {
            $('#stocks-table').DataTable({
            serverSide: true,
            ajax: {
                url:"{{ route('stocks.data','setengah-jadi') }}",
                method:"GET"                
            },
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    orderable: false, 
                    searchable: false 
                },
                { data: 'stock_name', name: 'stock_name' },
                { data: 'stock_category', name: 'stock_category' },
                { data: 'qty', name: 'qty' },
                { data: 'price', name: 'price' },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false 
                }
            ]
        });
        } );
    </script>


@endsection