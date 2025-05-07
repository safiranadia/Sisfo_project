<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Items;

class ItemsController extends Controller
{
    public function showItems()
    {
        $items = Items::all();

        return response()->json(['data' => $items], 200);
    }

    public function showItem($id)
    {
        $item = Items::findOrFail($id);

        return response()->json(['data' => $item], 200);
    }
}
