<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service ;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {

        $services= Service::all();

        return view('services.index',compact('services'));
    }


    public function store(Request $request)
    {

       $service =new Service();
       $service->service_name = $request->input('service');
       if ( $service->save()) {
        return redirect()->route('service.index')->with(['success' => 'Service added succesfully']);

    }else{
        return redirect()->route('service.index')->with(['error' => 'Service not saved ']);


     }
    }


    public function show(Service $service)
    {
        //
    }


    public function edit(Service $service,$id)
    {
        $services = Service::where('id',$id)->get();
        return view('services.edit',compact('services'));
    }


    public function update(Request $request,$id)
    {

        $service = Service::findOrFail($id);

        $service->update([
            'service_name'=>$request->input('service')
        ]);

            return redirect()->route('service.index')->with(['success' => 'Service updated succesfully']);

    }


    public function destroy(Request $request,$id)
    {

        $service = Service::findOrFail($id);
        if ( $service->delete()) {
            return redirect()->route('service.index')->with(['success' => 'Service deleted succesfully']);

        }else{
            return redirect()->route('service.index')->with(['error' => 'Service not deleted ']);


         }

    }
}
