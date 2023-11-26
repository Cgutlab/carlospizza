<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Http\Requests\StoreIngredientRequest;
use App\Http\Requests\UpdateIngredientRequest;
use App\Helpers\Helper;

class IngredientController extends Controller
{
    private $model = "ingredients";

    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Middleware to ensure authentication for admin users
        $this->middleware('auth:admin');
    }
  
    public function index(Ingredient $model)
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
        // Display the create view for a new ingredient
        return view('adm.'.$this->model.'.create')->with([
            'model' => $this->model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIngredientRequest $request, Ingredient $query)
    {
        // Extract data from the request
        $data = $request->all();

        // Save the image and update the data with the file name
        $fileSave = Helper::saveImage($request->file('image'), strtolower($this->model));
        $data['image'] = $fileSave;

        // Create a new ingredient in the database
        $query->create($data);

        return redirect()->back()->with([
            'success' => "Successfully created!"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Ingredient $query)
    {
        // Display the edit view with data for the specified ingredient
        return view('adm.'.$this->model.'.edit')->with([
            'data' => $query->find($id),
            'model' => $this->model
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIngredientRequest $request, string $id, Ingredient $query)
    {
        // Extract data from the request
        $data = $request->all();

        // Update the image if a new one is provided
        $fileSave = Helper::saveImage($request->file('image'), strtolower($this->model), $id);
        if ($fileSave) {
            $data['image'] = $fileSave;
        }

        // Find the ingredient in the database and update its data
        $store = $query->find($id);
        $store->fill($data);
        $store->save();

        return redirect()->back()->with([
            'success' => 'Successfully edited!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Ingredient $query)
    {
        // Find and delete the specified ingredient
        $model = $query->find($id);
        $model->delete();
        return redirect()->back()->with([
            'success' => "Successfully deleted!"
        ]);
        //
    }
}