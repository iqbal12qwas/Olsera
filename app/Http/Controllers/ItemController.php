<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Validator;
use DB;

class ItemController extends Controller
{
    public function create_item(Request $request)
    {
        $item = new Item();

        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'pajak' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $total_pajak =  count($request->input('pajak'));
            $value_pajak = $request->input('pajak');
            $total_input = array();
            foreach($value_pajak as $value) {
                $total_input[] = array(
                                    'name' => $request->input('name'),
                                    'pajak' => $value
                                ); 
            }
            DB::table('item')->insert($total_input);
            
            return response()->json($total_input);
        }
    }

    public function read_item(Request $request)
    {
        $item = Item::all();
        return response()->json(["data" => $item]);
    }

    public function read_item_by_id($id)
    {
        $item = Item::find($id);
        return response()->json($item);
    }

    public function update_item(Request $request, $id)
    {
        $item = Item::find($id);

        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'pajak' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            //Check Data 
            $total_pajak =  count($request->input('pajak'));
            $get_item = DB::table("item")->where('name', '=', $item->name)->get();

            //UPDATE
            $value_pajak = $request->input('pajak');
            $all_value = array();
            $id_item = array();
            
            foreach($get_item as $value2 => $key2) {
                $id_item[] = $key2->id;
            }
            for($i = 0; $i<$total_pajak; $i++) {
                
                $total_input = array(
                                    'name' => $request->input('name'),
                                    'pajak' => $value_pajak[$i]
                                ); 
                $all_value[] = array(
                                    'name' => $request->input('name'),
                                    'pajak' => $value_pajak[$i]
                                ); 
                DB::table('item')->where('id', $id_item[$i])->update($total_input);
            }
            return response()->json($all_value);
        }
    }

    public function delete_item(Request $request, $id)
    {
        $item = Item::find($id);
        $get_item = DB::table("item")->where('name', '=', $item->name)->get();
        foreach($get_item as $value2 => $key2) {
            DB::table('item')->where('id', $key2->id)->delete();
        }
        return response()->json("Delete Success");
    }
}
