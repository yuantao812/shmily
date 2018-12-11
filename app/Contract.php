<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    protected $table = 'contracts';

    protected $primaryKey = 'id';
    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * 获取合同的客户
     */
    public function customer()
    {
        return $this->belongsTo('App\Admin\Customer');
    }

    /**
     * 获取合同的客户
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
