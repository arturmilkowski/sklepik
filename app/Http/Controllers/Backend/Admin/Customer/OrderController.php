<?php

namespace App\Http\Controllers\Backend\Admin\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Customer\Customer;
use App\Models\Order\Status;

class OrderController extends Controller
{
    public function edit(Customer $customer): View
    {
        $statuses = Status::all();

        return view('backend.admin.customer.order.edit', [
            'customer' => $customer,
            'item' => $customer->order,
            'statuses' => $statuses,
        ]);
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $customer->order->update(['status_id' => $request->status_id]);

        return redirect(route('backend.admins.customers.show', $customer))->with('message', 'Zmieniono');
    }

    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->order->delete();

        return redirect(route('backend.admins.customers.show', $customer))->with('message', 'Usunięto');
    }
}
