<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Auth;

class ReportController extends Controller
{
    private $report;

    public function __construct(DailyReport $instanceClass)
    {
        $this->report = $instanceClass;
        $this->middleware('auth');  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('search-month');
        $searches = $this->report->where('user_id', Auth::id())->where('created_at', 'like', '%'.$keyword.'%')->get();
        $reports = $this->report->getAll(Auth::id());
        return view('user.daily_report.index', compact('reports', 'searches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.daily_report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'reporting_time' => 'required',
            'title' => 'required',
            'contents' => 'required',
        ], [
            'reporting_time.required' => ':入力必須の項目です。',
            'title.required' => ':入力必須の項目です。',
            'contents.required' => ':入力必須の項目です。',
        ]);
        $input = $request->all();
        $this->report->reporting_time = now();
        $input['user_id'] = Auth::id();
        $this->report->fill($input)->save();
        return redirect()->to('Report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $report = $this->report->where('user_id', Auth::id())->find($id);
        return view('user.daily_report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $report = $this->report->find($id);
        return view('user.daily_report.edit', compact('report'));
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
        //
        $this->validate($request, [
            'reporting_time' => 'required',
            'title' => 'required',
            'contents' => 'required',
        ], [
            'reporting_time.required' => ':入力必須の項目です。',
            'title.required' => ':入力必須の項目です。',
            'contents.required' => ':入力必須の項目です。',
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->report->find($id)->fill($input)->save();
        return redirect()->to('Report');
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
        $this->report->find($id)->delete();
        return redirect()->to('Report');
    }
    
}
