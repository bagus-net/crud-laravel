<?php
/**
 * author : Suryo Atmojo <suryoatm@gmail.com>
 * project : Supresso Laravel
 * Start-date : 19-09-2022
 */

namespace App\Http\Controllers;

use App\Charts\SampleChart;

use App\Models\Order_model;
use App\Models\Order_detail_model;
use App\Models\Product_model;
use App\Models\Product_collection_model;
use App\Models\Product_type_model;
use App\Models\Product_form_model;
use App\Models\Product_package_model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $product_models =  DB::table('product_models')->where('product_models.deleted', 'false')
            ->leftjoin(
                'product_collection_models',
                'product_models.product_collection',
                '=',
                'product_collection_models.id'
            )
            ->leftjoin(
                'product_type_models',
                'product_models.product_type',
                '=',
                'product_type_models.id'
            )
            ->leftjoin(
                'product_form_models',
                'product_models.product_form',
                '=',
                'product_form_models.id'
            )
            ->leftjoin(
                'product_package_models',
                'product_models.product_package',
                '=',
                'product_package_models.id'
            )
            ->select(
                'product_models.*',
                'product_collection_models.product_collection_name',
                'product_type_models.product_type_name',
                'product_form_models.product_form_name',
                'product_package_models.product_package_name'
            )
            ->get();

        $member_models =  DB::table('member_models')->get();

        $order_models =  DB::table('order_models')
            ->where('order_models.deleted', '=', 'false')
            ->get();
        $incomes = DB::table('order_models')
            ->where('order_models.status', '=', 'complete')
            ->where('order_models.deleted', '=', 'false')
            ->sum('order_models.itemsubtotal');

        // $topsellingproduct =
        //     DB::table('order_detail_models')
        //     ->groupBy('order_detail_models.idproduct')
        //     // ->orderBy('sum(qty)')
        //     // ->limit(5)
        //     ->get();

        $topsellingproduct = [];
        $topsellingproduct_res = DB::select('select order_detail_models.namaproduk, sum(order_detail_models.qty) as qty from order_detail_models group by order_detail_models.idproduct order by sum(order_detail_models.qty) desc limit 5');
        $total = 0;
        for ($t = 0; $t < count($topsellingproduct_res); $t++) {
            $total = $total + $topsellingproduct_res[$t]->qty;
        }

        //dd($total);

        for ($t = 0; $t < count($topsellingproduct_res); $t++) {
            $tsp = $topsellingproduct_res[$t];
            $tsp->percent = round(($topsellingproduct_res[$t]->qty / $total) * 100);
            array_push($topsellingproduct, $tsp);
        }
        //dd($topsellingproduct);

        $count_product = count($product_models);
        $count_order = count($order_models);
        $count_member = count($member_models);


        $historyorders = DB::select("select DATE_FORMAT(order_models.tanggalorder, '%Y/%M') as date, sum(itemsubtotal) as jumlah
				from `order_models` 
                where deleted = 'false' 
			 group by YEAR(order_models.tanggalorder), MONTH(order_models.tanggalorder) 
			 order by order_models.tanggalorder asc");

        //dd($historyorders);

        $label = [];
        $dataset = [];
        for ($ho = 0; $ho < count($historyorders); $ho++) {
            array_push($label, $historyorders[$ho]->date);
            array_push($dataset, $historyorders[$ho]->jumlah);
        }

        $chart = new SampleChart;
        $chart->labels($label);
        $chart->dataset('Orders', 'line', $dataset);
        // $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        // dd($chart);

        return view('dashboard.index', compact('chart', 'count_product', 'count_order', 'count_member', 'incomes', 'topsellingproduct'));
    }
}
