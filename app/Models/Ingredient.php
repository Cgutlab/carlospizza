<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pizza;

class Ingredient extends Model
{
    use HasFactory;
    protected $table = 'ingredients';
    protected $fillable = [
        'image', 'name', 'price'
    ];

    // Define a many-to-many relationship with the 'pizzas' model
    public function pizzas()
    {
        // Define the relationship, specifying the related model, pivot table, foreign keys, and additional pivot data
            // Include the 'cost' field from the pivot table and timestamps for when the relationship is updated
        return $this->belongsToMany(Pizza::class, 'pizza_ingredients', 'ingredient_id', 'pizza_id')
            ->withPivot('cost')
            ->withTimestamps();
    }
}
