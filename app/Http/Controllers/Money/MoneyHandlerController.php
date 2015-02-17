<?php namespace MoneTraak\Http\Controllers\Money;

use MoneTraak\Http\Requests;
use MoneTraak\Http\Controllers\Controller;

use Illuminate\Http\Request;
use MoneTraak\Http\Requests\MoneyModifyRequest;

use MoneTraak\Models\Money\Money;
use MoneTraak\Models\Money\MoneyAmount;
use MoneTraak\Models\Money\MoneyLog;

class MoneyHandlerController extends Controller {

    public function modify(MoneyModifyRequest $request, Money $money)
    {
        $user = $request->user();

        if($money->user_id != $user->id) {
            return redirect()->route('money.index');
        }

        $moneyAmount = new MoneyAmount($request->all());
        $money->moneyAmount()->save($moneyAmount);

        $moneyLog = new MoneyLog();
        $moneyLog->user_id = $money->user_id;
        $moneyLog->type    = $moneyAmount->type();
        $moneyLog->amount  = $moneyAmount->amount;
        $money->moneyLog()->save($moneyLog);

        return redirect()->route('money.show', $money);
    }

    public function save(MoneyModifyRequest $request, Money $money)
    {
        $user = $request->user();

        if($money->user_id != $user->id) {
            return redirect()->route('money.index');
        }

        $moneyAmount = new MoneyAmount($request->all());
        $money->moneyAmount()->save($moneyAmount);

        $moneyLog = new MoneyLog();
        $moneyLog->user_id = $money->user_id;
        $moneyLog->type    = $moneyAmount->type();
        $moneyLog->amount  = $moneyAmount->amount;
        $money->moneyLog()->save($moneyLog);

        return redirect()->route('money.show', $money);
    }

}
