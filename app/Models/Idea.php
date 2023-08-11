<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    // mass assignment data sending array of data to store in model
    // here instructed i want to updated this array of file to the modle
    protected $fillable = [
        'content',
        'user_id'
    ];

    // don't want to mass assign this array in to model avoid this array
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function comment(){
        // hasMany(model, foreignkey , localkey)
        // return $this->hasMany(comment::class, 'idea_id', 'id');
        return $this->hasMany(comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);   
    }
}
