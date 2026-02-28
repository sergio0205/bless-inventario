<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Client;

class OrderController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'client_id' => 'required|exists:clients,id',
        'items' => 'required|array|min:1',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.size' => 'required|in:S,M,L',
        'items.*.quantity' => 'required|integer|min:1',
    ]);

    try {

        DB::transaction(function () use ($data) {

            $order = Order::create([
                'client_id' => $data['client_id'],
                'total' => 0,
            ]);

            $total = 0;

            foreach ($data['items'] as $item) {

                $product = Product::lockForUpdate()->find($item['product_id']);

                $stockField = match ($item['size']) {
                    'S' => 'stock_s',
                    'M' => 'stock_m',
                    'L' => 'stock_l',
                };

                if ($product->$stockField < $item['quantity']) {
                    throw new \Exception(
                        "Stock insuficiente para {$product->name} talla {$item['size']}"
                    );
                }

                $product->$stockField -= $item['quantity'];
                $product->save();

                $unitPrice = $product->price;
                $subtotal = $unitPrice * $item['quantity'];
                $total += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'size' => $item['size'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $unitPrice,
                    'subtotal' => $subtotal,
                ]);
            }

            $order->update(['total' => $total]);
        });

        return redirect('/orders/create')
            ->with('success', 'Pedido creado correctamente');

    } catch (\Exception $e) {

        return redirect()
            ->back()
            ->withInput()
            ->withErrors([
                'stock' => $e->getMessage()
            ]);
    }
}

    public function create()
    {
    $clients = Client::all();
    $products = Product::all();

    return view('orders.create', compact('clients', 'products'));
    }

    public function edit(Order $order)
    {
    $clients = Client::all();
    return view('orders.edit', compact('order', 'clients'));
    }

    public function update(Request $request, Order $order)
{
    $request->validate([
        'client_id' => 'required|exists:clients,id',
    ]);

    $order->update([
        'client_id' => $request->client_id
    ]);

    return redirect('/reports/sales/view')
        ->with('success', 'Pedido actualizado correctamente');
    }

    public function destroy(Order $order)
{
    DB::transaction(function () use ($order) {

        foreach ($order->items as $item) {
            $product = Product::lockForUpdate()->find($item->product_id);

            $stockField = match ($item->size) {
                'S' => 'stock_s',
                'M' => 'stock_m',
                'L' => 'stock_l',
            };

            // DEVOLVER STOCK
            $product->$stockField += $item->quantity;
            $product->save();
        }

        // ELIMINAR PEDIDO
        $order->delete();
    });

    return redirect('/reports/sales/view')
        ->with('success', 'Pedido eliminado y stock devuelto');
    }
}