<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model implements TranslatableContract
{
    use Translatable, HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected string $parentColumn = 'parent_category_id';

    protected $fillable = ['image', 'parent_category_id'];

    protected array $cascadeDeletes = ['children'];

    protected $dates = ['deleted_at'];

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

    public static function boot() {
        parent::boot();

        // before delete() method call this
        static::deleting(function($category) {
            DB::table('category_translations')
                ->where('category_id', '=', $category->id)
                ->update(['deleted_at' => Carbon::now()]);
        });
    }

}
