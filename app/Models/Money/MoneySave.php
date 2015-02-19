<?php namespace MoneTraak\Models\Money;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoneySave extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'type', 'priority', 'amount', 'description'];

    public function money()
    {
        return $this->belongsTo('MoneTraak\Models\Money\Money');
    }

    public function type()
    {
        return $this->type ? 'percent_save' : 'money_save';
    }

}
