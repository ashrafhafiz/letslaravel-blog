<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;

    protected string $parentColumn = 'parent_category_id';

    protected $fillable = ['image', 'parent_category_id'];

    public array $translatedAttributes = ['name', 'desc'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class,$this->parentColumn);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, $this->parentColumn);
    }

    public function allChildren(): HasMany
    {
        return $this->children()->with('allChildren');
    }

}
