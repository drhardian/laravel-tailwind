<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    # Display a listing of the resource on selectbox.
    public function showOnDropdown()
    {
        $queries = Item::with('activity:id,activity_name','itemtype:id,type_name')
                    ->select('item.id','item.size','item.class','item.master_activity_code','item.item_type_id')
                    ->when(request('search', false), function($query) {
                        return $query->where('item.class', 'like', '%'.request('search').'%')
                                    ->orWhere('item.size', 'like', '%'.request('search').'%')
                                    ->orWhereHas('activity', function($q) {
                                        $q->where('activity_name','like','%'.request('search').'%');
                                    })
                                    ->orWhereHas('itemtype', function($q) {
                                        $q->where('type_name','like','%'.request('search').'%');
                                    });
                    }, function($query) {
                        return $query->limit(50);
                    })
                    ->get();

        $response = [];

        foreach($queries as $query) {
            $response[] = array(
                "id" => $query->id,
                "text" => $query->size,
                "class" => $query->class,
                "activity" => $query->activity->activity_name,
                "itemtype" => $query->itemtype->type_name
            );
        }

        return response()->json($response);
    }
}
