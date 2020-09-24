<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePortfolio;
use App\Http\Requests\UpdatePortfolio;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::paginate(20);
        return view('portfolio.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.save');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolio $request)
    {
        $portfolio = Portfolio::query()->create($request->all());
        if($portfolio){
            $image = $request->image;
            $imageName = $portfolio->id. '.png';
            //original image make
            $imageImagick = Image::make($image);
            $imageImagick->encode('png');
            Storage::put("images/portfolio/original/$imageName", $imageImagick->__toString());

            //small image make
            $imageImagick = Image::make($image);
            $imageImagick->fit(80,80)->encode('png');
            Storage::put("images/portfolio/small/$imageName", $imageImagick->__toString());


        }
        return redirect()->route('portfolios.index')->with('success', 'Portfolio created succesfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('portfolio.show',compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('portfolio.edit',compact('portfolio'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolio $request, Portfolio $portfolio)
    {

        $portfolio->update($request->except(['_method','_token','_image']));
        $image = $request->image;
        if($image){
            Storage::delete('images/portfolio/original/'.$portfolio->id.'.png');
            Storage::delete('images/portfolio/small/'.$portfolio->id.'.png');

            $imageName = $portfolio->id. '.png';
            //original image make
            $imageImagick = Image::make($image);
            $imageImagick->encode('png');
            Storage::put("images/portfolio/original/$imageName", $imageImagick->__toString());

            //small image make
            $imageImagick = Image::make($image);
            $imageImagick->fit(80,80)->encode('png');
            Storage::put("images/portfolio/small/$imageName", $imageImagick->__toString());
        }

        return redirect()->route('portfolios.index')->with('success', 'Portfolio updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        if($portfolio->delete()){
            Storage::delete('images/portfolio/original/'.$portfolio->id.'.png');
            Storage::delete('images/portfolio/small/'.$portfolio->id.'.png');

            return response()->json([
                'success' => true,
            ]);
        }
    }
}
