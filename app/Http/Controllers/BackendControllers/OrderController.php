<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_Details;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function recent_order()
    {
        $to_date = date('Y-m-d 23:59:59');
        $from_date = date('Y-m-d 00:00:00', strtotime('-7 days'));
        $orders = Order::whereBetween('created_at', [$from_date, $to_date])->paginate(10);
        return view('Backend.Pages.Orders.Recent', compact('orders'));
    }

    public function search(Request $request)
    {
        if ($request->search != '') {
            $orders = Order::with('user')->where('id', 'LIKE', '%' . $request->search . '%')->paginate(20);
        } else {
            $orders = Order::with('user')->paginate(20);
        }
        return view('Backend.Pages.Orders.All_Order', compact('orders'));
    }

    public function order_pdf()
    {

        $data['orders'] = Order::with('user')->paginate(20);

        // Load the view into a variable as HTML string
        $html = view('Backend.Pages.Orders.All_Orders_Pdf', $data)->render();

        // Instantiate Dompdf with the proper use statement
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (download)
        $dompdf->stream('order_details.pdf');

        // Output the generated PDF to Browser (view)
        // $dompdf->stream('All_Orders_Report.pdf', ["Attachment" => false]);
    }

    public function last_month()
    {
        $to_date = date('Y-m-d 23:59:59');
        $from_date = date('Y-m-1 00:00:00');
        $orders = Order::whereBetween('created_at', [$from_date, $to_date])->paginate(10);
        return view('Backend.Pages.Orders.Last_Month', compact('orders'));
    }

    public function all_orders()
    {
        $orders = Order::with('user')->paginate(20);
        return view('Backend.Pages.Orders.All_Order', compact('orders'));
    }

    public function order_delete($order_id)
    {
        // dd($order_id);
        $order = Order::find($order_id);
        if ($order) {
            $order->delete();
        }
        notify()->success('Order Delete Successfully!');
        return redirect()->back();
    }

    public function order_comfirm($order_id)
    {
        $order_id = Order::find($order_id);
        if ($order_id->order_status == 0) {
            $order_id->update([
                'order_status' => '1',
            ]);
        } elseif ($order_id->order_status == 1) {
            $order_id->update([
                'order_status' => '2',
            ]);
        } else {
            $order_id->update([
                'order_status' => '0',
            ]);
        }

        return redirect()->back();
    }

    public function order_details($order_id)
    {
        $order = Order::find($order_id);
        $order_details = Order_Details::with('product')->where('order_id', $order_id)->get();
        return view('Backend.Pages.Orders.Order_details', compact('order', 'order_details'));
    }

    public function order_cancel($order_id)
    {
        $order_id = Order::find($order_id);
        $order_id->update([
            'delivery_status' => 'cancel',
        ]);
        return redirect()->route('Order');
    }
}
