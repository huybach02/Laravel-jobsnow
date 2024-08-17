<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CompanyOrderController extends Controller
{
  public function index()
  {
    $orders = Order::where('company_id', auth()->user()->company->id)->latest()->get();

    return view('frontend.company-dashboard.order.index', compact('orders'));
  }

  public function show($id)
  {
    $order = Order::where('id', $id)->first();
    if ($order->company_id != auth()->user()->company->id) {
      return redirect()->route('company.orders.index');
    }
    return view('frontend.company-dashboard.order.show', compact('order'));
  }
}
