<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model {
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description'];

    protected function nameUppercase(): Attribute {
        return Attribute::make(
            get: fn () => strtoupper($this->name)
        );
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
