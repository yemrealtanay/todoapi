<?php

namespace App\Http\Controllers;

use App\Models\Column;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class ColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $columns = Column::all()->with('items')->where('user_id', auth()->user()->id);
        return response()->json($columns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        try{
            $column = New Column();
            $column->name = $request->name;
            $column->save();
            return response()->json([
                'message' => 'Column created successfully',
                'column' => $column
            ], 201);
        }catch (\Exception $e){
            return response()->json([
                'message' => 'Error creating column',
                'error' => $e->getMessage()
            ], 500);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Column  $column
     * @return JsonResponse
     */
    public function show(Column $column): JsonResponse
    {
        return response()->json($column);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Column  $column
     * @return \Illuminate\Http\Response
     */
    public function edit(Column $column)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Column  $column
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $column = Column::find($id);
            $column->update($request->all());
            return response()->json([
                'message' => 'Column updated successfully',
                'column' => $column
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating column',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Column  $column
     * @return JsonResponse
     */
    public function destroy(Column $column): JsonResponse
    {
        $column->delete();
        return response()-json(
            ['message' => 'Item deleted'],
            202);
    }
}
