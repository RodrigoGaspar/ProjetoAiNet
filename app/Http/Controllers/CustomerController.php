<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CustomerFormRequestFormRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;


class CustomerController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Customer::class);
    }

    
}
