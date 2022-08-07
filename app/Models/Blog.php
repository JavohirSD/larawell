<?php

namespace App\Models;

use App\Models\Enums\BlogStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Define model table
    protected $table = 'blog';


    // Set or update timestamp columns
    public $timestamps = true;


    // Set date format to save DB (U - unix timestamp)
    protected $dateFormat = 'U';


    // Set default value of columns.(Laravel won't override it if not given)
    protected $attributes = [
        'status' => BlogStatus::ACTIVE
    ];


    // Open and writable attributes of model
    protected $fillable = [
        'title',
        'anons',
        'description',
        'slug',
        'image',
        'author_id',
        'status',
        'category_id'
    ];


    // hidden attributes from response body
    protected $hidden = [
        'signature'
    ];


    // Convert response date format for UI
    protected $casts = [
        // 'created_at' => 'timestamp',
        // 'updated_at' => 'timestamp',
        'created_at' => 'datetime:d.m.Y H:i',
        'updated_at' => 'datetime:d.m.Y H:i'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }
}
