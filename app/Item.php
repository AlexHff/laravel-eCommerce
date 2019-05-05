<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Searchable;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'items_index';
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize array...

        return $array;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'units', 'image', 'image2', 'category', 'seller_id', 'video'
    ];

    public function music() {
        return $this->hasOne(Music::class);
    }

    public function book() {
        return $this->hasOne(Book::class);
    }

    public function clothing() {
        return $this->hasOne(Clothing::class);
    }
}
