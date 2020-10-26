<?php

namespace App\Http\Controllers;

use App\Models\Customer ;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


            $customers= User::join('customers','users.id','=','customers.user_id')->get();
        return view('customers.index',compact('customers'));

    }

    public function store(Request $request)
    {

        $user = new User();
        $user->first_name =$request->input('fname');
        $user->last_name = $request->input('lname');
        $user->email =$request->input('email');
        $user->password = Hash::make($request->input('fname'));
        if ($user->save()) {
         $user_id = $user->id;
         $customer = new Customer();
         $customer->user_id =$user_id;
         $customer->phone =$request->input('phone');
         $customer->gender =$request->input('gender');
         $customer->address =$request->input('address');
        }
        if ($customer->save()) {
         return redirect()->route('customer.index')->with(['success' => 'Customers added succesfully']);

     }else{
         return redirect()->route('customer.index')->with(['error' => 'Customers not saved ']);


      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function reports()
    {

        $customer_reports = User::join('customers','users.id','=','customers.user_id')
        ->join('orders','customers.id','=','orders.customer_id')
        ->select([
            'first_name',
            'last_name',
            'email',
            DB::raw("SUM(orders.amount) as amount"),

        ])->groupBy('customers.id')
        ->get();
        return  view('reports.customers',compact('customer_reports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer,$id)
    {

        $customers =  $customers= User::with('customers')->where('users.id',$id)->get();

        return view('customers.edit',compact('customers'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $user = User::findOrFail($id);

        $user->update([
            'first_name'=>$request->input('fname'),
            'last_name'=>$request->input('lname'),
            'email '=>$request->input('email'),
        ]);
        $customer_id = Customer::where('user_id',$id)->pluck('id')->first();

        $customers = Customer::findOrFail($id);
        $customers->update([

            'phone'=>$request->input('phone'),
            'gender'=>$request->input('gender'),
            'address'=>$request->input('address'),

        ]);

  return redirect()->route('customers.index')->with(['success' => 'Customer updated succesfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer,$id)
    {

        $customers = User::findOrFail($id);
        if ( $customers->delete()) {
            return redirect()->route('customers.index')->with(['success' => 'Customer deleted succesfully']);

        }else{
            return redirect()->route('customers.index')->with(['error' => 'Customer not deleted ']);


         }    }
}
