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
    public function view($data = null)
    {
        $view = view('money.index');

        if(is_numeric($data)) {
            return view('money.show');
        }

        if(!is_null($data)) {
            switch($data) {
                case 'create':
                    $view = view('money.create');
                    break;
            }
        }

        return $view;
    }

}
