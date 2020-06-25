<?php


namespace App\Http\Controllers\Backend;


class DashBoardController
{

    public function index()
    {
       return view('backend.dashboard.index');
    }
}
