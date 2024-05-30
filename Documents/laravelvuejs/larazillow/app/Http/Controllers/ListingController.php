<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Inertia\Inertia;
use PhpParser\Node\Expr\New_;
use App\Http\Middleware;
use Auth;
use Gate;
use phpDocumentor\Reflection\PseudoTypes\False_;

class ListingController extends Controller
{

        //  public function __construct()
        //  {
        //            Gate::authorize(Listing::class,'Listing');
        // }


    public function index(Request $request)
    {
                $filters=$request->only([
                    'priceFrom','priceTo','beds','baths','areaFrom','areaTo'
                ]);

                $query=Listing::OrderByDesc('created_at');
                if($filters["priceFrom"] ?? false){
                    $query->where('price', '>=',$filters['priceFrom']);
                }
                if($filters["priceTo"] ?? false)
                {
                    $query->where('price','<=',$filters['priceTo']);
                }
                if($filters["beds"] ?? false)
                {
                    $query->where('beds','=',$filters['beds']);
                }
                if($filters["baths"] ?? false)
                {
                    $query->where('baths','=',$filters["baths"]);
                }
                 if($filters["areaFrom"] ?? false)
                 {
                      $query->where("area",'>=',$filters["areaFrom"]);
                 }
                 if($filters["areaTo"] ?? false)
                 {
                      $query->where('area','<=',$filters["areaTo"]);
                 }


          return inertia(
            'Listing/Index',
            [
                'filters'=>$filters,
                'Listings'=>$query
                ->paginate(10)
                ->withQueryString()
            ]
            );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create',Listing::class);
          return inertia('Listing/Create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->user()->listings()->create(
        //     $request->validate([
        $request->user()->Listings()->create(
            $request->validate([
            // Listing::create($request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required',
                'code' => 'required',
                'street' => 'required',
                'street_nr' => 'required|min:1|max:1000',
                'price' => 'required|integer|min:1|max:20000000',
            ]));



            return redirect()->route('Listing.index')->with('success','Data Create Successfull');
    }


    public function show(Listing $Listing)
    {
            // if( Auth::user()->cannot('view',$Listing)){
            //     abort(403);
            // }
            Gate::authorize('view',$Listing);


          return Inertia('Listing/show',[
            'Listing'=>Listing::find($Listing),
          ]);
    }


    public function edit(Listing  $Listing)
    {
        Gate::authorize('update',$Listing);

        return Inertia('Listing/Edit',[
            'Listing'=>$Listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $Listing)
    {
        Gate::authorize('update',$Listing);

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
        Gate::authorize('forceDelete',$Listing);

        $Listing->delete();
        return redirect()->back()->with('success' ,"Data Delete Successfully");

    }
}
