<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_Details;
use App\Models\Product;
use Dompdf\Dompdf;

class OrderController extends Controller
{

    public function cart()
    {
        // dd('Hello Cart');
        $category = Category::all();
        return view('Frontend.Pages.Account.Cart', compact('category'));
    }

    public function product_buy($product_id)
    {
        // dd($product_id);
        $product_details = Product::find($product_id);
        // dd($product_details);
        return view('Frontend.Pages.Account.Order.Checkout', compact('product_details'));
    }

    public function add_to_cart($product_id)
    {
        $product = Product::find($product_id);
        $cart = session()->get('virtual_cart');
        if (!$cart) {
            $new_cart[$product_id] = [
                'id' => $product_id,
                'photo' => $product->photo,
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'subtotal' => 1 * $product->price,
            ];
            session()->put('virtual_cart', $new_cart);
            notify()->success('New product added cart.');
            return redirect()->back();
        } else {
            if (array_key_exists($product_id, $cart)) {
                $cart[$product_id]['quantity'] = $cart[$product_id]['quantity'] + 1;
                $cart[$product_id]['subtotal'] = $cart[$product_id]['price'] * $cart[$product_id]['quantity'];
                session()->put('virtual_cart', $cart);
                return redirect()->back();
            } else {
                $cart[$product_id] = [
                    'id' => $product_id,
                    'photo' => $product->photo,
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'subtotal' => 1 * $product->price,
                ];
                session()->put('virtual_cart', $cart);
                notify()->success('New product added cart.');
                return redirect()->back();
            };
        };

        return view('Frontend.Pages.Account.Cart');
    }

    public function single_cart_remove($id)
    {
        // dd('Hello Cart Remove');
        $cart = session()->get('virtual_cart');
        unset($cart[$id]);
        session()->put('virtual_cart', $cart);

        return redirect()->back();
    }

    public function cart_remove()
    {
        session()->forget('virtual_cart');
        return redirect()->back();
    }

    public function quantity_decrease($product_id)
    {
        $product = Product::find($product_id);
        $cart = session()->get('virtual_cart');
        if (array_key_exists($product_id, $cart)) {
            $cart[$product_id]['quantity'] = $cart[$product_id]['quantity'] - 1;
            $cart[$product_id]['subtotal'] = $cart[$product_id]['price'] * $cart[$product_id]['quantity'];
        }
        session()->put('virtual_cart', $cart);
        return redirect()->back();
    }

    public function checkout()
    {
        // dd('Hello Checkout');
        $category = Category::all();
        return view('Frontend.Pages.Account.Order.Checkout', compact('category'));
    }

    public function order_details($order_id)
    {
        $order = Order::find($order_id);
        $order_details = Order_Details::with('product')->where('order_id', $order_id)->get();
        $category = Category::all();
        return view('Frontend.Pages.Account.Order.Order_Details', compact('order', 'order_details', 'category'));
    }

    public function cancel_product($product_id)
    {
        $order = Order::find($product_id);
        if ($order) {
            $order->update([
                'delivery_status' => 'cancelled'
            ]);
            return redirect()->back();
        }
    }

    public function user_pdf($order_id)
    {
        // Fetch order and order details data
        $order = Order::find($order_id);
        $order_details = Order_Details::with('product')->where('order_id', $order_id)->get();

        // Prepare data to pass to the view
        $data = [
            'order' => $order,
            'order_details' => $order_details,
        ];

        // Load the view into a variable as HTML string
        $html = view('Frontend.Pages.Account.Order.Order_Details_Download', $data)->render();

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
        // $dompdf->stream('order_details.pdf', ["Attachment" => false]);
    }
    public function user_print($order_id)
    {
        // Fetch order and order details data
        $order = Order::find($order_id);
        $order_details = Order_Details::with('product')->where('order_id', $order_id)->get();

        // Prepare data to pass to the view
        $data = [
            'order' => $order,
            'order_details' => $order_details,
        ];

        // Load the view into a variable as HTML string
        $html = view('Frontend.Pages.Account.Order.Order_Details_Download', $data)->render();

        // Instantiate Dompdf with the proper use statement
        $dompdf = new Dompdf();

        // Load HTML content into Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (download)
        // $dompdf->stream('order_details.pdf');

        // Output the generated PDF to Browser (view)
        $dompdf->stream('order_details.pdf', ["Attachment" => false]);
    }
}
