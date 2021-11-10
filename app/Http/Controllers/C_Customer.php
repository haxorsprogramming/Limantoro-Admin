<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Customer;

class C_Customer extends Controller
{
    public function customerPage()
    {
        $dataCustomer = M_Customer::all();
        $dr = ['dataCustomer' => $dataCustomer];
        return view('app.customer.customerPage', $dr);
    }
}
