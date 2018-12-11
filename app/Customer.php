<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'customers';

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
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * 获取客户的地址
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }


    /**
     * 获取客户的联系人
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
