<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AdminCoupon extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code','discount','value','start_date','end_date','counter','max_counter',
        'remaining_days','usage','user_id',
    ];

    public function getRemainingDaysAttribute()
    {

        if ($this->end_date) {
            $remaining_days = Carbon::now()->diffInDays(Carbon::parse($this->end_date));
        } else {
            //--don't forget to deactivate the user :D
            $remaining_days = 0;
        }
       
        return $remaining_days;
    }

}