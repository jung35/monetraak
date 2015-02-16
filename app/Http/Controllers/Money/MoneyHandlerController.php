<?php namespace MoneTraak\Http\Controllers\Money;

use MoneTraak\Http\Requests;
use MoneTraak\Http\Controllers\Controller;

use Illuminate\Http\Request;
use MoneTraak\Http\Requests\MoneyModifyRequest;

use MoneTraak\Models\Money\Money;
use MoneTraak\Models\Money\MoneyAmount;

class MoneyHandlerController extends Controller {

    public function modify(MoneyModifyRequest $request, Money $money)
    {
        $user = $request->user();

        if($money->user_id != $user->id) {
            return redirect()->route('money.index');
        }

        $moneyAmount = new MoneyAmount($request->all());
        $money->moneyAmount()->save($moneyAmount);

        return $moneyAmount;
    }

}
