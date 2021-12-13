<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;
use Validator;

class ItemController extends Controller
{
    public function create_item(Request $request)
    {
        $item = new ItemModel();

        $validator = Validator::make($request->all(), [ 
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $item->timestamps = false;
            $item->name = $request->input('name');
            
            $item->save();
            return response()->json($item);
        }
    }

    public function read_item(Request $request)
    {
        $item = ItemModel::all();
        return response()->json(["data" => $item]);
    }

    public function read_item_by_id($id)
    {
        $item = ItemModel::find($id);
        return response()->json($item);
    }

    public function update_item(Request $request, $id)
    {
        $item = ItemModel::find($id);

        $validator = Validator::make($request->all(), [ 
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $item->timestamps = false;
            $item->name = $request->input('name');
            
            $item->save();
            return response()->json($item);
        }
    }

    public function delete_item(Request $request, $id)
    {
        $item = ItemModel::find($id);
        $item-> delete();

        return response()->json($item);
    }
}
