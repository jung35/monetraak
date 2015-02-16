<?php namespace MoneTraak\Models\Money;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoneyAmount extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['type', 'amount', 'description'];

    public function money()
    {
        return $this->belongsTo('MoneTraak\Models\Money\Money');
    }

}
