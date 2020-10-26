<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\UsesUUID;
class Service extends Model
{    use SoftDeletes;
    use UsesUUID;
    protected $fillable = [
        '_token', 'service_name',
    ];
    protected $guarded = [
        '_token', 'service_name',
    ];
    protected $table = 'services';
    /**
     * @var array|mixed|string|null
     */
    private $service_name;


}
