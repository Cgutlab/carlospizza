<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;
use App\Models\Order;

class Pizza extends Model
{
    use HasFactory;
    protected $table = 'pizzas';
    protected $fillable = [
        'image', 'name', 'percent'
    ];

    // Define a many-to-many relationship with the 'ingredients' model
    public function ingredients()
    {
        // Define the relationship, specifying the related model, pivot table, foreign keys, and additional pivot data
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredients', 'pizza_id', 'ingredient_id')
            ->withPivot('cost')
            ->withTimestamps();
    }

    // Define a many-to-many relationship with the 'orders' model
    public function orders()
    {
        // Define the relationship, specifying the related model, pivot table, foreign keys, and additional pivot data
        return $this->belongsToMany(Order::class, 'order_pizzas', 'pizza_id', 'order_id')
            ->withPivot('cost')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
