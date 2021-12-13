<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemModel;
use App\Models\PajakModel;
use DB;

class ListDataItemController extends Controller
{
    public function read_data(Request $request, $id)
    {
        $data_item = ItemModel::find($id);
        
        $pajak = DB::table("pajak")->where('id_item', '=', $id)->get(); 
        
        $data = array();
        $all_pajak = array();
        foreach ($pajak as $value2 => $key2) {
            $rate = $key2->rate * 100;
            $all_pajak[] = ["id" => $key2->id, "name" => $key2->name, "rate" => $rate."%"];
        }
        $data[] = ["id" => $data_item->id, "name" => $data_item->name, "pajak" => $all_pajak];
       
    
        return response()->json(['data' => $data]);
    }
}
