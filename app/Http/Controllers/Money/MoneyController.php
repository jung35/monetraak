<?php namespace MoneTraak\Http\Controllers\Money;

use MoneTraak\Http\Requests;
use MoneTraak\Http\Controllers\Controller;

use Illuminate\Http\Request;
use MoneTraak\Http\Requests\MoneyRequest;

use MoneTraak\Models\Money\Money;
use MoneTraak\Models\Money\MoneyAmount;
use MoneTraak\Models\Money\MoneyLog;

class MoneyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Money $money)
    {
        return \Auth::user()->money()->orderBy('id', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    // public function create()
    // {
    //     return view('money.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MoneyRequest $request)
    {
        $user = $request->user();


        return $user->money()->save(new Money($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Money $money)
    {
        $moneyLogs = $money->moneyLog()
            ->orderBy('id', 'desc')
            ->get();

        $moneySave = $money->moneySave()
            ->orderBy('priority', 'asc')
            ->get();

        $moneyAddOnly = MoneyAmount::addAllAmounts($money->moneyAmount()->getAddOnly()->get());

        $moneySubtractOnly = MoneyAmount::addAllAmounts($money->moneyAmount()->getSubtractOnly()->get());

        $moneyList = [];

        $currentAmount = $moneyAddOnly;

        $moneyAddOnly -= $moneySubtractOnly;

        foreach($moneySave as $toSave) {
            $amount = $toSave->amount * ($toSave->type ? $currentAmount/100 : 1);

            $tempMoney = $moneyAddOnly;
            $moneyAddOnly -= $amount;

            $moneyList[] = [
                'title' => $toSave->title,
                'to_save' => $amount,
                'saved' => $moneyAddOnly > 0 ? $amount : $tempMoney
            ];

            if($moneyAddOnly <= 0) {
                $moneyAddOnly = 0;
            }
        }

        $moneyInfo = [
            'money_free' => $moneyAddOnly,
            'money_used' => $moneySubtractOnly,
            'money_final' => $moneyAddOnly
        ];

        // dd($moneyList);

        return compact(
            'money',
            'moneyLogs',
            'moneyList',
            'moneyInfo'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Money $money)
    {
        return view('money.edit', compact('money'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(MoneyRequest $request, Money $money)
    {
        $money->update($request->all());

        return redirect()->route('money.show', $money);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Money $money)
    {
        $money->delete();

        return redirect()->route('money.index');
    }

}
