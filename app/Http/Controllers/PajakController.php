<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PajakModel;
use Validator;

class PajakController extends Controller
{
    public function create_pajak(Request $request)
    {
        $pajak = new PajakModel();

        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'rate' => 'required|numeric|between:0,1',
            'id_item' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $pajak->timestamps = false;
            $pajak->name = $request->input('name');
            $pajak->rate = $request->input('rate');
            $pajak->id_item = $request->input('id_item');
            
            $pajak->save();
            return response()->json($pajak);
        }

    }

    public function read_pajak(Request $request)
    {
        $pajak = PajakModel::all();
        $all_pajak = array();
        foreach ($pajak as $value => $key) {
            $rate = $key->rate * 100;
            $all_pajak[] = ["id" => $key->id, "name" => $key->name, "rate" => $rate."%"];
        }
        return response()->json(["data" => $all_pajak]);
    }

    public function update_pajak(Request $request, $id)
    {
        $pajak = PajakModel::find($id);

        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'rate' => 'required|numeric|between:0,1',
            'id_item' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $pajak->timestamps = false;
            $pajak->name = $request->input('name');
            $pajak->rate = $request->input('rate');
            $pajak->id_item = $request->input('id_item');
            
            $pajak->save();
            return response()->json($pajak);
        }
    }

    public function delete_pajak(Request $request, $id)
    {
        $pajak = PajakModel::find($id);
        $pajak-> delete();

        return response()->json($pajak);
    }
}
