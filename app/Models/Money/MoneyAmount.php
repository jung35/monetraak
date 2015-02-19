<?php namespace MoneTraak\Models\Money;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Collection;

class MoneyAmount extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['type', 'amount', 'description'];

    public function money()
    {
        return $this->belongsTo('MoneTraak\Models\Money\Money');
    }

    public function type()
    {
        return $this->type ? 'subtract_money' : 'add_money';
    }

    public function scopeGetAddOnly($query) {
        $query->whereType(0);

        return $query;
    }

    public function scopeGetSubtractOnly($query) {
        $query->whereType(1);

        return $query;
    }

    static public function addAllAmounts(Collection $moneyAmounts) {
        $return = 0;

        foreach($moneyAmounts as $moneyAmount) {
            $return += $moneyAmount->amount;
        }

        return $return;
    }
}
