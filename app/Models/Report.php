<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'code',
        'resident_id',
        'report_category_id',
        'title',
        'description',
        'image',
        'latitude',
        'longitude',
        'address',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }

    public function category()
    {
        return $this->belongsTo(ReportCategory::class);
    }
}
