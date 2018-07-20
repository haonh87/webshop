<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers =Customer::paginate(PAGINATE);
        return view('admin.customers.index')->with(compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = ($request->except('_token'));
        $customer = new Customer;
        $customer->name = $data['name'];
        $customer->address = $data['address'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->mobile = $data['mobile'];
        $customer->gender = $data['gender'];
        $customer->status = $data['status'];
        $customer->DOB = $data['DOB'];
        $customer->save();
        return redirect()->route('admin.customer.edit',$customer->id)->with('message', 'Create successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customers.edit')->with(compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $data = ($request->except(['_token', '_method']));
        $customer->name = $data['name'];
        $customer->address = $data['address'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->mobile = $data['mobile'];
        $customer->save();
        return redirect()->route('admin.customer.edit',$id)->with('message', 'Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('admin.customer.index')->with('message', 'Update successfully.');
    }
}
