@extends('layouts.master')

@section('content')


<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <h1>halaman request order</h1>
    
    
            <table id="request-order-table" class="table-view">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>id</th>
                        <th>pembeli</th>
                        <th>total</th>
                        <th>action</th>
                    </tr>
                </thead>

                
            </table>
            <a href="request_order/add" class="btn btn-primary">Add</a>
           
        </div>
  
   
    </section>
</div>

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    

    <script>
        $(document).ready( function () {
            $('#request-order-table').DataTable({
            serverSide: true,
            ajax: {
                url:"{{ route('requestOrder.data') }}",
                method:"GET"                
            },
            columns: [
                {
                    data: 'DT_RowIndex', 
                    name: 'DT_RowIndex', 
                    orderable: false, 
                    searchable: false 
                },
                { data: 'id_order', name: 'id_order' },
                { data: 'buyer', name: 'buyer' },
                { data: 'total_price', name: 'total_price' },
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