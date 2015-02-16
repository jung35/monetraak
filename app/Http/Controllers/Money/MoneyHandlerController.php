<?php namespace MoneTraak\Http\Controllers\Money;

use MoneTraak\Http\Requests;
use MoneTraak\Http\Controllers\Controller;

use Illuminate\Http\Request;
use MoneTraak\Http\Requests\MoneyModifyRequest;

class MoneyHandlerController extends Controller {

    public function modify(MoneyModifyRequest $request, Money $money)
    {
        $user = $request->user();

    }

}
