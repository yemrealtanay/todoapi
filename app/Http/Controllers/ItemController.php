<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Listing all items
     * @return JsonResponse
     *
     */
    public function index(): JsonResponse
    {
        $items = Item::all()->where('user_id', auth()->user()->id);
        return response()->json($items);
    }

    /**
     * Creating a new item
     * @param Request $request
     * @return JsonResponse
     *
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $item = New Item();
            $item->title = $request->title;
            $item->description = $request->description;
            $item->user_id = auth()->user()->id;
            $item->save();
            return response()->json([
                'message' => 'Item created successfully',
                'item' => $item
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating item',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Showing a single item
     * @param Item $item
     * @return JsonResponse
     *
     */
    public function show(Item $item): JsonResponse
    {
        return response()->json($item);
    }

    /**
     * Updating an item
     * @param Request $request
     * @param Item $item
     * @return JsonResponse
     *
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $item = Item::find($id);
            $item->update($request->all());
            return response()->json([
                'message' => 'Item updated successfully',
                'item' => $item
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating item',
                'error' => $e->getMessage()
            ], 500);
        }

    }

    /**
     * Deleting an item
     * @param Item $item
     * @return JsonResponse
     *
     */
    public function destroy(Item $item): JsonResponse
    {
        $item->delete();
        return response()->json(
            ['message' => 'Item deleted'],
        202);
    }
}
