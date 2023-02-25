
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 <link href="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.css"/>

<div class="content-wrapper">
    <section class="content">
        <h1>ini adalah halaman stok mentah</h1>


        <table id="myTable">
            <thead>
                <tr>
                    <th>nama</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
                  <td>{{$data['nama']}}</td>
              </tr>
              @endforeach
               
            </tbody>
        </table>
       

    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    

    <script>
        // $(document).ready(function() {
        //     $('#stocks-table').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: "{{ route('stock.mentah',['category'=>'mentah']) }}",
        //         columns: [
        //             { data: 'stock_name', name: 'stock_name' },
        //             { data: 'stock_category', name: 'stock_category' },
        //         ]
        //     });
        // });

        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
        
    </section>
</div>

