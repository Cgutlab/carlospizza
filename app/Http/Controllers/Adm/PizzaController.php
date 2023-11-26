<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;
use App\Models\Pizza;
use App\Models\Ingredient;

class PizzaController extends Controller
{
    private $model = "pizzas";

    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Middleware to ensure authentication for admin users
        $this->middleware('auth:admin');
    }
  
    public function index(Pizza $model)
    {
        // Display the index view with paginated data
        return view('adm.'.$this->model.'.index')->with([
            'data' => $model->paginate(5),
            'model' => $this->model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve ingredients for creating a new pizza
        $items = new Ingredient();
        return view('adm.'.$this->model.'.create')->with([
            'model' => $this->model,
            'items' => $items->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePizzaRequest $request, Pizza $query)
    {
        // Extract data from the request
        $data = $request->all();

        // Save the image and update the data with the file name
        $fileSave = Helper::saveImage($request->file('image'), strtolower($this->model));
        if ($fileSave) {
            $data['image'] = $fileSave;
        }

        // Register the pizza
        $product = $query->create($data);

        // Get the array of selected ingredients
        $ingredients = $request->get('ingredients');

        // Initialize the array for synchronization
        $ingredientData = [];

        // Loop through the selected ingredients and get the cost from the database
        foreach ($ingredients as $ingredientId) {
            $ingredient = Ingredient::find($ingredientId);
            $ingredientData[$ingredientId] = ['cost' => $ingredient->price];
        }

        // Synchronize ingredients with costs
        $product->ingredients()->sync($ingredientData);        
        return redirect()->back()->with([
            'success' => "Successfully created!"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Pizza $query, Ingredient $items)
    {
        // Display the edit view with data for the specified pizza
        return view('adm.'.$this->model.'.edit')->with([
            'data' => $query->find($id),
            'items' => $items->all(),
            'model' => $this->model
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePizzaRequest $request, string $id, Pizza $query)
    {
        // Extract data from the request
        $data = $request->all();

        // Update the image if a new one is provided
        $fileSave = Helper::saveImage($request->file('image'), strtolower($this->model), $id);
        if ($fileSave) {
            $data['image'] = $fileSave;
        }

        // Find the pizza in the database and update its data
        $store = $query->findOrFail($id);
        $store->fill($data);
        $store->save();

        // Synchronize associated ingredients
        $ingredientData = [];
        foreach ($request->input('ingredients', []) as $ingredientId) {
            $ingredient = Ingredient::findOrFail($ingredientId);
            $ingredientData[$ingredientId] = ['cost' => $ingredient->price];
        }
        $store->ingredients()->sync($ingredientData);

        return redirect()->back()->with([
            'success' => 'Successfully edited!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Pizza $query)
    {
        // Find and delete the specified pizza
        $model = $query->find($id);
        $model->delete();
        return redirect()->back()->with([
            'success' => "Successfully deleted!"
        ]);
    }
}
