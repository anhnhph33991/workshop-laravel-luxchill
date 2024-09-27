<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class HomeController extends Controller
{
    public function index()
    {

        #1: Truy vấn kết hợp nhiều bảng (JOIN):
        DB::table('users', 'u')
            ->join('orders as o', 'u.id', '=', 'o.user_id')
            ->groupBy('u.name')
            ->havingRaw('total_spent > ?', [1000])
            ->selectRaw('u.name, SUM(o.amount) as total_spent')
            ->ddRawSql();

        #2: Truy vấn thống kê dựa trên khoảng thời gian (Time-based statistics):
        DB::table('orders')
            ->whereBetween('order_date', ['2024-01-01', '2024-09-30'])
            ->groupByRaw('DATE(order_date)')
            ->selectRaw('DATE(order_date) as date, COUNT(*) as orders_count, SUM(total_amount) as total_sales')
            ->ddRawSql();

        #3: Truy vấn để tìm kiếm giá trị không có trong tập kết quả khác (NOT EXISTS):
        DB::table('products', 'p')
            ->whereNotExists(function (Builder $query) {
                $query
                    ->selectRaw('1')
                    ->from('orders', 'o')
                    ->where('o.product_id', 'p.id');
            })
            ->select('product_name')
            ->ddRawSql();

        #4: Truy vấn với CTE (Common Table Expression):

        $query1 = DB::table('sales')
            ->groupBy('product_id')
            ->selectRaw('product_id, SUM(quantity) as total_sold')
            ->toSql();

        DB::table('products as p')
            ->select('p.product_name', 's.total_sold')
            ->join(DB::raw("({$query1}) as s"), 'p.id', '=', 's.product_id')
            ->where('s.total_sold', '>', 100)
            ->ddRawSql();

        #5: Truy vấn lấy danh sách người dùng đã mua sản phẩm trong 30 ngày qua, cùng với thông tin sản phẩm và ngày mua
        DB::table('users')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->join('order_items', 'orders_id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->where('orders.order_date', '>=', DB::raw('NOW() - INTERVAL 30 DAY'))
        ->select('users.name, products.product_name, orders.order_date')
        ->ddRawSql();

        #6: Truy vấn lấy tổng doanh thu theo từng tháng, chỉ tính những đơn hàng đã hoàn thành
        DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->where('orders.status', 'completed')
            ->groupBy('order_month')
            ->orderByDesc('order_month')
            ->selectRaw('DATE_FORMAT(orders.order_date, %Y-%m) as order_month, SUM(order_items.quantity * order_items.price) as total_revenue')
            ->ddRawSql();

        #7: Truy vấn các sản phẩm chưa từng được bán (sản phẩm không có trong bảng order_items)
        DB::table('products')
            ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
            ->whereNull('order_items.product_id')
            ->select('products.product_name')
            ->ddRawSql();

        #8: Lấy danh sách các sản phẩm có doanh thu cao nhất cho mỗi loại sản phẩm
        $query1 = DB::table('order_items')
            ->groupBy('product_id')
            ->selectRaw('product_id, SUM(quantity * price) as total');

        DB::table('products', 'p')
            ->joinSub($query1, 'oi', function (JoinClause $join) {
                $join->on('p.id', '=', 'oi.product_id');
            })
            ->groupBy('p.category_id', 'p.product_name')
            ->orderByDesc('max_revenue')
            ->selectRaw('p.category_id, p.product_name, MAX(oi.total) as max_revenue')
            ->ddRawSql();

        #9: Truy vấn thông tin chi tiết về các đơn hàng có giá trị lớn hơn mức trung bình

        $query1 = DB::table('order_items')
            ->groupBy('order_id')
            ->selectRaw('SUM(quantity * price) as total');


        $query2 = DB::table($query1, 'avg_order_value')
            ->selectRaw('AVG(total)')
            ->toSql();

        DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('order_items as oi', 'orders_id', '=', 'order_items.order_id')
            ->groupBy('orders_id', 'users.name', 'orders.order_date')
            ->havingRaw("total_value > ($query2)")
            ->selectRaw('orders.id, users.name, orders.order_date, SUM(order_items.quantity * order_items.price) as total_value')
            ->ddRawSql();


        #10: Truy vấn tìm tất cả các sản phẩm có doanh số cao nhất trong từng danh mục (category)

        $query1 = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->where( 'products.category_id', '=', 'products.id')
            ->groupBy('product_name')
            ->selectRaw('product_name, SUM(quantity) as total_sold');

        $query2 = DB::table($query1, 'sub')
            ->selectRaw('MAX(sub.total_sold)')
            ->toSql();


        DB::table('products', 'p')
            ->join('order_items as oi', 'p.id', '=', 'oi.product_id')
            ->groupBy('p.category_id', 'p.product_name')
            ->havingRaw("total_sold = ({$query2})")
            ->selectRaw("p.category_id, p.product_name, SUM(oi.quantity) as total_sold")
            ->ddRawSql();
    }
}
