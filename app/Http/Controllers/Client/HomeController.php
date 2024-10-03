<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {




        return view('welcome');
    }

    public function store(Request $request)
    {
        $data = $request->validate([]);
        try {
            //code...
        } catch (\Throwable $th) {
            if (!empty($data['avatar']) && Storage::exists($data['avatar'])) {
                Storage::delete($data['avatar']);
            }
        }
    }

    public function update(Request $request)
    {
        $user = [];
        $currentAvatar = $user['avatar'];
        if($request->hasFile('avatar') && !empty($currentAvatar) && Storage::exists($currentAvatar)){
            Storage::delete($currentAvatar);
        }
        return back()->with('success', 'Delete success');
    }


}
