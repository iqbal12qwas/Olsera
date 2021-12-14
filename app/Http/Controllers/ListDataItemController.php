<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Pajak;
use DB;

class ListDataItemController extends Controller
{
    public function read_data(Request $request, $id)
    {
        $get_item = Item::find($id);
        $get_value_pajak = DB::table("item")->select("pajak")->where('name', '=', $get_item->name)->get();
        
        $all_pajak = array();
        $get_pajak = array();
        foreach($get_value_pajak as $value => $key) {
            $get_pajak[] = DB::table('pajak')->select("id","name",DB::raw("(CONCAT(rate*100, '%')) as `rate`"))
                                            ->where('id', '=', $key->pajak)->get();
        }
        $data[] = ["id" => $get_item->id, "name" => $get_item->name, "pajak" => $get_pajak];
 
        return response()->json(['data' => $data]);
    }
}
