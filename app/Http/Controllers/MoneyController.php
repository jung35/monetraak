<?php namespace MoneTraak\Http\Controllers;

use MoneTraak\Http\Requests;
use MoneTraak\Http\Controllers\Controller;

use Illuminate\Http\Request;
use MoneTraak\Http\Requests\MoneyRequest;

use MoneTraak\Models\Money\Money;
use MoneTraak\Models\Money\MoneyLog;

class MoneyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Money $money)
    {
        return view('money.index', compact('money'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('money.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(MoneyRequest $request)
    {
        $user = $request->user();
        $user->money()->save(new Money($request->all()));

        return redirect()->route('money.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Money $money)
    {
        $moneyLogs = MoneyLog::whereUserId(\Auth::user()->id)
            ->whereMoneyId($money->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('money.show', compact('money', 'moneyLogs'));
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
