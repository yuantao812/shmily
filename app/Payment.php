<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $table = 'payments';

    protected $primaryKey = 'id';

    protected $guarded = [];
    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * 合同
     */
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
