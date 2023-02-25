<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\RequestOrder;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function requestOrder()
    {
       

        return view('transaction.request-order');
    }

    public function getRequestOrderData(Request $request)
    {
    
            $requestOrder = RequestOrder::get();
            return DataTables::of($requestOrder)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $actionBtn = '<a href="edit/' . $row->id . '" class="edit btn btn-success btn-sm">Edit</a> <a href="destroy/' . $row->id . '" onclick="return confirm("apakah anda yakin untuk menghapus data ini?")" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $id_nota = Str::random(10);
        return view('transaction.add-request-order',['id_nota'=>$id_nota]);
    }

    public function createNota(Request $request,$id_nota)
    {

        $validatedData = $request->validate([
            'id_order' => 'required|string',
            'buyer' => 'required|string',
        ]);
        $requestOrder = new RequestOrder();
        $requestOrder->id_order = $validatedData['id_order'];
        $requestOrder->buyer = $validatedData['buyer'];
        $requestOrder->total_price = 0;
        $requestOrder->save();
        return redirect('/purchase/add/'.$id_nota);
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
