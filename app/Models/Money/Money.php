<?php namespace MoneTraak\Models\Money;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Money extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'description'];

    public function user()
    {
        return $this->belongsTo('MoneTraak\Models\User');
    }

    public function moneyAmount()
    {
        return $this->hasMany('MoneTraak\Models\Money\MoneyAmount');
    }

    public function moneySave()
    {
        return $this->hasMany('MoneTraak\Models\Money\MoneySave');
    }

    public function moneyLog()
    {
        return $this->hasMany('MoneTraak\Models\Money\MoneyLog');
    }
}
