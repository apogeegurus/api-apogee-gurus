<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(20);
        return view('service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.save');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreService $request)
    {
        if(!$request->status){
            $request->request->add(['status'=>0]);
        }
        Service::query()->create($request->all());
        return redirect()->route('services.index')->with('success', 'Service created succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(StoreService $request, Service $service)
    {
        if(!$request->status){
            $request->request->add(['status'=>0]);
        }
        Service::query()->update($request->except(['_method','_token']));
        return back()->with('success', 'Service updated succesfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
          if($service->delete()){
              return response()->json([
                  'success' => true,
              ]);
          };
    }

    public function changeStatus(Request $request){
        $service = Service::find($request->id);
        $service->update([
            'status' => $request->val,
        ]);
        return response()->json([
            'success' => true,
        ]);
    }
}
