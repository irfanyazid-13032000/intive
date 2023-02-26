<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Order;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function addPurchase($id_nota)
    {
        $categories = ['mentah','setengah-jadi','jadi']; 
        return view('purchase.purchase-create',['id_nota'=>$id_nota,'categories'=>$categories]);
    }

    public function getStockNameData($category)
    {
            try {
                $stocks = Stock::where('stock_category', $category)->get()->map(function ($stock) {
                    return [
                        'value' => $stock->id,
                        'text' => $stock->stock_name,
                        'price'=>$stock->price
                    ];
                });
        
                return response()->json($stocks);
            } catch (QueryException $e) {
                return response()->json(['message' => 'Error retrieving stock data.'], 500);
            }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPurchase(Request $request,$id_nota)
    {

        $validatedData = $request->validate([
            'id_nota' => 'required|string|max:255',
            'stock_id' => 'required|integer',
            'qty' => 'required|integer',
        ]);



        $order = new Order();
        $order->request_order_id = $validatedData['id_nota'];
        $order->stock_id = $validatedData['stock_id'];
        $order->qty = $validatedData['qty'];
        $order->save();

        return redirect()->route('purchase.list',['id_nota',$id_nota])->with('success', 'barang berhasil ditambahkan.');
        
    }

    public function purchaseList()
    {
        return 'ini adalah purchase list';
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
