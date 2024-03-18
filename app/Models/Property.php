<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = ['type', 'name'];
    public $timestamps = false;


    public function cars(): BelongsToMany {
        return $this->belongsToMany(Property::class, 'car_properties', 'property_id', 'car_id')
            ->withPivot('property_value');
    }

}
