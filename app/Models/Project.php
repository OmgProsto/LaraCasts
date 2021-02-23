<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	use HasFactory;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title',
        'description',
        'owner_id'
    ];

    public function path()
    {
        return "/projects/{$this->id}";
    }
<<<<<<< HEAD

    public function owner()
    {
        return $this->belongsTo(User::class);
    } 
=======
>>>>>>> 28c78127c2086fd60c006692250c29013194d3a3
}
