<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pizza;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'name', 'date', 'price'
    ];

    // Define a many-to-many relationship with the 'pizzas' model for orders
    public function pizzas()
    {
        // Define the relationship, specifying the related model, pivot table, foreign keys, and additional pivot data
        return $this->belongsToMany(Pizza::class, 'order_pizzas', 'order_id', 'pizza_id')
            ->withPivot('cost')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
