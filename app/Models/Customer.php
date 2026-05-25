<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model {
    use HasFactory;
    protected $fillable = ['first_name','last_name','email','phone','address'];

    protected function fullName(): Attribute {
        return Attribute::make(
            get: fn () => $this->first_name . ' ' . $this->last_name
        );
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
