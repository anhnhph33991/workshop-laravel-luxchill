<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    private const VIEW_PATH = 'admin.dashboard';

    public function index()
    {
        return view(self::VIEW_PATH);
    }
}
