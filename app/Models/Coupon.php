<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

<<<<<<< HEAD

=======
>>>>>>> 15e21d01f157215620e20ba7adb9439a4f7cbdee
    protected $table = "coupons";
    protected $guarded = [];

    public function getTypeAttribute($type)
    {
        return $type == 'amount' ? 'درصدی' : 'مبلغی' ;
    }
}
