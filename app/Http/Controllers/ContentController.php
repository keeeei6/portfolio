<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $contents = DB::table('categories')
        ->where('user_id', Auth::id())
        ->select('id','month')
        ->get();
        
        

        return view('content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = new Category;

        $content->income = $request->input('income');
        $content->rent = $request->input('rent');
        $content->utility = $request->input('utility');
        $content->credit = $request->input('credit');
        $content->etc = $request->input('etc');
        $content->month = $request->input('month');
        $content->user_id = $request->user()->id;

        $content->save();

        return redirect('content');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Category::find($id);
        //固定出費合計
        $cost = $content->rent + $content->utility + $content->credit + $content->etc;
        //自由に使えるお金
        $wants = ($content->income - $cost)*0.6;
        //貯金
        $saving = $content->income - $cost - $wants;
        //グラフ用
        $cost_proportion = $cost / $content->income;
        $cost_proportion = round($cost_proportion, 2)*100;
        $wants_proportion = $wants / $content->income;
        $wants_proportion = round($wants_proportion, 2)*100;
        $saving_proportion = $saving / $content->income;
        $saving_proportion = round($saving_proportion, 2)*100;

        return view('content.show', 
        compact('content','cost', 'wants', 'saving','cost_proportion','wants_proportion', 'saving_proportion'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Category::find($id);

        return view('content.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $content = Category::find($id);

        $content->income = $request->input('income');
        $content->rent = $request->input('rent');
        $content->utility = $request->input('utility');
        $content->credit = $request->input('credit');
        $content->etc = $request->input('etc');
        $content->month = $request->input('month');

        $content->save();

        return redirect('content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
