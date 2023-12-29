<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocks';
    /**
     * The roles that belong to the user.
     */
    /**
     * Get the comments for the blog post.
     */
    public function toner()
    {
        return $this->hasOne('App\Toner');
    }
   
}
