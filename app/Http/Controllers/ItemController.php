<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Requests\StoreOrUpdateItem;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function store(StoreOrUpdateItem $request)
    {
        $item = Item::create($request->all());

        return response()->json($item, 201); //created
    }

    public function show($id)
    {
        return Item::find($id);
    }

    public function update(StoreOrUpdateItem $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());

        return response()->json($item, 200); //OK
    }

    public function delete($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json(null, 204); //no content
    }
}
