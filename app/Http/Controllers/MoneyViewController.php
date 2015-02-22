<?php namespace MoneTraak\Http\Controllers;

use MoneTraak\Http\Requests;
use MoneTraak\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MoneyViewController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function view($money = null)
    {
        $view = view('money.index');

        return $view;
    }

}
