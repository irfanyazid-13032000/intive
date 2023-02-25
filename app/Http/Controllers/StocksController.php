<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexMentah(Request $request)
    {
        return view('stok.stok-mentah');
    }

    public function indexSetengahJadi(Request $request)
    {
        return view('stok.stok-setengah-jadi');
    }
    public function indexJadi(Request $request)
    {
        return view('stok.stok-jadi');
    }




    public function getStocks(Request $request, $category)
    {
    
            $stocks = Stock::where('stock_category',$category)->get();
            return DataTables::of($stocks)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) use ($category) {
                        $actionBtn = '<a href="edit/' . $row->id . '" class="edit btn btn-success btn-sm">Edit</a> <a href="destroy/' . $row->id . '" onclick="return confirm("apakah anda yakin untuk menghapus data ini?")" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['mentah','setengah-jadi','jadi'];
        return view('stok.stok-create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stock_name' => 'required|string|max:255',
            'stock_category' => 'required|in:mentah,setengah-jadi,jadi',
            'price' => 'required|integer',
            'qty' => 'required|integer',
        ]);

       
        Stock::create($validatedData);

        return redirect()->route('stok.mentah')->with('success', 'Stok berhasil ditambah.');
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
        $stock = Stock::where('id',$id)->get()->first();
        $categories = ['mentah','setengah-jadi','jadi'];


        return view('stok.stok-edit',['stock'=>$stock,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    
        $validatedData = $request->validate([
            'stock_name' => 'required|string|max:255',
            'price' => 'required|integer',
            'qty' => 'required|integer',
            'stock_category' => 'required|in:mentah,setengah-jadi,jadi',
        ]);

       
        $stock = Stock::find($id);
        $stock->update($validatedData);

        return redirect()->route('stok.mentah')->with('success', 'Stok berhasil diubah.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock = Stock::find($id);
        $stock->delete();

        return redirect()->route('stok.mentah')->with('success', 'Stok berhasil diubah.');
    }
}
