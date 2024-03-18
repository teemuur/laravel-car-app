<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = ['name', 'company_id'];

    public $timestamps = false;

    public function company(): BelongsTo {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function properties(): BelongsToMany {
        return $this->belongsToMany(Property::class, 'car_properties', 'car_id', 'property_id')
            ->withPivot('property_value');
    }
}

