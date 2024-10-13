<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Alert;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    private const VIEW_PATH = 'admin.transaction.';

    private const NAME = 'transaction';
    public function index()
    {
        return view(self::VIEW_PATH . __FUNCTION__);
    }

    public function start(Request $request)
    {
        session()->put(self::NAME, [
            'transaction_id' => Str::ulid(),
            'amount' => $request->amount,
            'receiver_account' => Str::uuid(),
            'status' => 'pending'
        ]);


        Alert::success('Bạn đang tiến hành giao dịch', 'LuxChill Thông Báo');
        return back();
    }

    public function cancel()
    {
        session()->forget(self::NAME);
        Alert::success('Bạn đã hủy giao dịch', 'LuxChill Thông Báo');
        return back();
    }

    public function confirm()
    {
        session()->put(self::NAME . '.' . 'status', 'confirmed');
        Alert::success('Bạn đã xác nhận thông tin thành công. Hãy chuyển tiền để hoàn thành thanh toán', 'Luxchill Thông Báo');
        return back();
    }

    public function pay()
    {
        DB::table('transactions')->insert([
            'transaction_id' => session('transaction.transaction_id'),
            'amount' => session('transaction.amount'),
            'receiver_account' => session('transaction.receiver_account'),
            'status' => 'success'
        ]);

        session()->forget('transaction');

        Alert::success('Bạn đã thanh toán thành công', 'LuxChill Thông Báo');
        return back();
    }
}
