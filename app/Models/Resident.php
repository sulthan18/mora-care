<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
  use SoftDeletes;
  protected $fillable = [
    'user_id',
    'avatar'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function reports()
  {
    return $this->hasMany(Report::class);
  }
}
