<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UsesUUID;
class Settings extends Model
{
    protected $fillable =['paypal_client_id','paypal_secret'];
    use SoftDeletes;
    use UsesUUID;
}
