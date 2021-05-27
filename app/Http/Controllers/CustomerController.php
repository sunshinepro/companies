<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->company_id) && $request->company_id !== 0)
            $customers = Customer::where('company_id', $request->company_id)->orderBy('name')->get();
        else
            $customers = Customer::orderBy('surname')->get();


        return view('customers.index', [
            'customers' => $customers,
            'companies' => Company::orderBy('name')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create', ['companies' => Company::orderBy('name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:32',
            'surname' => 'required|max:32',
            'phone' => 'required|max:24',
            'email' => 'required|max:64'
            
        ]);

        $customer = new Customer();
        $customer->fill($request->all());

        return ($customer->save() !== 1) ?
            redirect()->route('customers.index')->with('status_success', "Customer added!") :
            redirect()->route('customers.index')->with('status_error', "Customer was not added!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer' => $customer, 'companies' => Company::orderBy('name')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request, [
            'name' => 'required|max:32',
            'surname' => 'required|max:32',
            'phone' => 'required|max:24',
            'email' => 'required|max:64'
        ]);

        $customer->fill($request->all());

        return ($customer->save() !== 1) ?
            redirect()->route('customers.index')->with('status_success', "Customer updated!") :
            redirect()->route('customers.index')->with('status_error', "Customer was not updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('status_success', 'Customer deleted!');
    }
}
