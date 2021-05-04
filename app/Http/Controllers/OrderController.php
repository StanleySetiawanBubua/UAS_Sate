<?php

namespace App\Http\Controllers;
use App\Customer;

use App\Mail\OrderShipped;
use App\Order;
use App\order_detail;
use App\OrderDetail;
use App\payment;
use App\Shipping;
use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function manageOrder()
    {
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.customer_id')
            ->join('payments', 'orders.order_id', '=', 'payments.order_id')
            ->select('orders.*', 'customers.name','payments.payment_type','payments.payment_status')
            ->latest()->get();

        return view('BackEnd.Order.manage', compact('orders'));
    }

    public function viewOrder($order_id)
    {
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);

        $payment = payment::where('order_id', $order->order_id)->first();
        $order_details = OrderDetail::where('order_id', $order->order_id)->get();


        return view('BackEnd.Order.view_order', compact('order','customer','shipping','payment','order_details'));
    }
    public function viewInvoice($order_id)
    {
        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);

        $order_details = OrderDetail::where('order_id', $order->order_id)->get();

        return view('BackEnd.Order.view_order_invoice', compact('order','customer','shipping','order_details'));
    }

    public function downloadInvoice($order_id)
    {
        $pdf = app()->make ('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

        $order = Order::find($order_id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);

        $order_details = OrderDetail::where('order_id', $order->order_id)->get();
//dd($order_details);
        $pdf = PDF::loadView('BackEnd.Order.download_invoice', compact('order','customer','shipping','order_details'));

        return $pdf->stream('OrderInvoice.pdf');
    }

    public function complete($order_id)
    {
        $order = Order::find($order_id);
        $order->order_status = 'Delivered';
        $order->save();

       /* $payment = Payment::where('order_id',$order_id);
        $payment->payment_status = 'Success';
        $payment->save();*/

        // return back()->with('sms','Order Delivered..!');
        // Mail::to(auth()->user())->email)->send(new OrderShipped($order));
    }

    public function deleteOrder($order_id)
    {
        $order = Order::find($order_id);
        $order->delete();

        return back()->with('sms','Order Deleted Successfully..!');
    }
}
