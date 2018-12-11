<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $table = 'contacts';

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
        return $this->belongsTo(Customer::class);
    }
}
