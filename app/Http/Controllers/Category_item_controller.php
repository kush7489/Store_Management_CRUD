<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category_item;
use Illuminate\Http\Request;

class Category_item_controller extends Controller
{
    //
    public function edit_category_item($id)
    {
        $category_item = category_item::find($id);
        if (!$category_item) {
            return redirect()->route('dashboard') - with('error', 'item not found');
        }
        return view('Category_list/edit_category', compact('category_item'));
    }

    public function edit_category_item_submit(Request $request, $id)
    {
        $item = category_item::find($id);
        if ($item) {
            // Update user details
            $item->name = $request->p_name;
            $item->model = $request->p_model;
            $item->title = $request->p_title;
            $item->category_id = $request->category_id;
            $item->short_desc = $request->p_desc;
            $item->amount = $request->p_amount;
            $item->save();

            // return response()->json(['message' => 'item updated successfully.']);
            return redirect()->route('View_product', $request->category_id);
        } else {
            return response()->json(['message' => 'item not found.'], 404);
        }
    }

    public function delete_category_item($id,$foreign_id)
    {
        $category_item = category_item::find($id);
        // dd($foreign_id);
        if (!$category_item) {
            return redirect()->route('home')->with('error', 'item not found');
        }
        $category_item->delete();
        return redirect()->route('View_product', $foreign_id)->with('success', 'item deleted successfully');
    }
}
