<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Helpers\Helper;
use App\Models\Order;
use App\Models\Pizza;
use Carbon\Carbon;
use DB;

class OrderController extends Controller
{
    private $model = "orders";

    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Middleware to ensure authentication for admin users
        $this->middleware('auth:admin');
    }
  
    public function index(Order $model)
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
        // Retrieve pizzas with their ingredients for creating a new order
        $items = Pizza::with('ingredients')->get();
        return view('adm.'.$this->model.'.create')->with([
            'model' => $this->model,
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request, Order $query)
    {
        // Extract data from the request
        $data = $request->all();

        // Set the current date for the order
        $data['date'] = Carbon::now()->format('Y-m-d');

        // Register the order and synchronize pizzas with quantities
        $order = $query->create($data);
        
        // Get the array of selected pizzas and their quantities
        $selectedPizzas = $request->input('pizzas');
        $quantities = $request->input('quantity');

        $pizzaData = [];

        foreach ($selectedPizzas as $key => $pizzaId) {
            // Get the pizza with its ingredients
            $pizza = Pizza::with('ingredients')->find($pizzaId);

            // Check if the pizza is found
            if ($pizza) {
                // Calculate the total cost applying the pizza's percent
                $totalCost = $pizza->ingredients->sum(function ($ingredient) use ($pizza) {
                    return $ingredient->price * (1 + $pizza->percent / 100);
                });

                // Multiply the total cost by the quantity
                $totalCost *= $quantities[$key];

                // Save the pizza with its cost and quantity
                $pizzaData[$pizzaId] = [
                    'cost' => $totalCost,
                    'quantity' => $quantities[$key],
                ];
            }
        }

        // Synchronize pizzas with quantities in the order
        $order->pizzas()->sync($pizzaData);

        return redirect()->back()->with([
            'success' => "Successfully created!",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Order $query)
    {
        // Get order data with associated pizzas and all pizzas
        $data = $query->with('pizzas')->findOrFail($id);
        $items = Pizza::all();

        return view('adm.'.$this->model.'.edit')->with([
            'data' => $data,
            'items' => $items,
            'model' => $this->model
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, string $id, Order $query)
    {
        // Extract data from the request
        $data = $request->all();

        // Find the order in the database and update its data
        $order = $query->findOrFail($id);
        $order->fill($data);
        $order->save();

        // Get the array of selected pizzas
        $selectedPizzas = $request->input('pizzas');
        $pizzaData = [];

        foreach ($selectedPizzas as $pizzaId) {
            // Get the pizza with its ingredients
            $pizza = Pizza::with('ingredients')->find($pizzaId);

            // Check if the pizza is found
            if ($pizza) {
                // Calculate the total cost applying the pizza's percent
                $totalCost = $pizza->ingredients->sum(function ($ingredient) use ($pizza) {
                    return $ingredient->price * (1 + $pizza->percent / 100);
                });
                $pizzaData[$pizzaId] = ['cost' => $totalCost];
            }
        }

        // Synchronize pizzas with updated costs in the order
        $order->pizzas()->sync($pizzaData);

        return redirect()->back()->with([
            'success' => 'Successfully edited!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Order $query)
    {
        // Find and delete the specified order
        $model = $query->find($id);
        $model->delete();
        return redirect()->back()->with([
            'success' => "Successfully deleted!"
        ]);
        //
    }
}
