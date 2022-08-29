## Lessons learned in Category Model
### Issue: Parent-Child relationship
```php
in App\Models\Category.php

protected string $parentColumn = 'parent_category_id';

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
```

### Issue: onDelete('cascade')  functionality is lost when using SoftDeletes.
For someone that's here and using  `SoftDeletes`  on their models;  `onDelete('cascade')`  functionality is lost when using SoftDeletes. Options you could use in such a case are:

1.  Using  [dyrynda/laravel-cascade-soft-deletes](https://github.com/michaeldyrynda/laravel-cascade-soft-deletes)  package to handle this for you.
    This is the selected solution in this project:
    ```
    $ composer require dyrynda/laravel-cascade-soft-deletes
    ```

    ```php
    use Dyrynda\Database\Support\CascadeSoftDeletes;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Category extends Model
    {
        use SoftDeletes, CascadeSoftDeletes;

        protected $cascadeDeletes = ['parent_category_id'];

        protected $dates = ['deleted_at'];
    ```
2.  Using  [Eloquent Events](https://laravel.com/docs/8.x/eloquent#events)  to trigger an event that the parent has been deleted and handle the deletion of the child rows yourself.

### Delete (softDelete) the related records in the translation table:
```php
in App\Models\Category.php

public static function boot() {  
  parent::boot();  
  
  // before delete() method call this  
  static::deleting(function($category) {  
	 DB::table('category_translations')  
		 ->where('category_id', '=', $category->id)  
		 ->update(['deleted_at' => Carbon::now()]);  
  });  
}
```

## The final Category model after resolving the above issues:
```php
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
```
The **CategoryTranslation.php** Model:
```php
<?php  
  
namespace App\Models;  
  
use Dyrynda\Database\Support\CascadeSoftDeletes;  
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\SoftDeletes;  
  
class CategoryTranslation extends Model  
{  
	 use HasFactory, SoftDeletes, CascadeSoftDeletes;  
	  
	 public $timestamps = false;  
	 protected $fillable = ['name', 'desc'];  
}
```
In the **CategoryController.php**, to delete a category and its children and its nested children:
```php
	 /**  
	  * Remove the specified resource from storage. 
	  */  
	 public function destroy(Request $request)  
	 {
		  if (is_numeric($request->id)) {  
			  Category::find($request->id)->allChildren()->get()->each->delete();  
			  Category::find($request->id)->delete();  
		  }  
		  return redirect()->route('dashboard.categories.index');  
	  }
  ```
