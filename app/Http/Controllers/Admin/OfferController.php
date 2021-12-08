<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use App\Http\Requests\OfferUpdateRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Offer.index',[
            'offers' => Offer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        
        Offer::query()->create([
            'code' => $request->get('code'),
            'valOff' => $request->get('valOff'),
            'starts_at' => $request->get('starts_at'),
            'expires_at' => $request->get('expires_at'),
        ]);


        return redirect(route('offer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
         return view('admin.Offer.edit',[
            'offer' => $offer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(OfferUpdateRequest $request, Offer $offer)
    {

        $isHasCode=Offer::query()->where('code',$request->get('code'))
        ->where('id','!=',$offer->id)
        ->exists();

        if ($isHasCode) {
            return back()->withErrors(['code' => 'code must be unique']);
        }


        $offer->update([
            'code' => $request->get('code'),
            'starts_at' => $request->get('starts_at'),
            'expires_at' => $request->get('expires_at'),

        ]);

        return redirect(route('offer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
