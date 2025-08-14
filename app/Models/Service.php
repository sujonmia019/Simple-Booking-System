<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['name','description','price','status'];

    /**
     * Local scope (status)
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Local scope (sortBy) DESC
     */
    public function scopeSortBy($query, $sortBy = 'DESC', $column = 'created_at')
    {
        return $query->orderBy($column, $sortBy);
    }

    public function bookings(){
        return $this->hasMany(Booking::class, 'service_id');
    }
}
