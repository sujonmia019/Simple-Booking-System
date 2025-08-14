<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bookings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['user_id','service_id','booking_date','status'];

    /**
     * Local scope (sortBy) DESC
     */
    public function scopeAuthBook($query)
    {
        return $query->where('user_id', auth()->id());
    }

    /**
     * Local scope (sortBy) DESC
     */
    public function scopeSortBy($query, $sortBy = 'DESC', $column = 'booking_date')
    {
        return $query->orderBy($column, $sortBy);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }
}
