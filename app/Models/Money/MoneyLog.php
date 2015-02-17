<?php namespace MoneTraak\Models\Money;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoneyLog extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['type', 'message'];

    private $messages = [
        'add_money'      => 'MONEY ADD : ${amount}',
        'subtract_money' => 'MONEY SUBTRACT : ${amount}',
        'percent_save'   => 'PERCENT SAVE : {amount}%',
        'money_save'     => 'MONEY SAVE : ${amount}'
    ];

    public function user()
    {
        return $this->belongsTo('MoneTraak\Models\User');
    }

    public function money()
    {
        return $this->belongsTo('MoneTraak\Models\Money\Money');
    }

    public function toString()
    {
        $message = $this->messages[$this->type];
        $double = number_format($this->amount, 2);

        return preg_replace('/{amount}/i', $double, $message);
    }

}
