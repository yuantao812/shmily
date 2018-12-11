<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $table = 'addresses';

    protected $primaryKey = 'id';
    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * 获取客户的合同
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
