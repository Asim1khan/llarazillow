<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Inertia\Inertia;
use PhpParser\Node\Expr\New_;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return inertia(
            'Listing/Index',
            [
                'Listings'=>Listing::all(),

            ]
            );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          return inertia('Listing/Create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            Listing::create($request->validate([

                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ])
        );
            return redirect()->route('Listing.index')->with('success','Data Create Successfull');
    }


    public function show(string $id)
    {
          return Inertia('Listing/show',[
            'Listing'=>Listing::find($id),
          ]);
    }


    public function edit(Listing  $Listing)
    {
        return Inertia('Listing/Edit',[
            'Listing'=>$Listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $Listing)
    {
        $Listing->update(
            $request->validate([
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required',
            'code' => 'required',
            'street' => 'required',
            'street_nr' => 'required|min:1|max:1000',
            'price' => 'required|integer|min:1|max:20000000',
        ])
    );
        return redirect()->route('Listing.index')->with('success','Data Uodate');    }


    public function destroy(Listing $Listing)
    {
        $Listing->delete();
        return redirect()->back()->with('success' ,"Data Delete Successfully");

    }
}
