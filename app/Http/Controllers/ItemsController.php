<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items', compact('items'));
    }

    public function basket()
    {
        return view('basket');
    }

    public function addToCart($id)
    {
        $item = Item::find($id);
        if (!$item) {
            abort(404);
        }
        $basket = session()->get('basket');
        // if basket is empty then this the first item
        if (!$basket) {
            $basket = [
                $id => [
                    "name" => $item->name,
                    "item_qty" => 1,
                    "price" => $item->price,
                    "item_img" => $item->item_img
                ]
            ];
            session()->put('basket', $basket);
            return redirect()->back()->with('success', 'Item added to basket successfully!');
        }
        // if basket not empty then check if this item exist then increment item_qty
        if (isset($basket[$id])) {
            $basket[$id]['item_qty']++;
            session()->put('basket', $basket);
            return redirect()->back()->with('success', 'Item added to basket successfully!');
        }
        // if item not exist in basket then add to basket with item_qty = 1
        $basket[$id] = [
            "name" => $item->name,
            "item_qty" => 1,
            "price" => $item->price,
            "item_img" => $item->item_img
        ];
        session()->put('basket', $basket);
        return redirect()->back()->with('success', 'Item added to basket successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->item_qty) {
            $basket = session()->get('basket');
            $basket[$request->id]["item_qty"] = $request->item_qty;
            session()->put('basket', $basket);
            session()->flash('success', 'Your Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $basket = session()->get('basket');
            if (isset($basket[$request->id])) {
                unset($basket[$request->id]);
                session()->put('basket', $basket);
            }
            session()->flash('success', 'Item removed successfully');
        }
    }
}