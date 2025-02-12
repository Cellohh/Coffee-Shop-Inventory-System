<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions; // Import the correct class

class Category extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name'];

    // Implement getActivitylogOptions() using the correct return type
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name'])
            ->logOnlyDirty();
    }

    public function items()
    {
        return $this->hasMany(\App\Models\Item::class);
    }
}
