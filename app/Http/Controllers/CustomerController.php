<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Contracts\Support\Jsonable;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function Show() : View{
        $current_records = Customer::all();
        return view('customers', compact('current_records'));
    }

    public function paginationManual() : View {
        $records_per_page = 10;
        $current_page = request()->get('page', 1);
        $starting_record = ($current_page - 1) * $records_per_page;
        $all_records = Customer::take(100)->get();
        $current_records = Customer::skip($starting_record)->take($records_per_page)->get();

        $paginator = new LengthAwarePaginator(
            $current_records,
            $all_records->count(),
            $records_per_page,
            $current_page,
            
            ['path' => url()->current()]
        );

        return view('customers', compact('current_records','paginator'));
    }

    public function paginationQueryBuilder() : View{
        $current_records = DB::table('customers')->paginate(10);

        return view('customers', compact('current_records'));
    }

    public function paginationQueryBuilderSimplePaginate() : View{
        $current_records = DB::table('customers')->simplePaginate(10);

        return view('customers', compact('current_records'));
    }

    public function paginationEloquent() : View{
        $current_records = Customer::where('gender','M')->orderBy('dob','desc')->Paginate(10);
        return view('customers', compact('current_records'));
    }

    public function paginationAJAX(Request $request): View{
        $current_records = Customer::take(100)->paginate(10);
        
        if($request->ajax()){
            return view('customers', compact('current_records'));
        }

        return view('customers', compact('current_records'));
    }
}
