<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();
        return view('settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settings = new Settings();
        $settings->paypal_secret =$request->input('client_secret');
        $settings->paypal_client_id =$request->input('client_id');
        $settings->user_id =Auth::user()->id;
        if ( $settings->save()) {
            return redirect()->route('settings.index')->with(['success' => 'Service added succesfully']);

        }else{
            return redirect()->route('settings.index')->with(['error' => 'Service not saved ']);


         }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings,$id)
    {

        $settings = Settings::where('id',$id)->get();
        return view('settings.edit',compact('settings'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $settings = Settings::findOrFail($id);

        $settings->update([
            'paypal_client_id'=>$request->input('client_id'),
            'paypal_secret'=>$request->input('client_secret'),
            'user_id'=>Auth::user()->id
        ]);

            return redirect()->route('settings.index')->with(['success' => 'Paypal settings updated succesfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings,$id)
    {
        $settings = Settings::findOrFail($id);
        if ( $settings->delete()) {
            return redirect()->route('settings.index')->with(['success' => 'Paypal settings deleted succesfully']);

        }else{
            return redirect()->route('settings.index')->with(['error' => 'Paypal settings not deleted ']);


         }
    }
}
