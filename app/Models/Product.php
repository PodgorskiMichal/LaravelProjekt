<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'image_path',
        'name',
        'description',
        'power',
        'battery_voltage',
        'maximum_rotational_speed',
        'amount',
        'price',
        'category_id',
        'brand_id',
        'powered_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(ProductBrand::class);
    }

    public function powered(): BelongsTo
    {
        return $this->belongsTo(ProductPowered::class);
    }

    public function isSelectedCategory(int $category_id): bool
    {
        return $this->hasCategory() && $this->category->id == $category_id;
    }

    public function isSelectedBrand(int $brand_id): bool
    {
        return $this->hasBrand() && $this->brand->id == $brand_id;
    }

    public function isSelectedPowered(int $powered_id): bool
    {
        return $this->hasPowered() && $this->powered->id == $powered_id;
    }

    public function hasCategory(): bool
    {
        return !is_null($this->category);
    }

    public function hasBrand(): bool
    {
        return !is_null($this->brand);
    }

    public function hasPowered(): bool
    {
        return !is_null($this->powered);
    }

    public function hasPoweredPower(): bool
    {
        return !is_null($this->power);
    }

    public function hasPoweredBattery_voltage(): bool
    {
        return !is_null($this->battery_voltage);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);

    }
}
