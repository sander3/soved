<?php

namespace App\Http\Controllers\Food;

use App\Food\Ingredient;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\IngredientRepository;

class InventoryController extends Controller
{
    /**
     * The ingredient repository instance.
     */
    protected IngredientRepository $ingredients;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IngredientRepository $ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $request->user()->ingredients;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('food.inventory.create', [
            'ingredients' => Ingredient::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // To-do: user input validation (including checking the current max quantity)

        $ingredient = Ingredient::findOrFail($request->input('ingredient_id'));

        $this->ingredients->attachOrIncrement(
            $request->user(),
            $ingredient,
            $request->input('quantity')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
