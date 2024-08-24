<?php

namespace App\Http\Controllers\Web;

use Carbon\CarbonPeriod;
use App\Models\DailyReport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\DailyReportDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $recent = DailyReport::where('user_id', $user->id)->with('details')->orderBy('date', 'desc')->first();
        if(isset($recent)){
            $recent->total_work_time = convertTimeIntoHourMinute($recent->work_hour);
            $recent->details->each(function($detail){
                $detail['work_time'] = convertTimeIntoHourMinute($detail->work_hour);
            });
        }

        if($request->ajax()){
            $from   = $request->start;
            $to     = $request->end;

            $report = DailyReport::where('user_id', $user->id)->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('date', 'desc')->get();

            $datatable = DataTables::of($report)
            ->addIndexColumn()
            ->addColumn('report_date', function($report){
                $date= date('d M y', strtotime($report->date));
                $data = '<button onclick="showData('.$report->id.')" class="text-primary fw-bold" id="dateTextBtn">'.$date.'</button>';
                return $data;
            })
            ->addColumn('status', function($report){
                if($report->work_hour >= 2){
                    $status = '<span class="badge text-bg-success">Good</span>';
                }
                elseif($report->work_hour <= 1){
                    $status = '<span class="badge text-bg-danger">Poor</span>';
                }
                else{
                    $status = '<span class="badge text-bg-warning">Moderate</span>';
                }
                return $status;
            })
            ->addColumn('work_time', function($row){
                $time = convertTimeIntoHourMinute($row->work_hour);
                return $time;
            })
            ->addColumn('action', function($row){
                $status = '<button class="btn btn-lg btn-icon" onclick="editData('.$row->id.')" title="Edit"><i class="bi bi-pencil-square"></i></button>';
                $status = $status .'<button class="btn btn-lg btn-icon" onclick="deleteData('.$row->id.')"  title="Delete"><i class="bi bi-trash"></i></button>';
                return $status;
            })
            ->rawColumns(['report_date','status','action'])
            ->with('chart', $report)
            ->make(true);
            return $datatable;
        }

        return view('web.dashboard.dashboard', compact('recent'));
    }


    function getData(Request $request){
        $user = Auth::user();

        $from   = $request->start_date;
        $to     = $request->end_date;

        //datatable
        $report = DailyReport::where('user_id', $user->id)->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->orderBy('date', 'desc')->get();
        $datatable = DataTables::of($report)
        ->addIndexColumn()
        ->addColumn('report_date', function($report){
            $date= date('d M y', strtotime($report->date));
            $data = '<button onclick="showData('.$report->id.')" class="text-primary fw-bold" id="dateTextBtn">'.$date.'</button>';
            return $data;
        })
        ->addColumn('status', function($report){
            if($report->work_hour >= 2){
                $status = '<span class="badge text-bg-success">Good</span>';
            }
            elseif($report->work_hour <= 1){
                $status = '<span class="badge text-bg-danger">Poor</span>';
            }
            else{
                $status = '<span class="badge text-bg-warning">Moderate</span>';
            }
            return $status;
        })
        ->addColumn('work_time', function($row){
            $time = convertTimeIntoHourMinute($row->work_hour);
            return $time;
        })
        ->addColumn('action', function($row){
            $status = '<button class="btn btn-lg btn-icon" onclick="editData('.$row->id.')" title="Edit"><i class="bi bi-pencil-square"></i></button>';
            $status = $status .'<button class="btn btn-lg btn-icon" onclick="deleteData('.$row->id.')"  title="Delete"><i class="bi bi-trash"></i></button>';
            return $status;
        })
        ->rawColumns(['report_date','status','action'])
        ->make(true);

        //chart
        $from_date = Carbon::parse($from)->format('Y-m-d');
        $to_date = Carbon::parse($to)->format('Y-m-d');


        $period = CarbonPeriod::create($from_date, $to_date);

        $reportData= [];
        foreach($report as $rep){
            $reportData[$rep['date']] = $rep['work_hour'];
        }

        // add work hour in the date range
        $result=[];
        foreach ($period as $date) {
             $date = $date->format('Y-m-d');
            $result[] = [
                'date' => $date,
                'work_hour' => isset($reportData[$date]) ? $reportData[$date] : 0,
            ];
        }



        //dashboard data
        $total_work_hour = DailyReport::where('user_id', $user->id)->whereDate('date', '>=', $from)->whereDate('date', '<=', $to)->sum('work_hour');
        $work_hour = convertTimeIntoHourMinute($total_work_hour);
        $days = count($period);
        $avarage_day_work = number_format($total_work_hour/$days, 2);
        $day_work_perecent = number_format(($avarage_day_work/24)*100, 2); 
        $day_work = (convertTimeIntoHourMinute($avarage_day_work));

        $report = array(
            'total_work_hour'   => !empty($work_hour) ? $work_hour : 0,
            'avarage_day_work'  => !empty($day_work) ? $day_work : 0,
            'work_percentage'   => $day_work_perecent
        );
        
        return sendResponse(200, "Data fatched successfully", ['datatable' => $datatable, 'chart'=> $result, 'report' => $report]);
    }

    
    



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'date'  => 'bail|required|date_format:Y-m-d',
            'start' => 'bail|required|array',
            'start.*' => 'bail|required|date_format:H:i',
            'end'   => 'bail|required|array',
            'end.*'   => 'bail|required|date_format:H:i',
            'work'  => 'bail|required|array',
            'work.*'  => 'bail|required|string',
        ]);

        if($validation->fails()){
            return sendResponse(400, $validation->errors()->first(), null);
        }

        for($i=0; $i < count($request->start); $i++){
            $startTime = Carbon::parse($request->start[$i]);
            $endTime    = Carbon::parse($request->end[$i]);
            if($startTime >= $endTime){
                return sendResponse(400, "Start time should not be equal or greater than End time in work ".$i+1, null);
            }
        }

        $user = Auth::user();

        if(isset($request->id)){
            $report = DailyReport::where('id', $request->id)->where('user_id', $user->id)->first();
            if(isset($report)){
                if(isset($request->report_detail_id) && count($request->report_detail_id) > 0){
                    $validation = Validator::make($request->all(), [
                        'report_detail_id'     => 'bail|required|array',
                        'report_detail_id.*'   => 'bail|nullable|integer|exists:daily_report_details,id'
                    ]);
            
                    if($validation->fails()){
                        return sendResponse(400, $validation->errors()->first(), null);
                    }

                    #delete which report detail ids not present in the request
                    $ids= DailyReportDetail::where('report_id', $report->id)->pluck('id')->toArray();
                    $diff = array_diff($ids, $request->report_detail_id);
                    DailyReportDetail::whereIn('id', $diff)->delete();
                }
                else{
                    DailyReportDetail::where('report_id', $report->id)->delete();
                }
                    
                for($i=0; $i < count($request->start); $i++){
                    $startTime      = Carbon::parse($request->start[$i]);
                    $endTime        = Carbon::parse($request->end[$i]);
                    $work_minutes   = $endTime->diffInMinutes($startTime);
                    $work_hour      = number_format($work_minutes/60, 2);

                    if(isset($request->report_detail_id[$i])){
                        DailyReportDetail::find($request->report_detail_id[$i])->update([
                            'from'          => isset($request->start[$i]) ? $request->start[$i] : "",
                            'to'            => isset($request->end[$i]) ? $request->end[$i] : "",
                            'work_hour'     => $work_hour > 0 ? $work_hour : 0,
                            'work'          => isset($request->work[$i]) ? $request->work[$i] : "",
                        ]);
                    }
                    else{
                        DailyReportDetail::create([
                            'report_id'     => isset($report->id) ? $report->id : "",
                            'from'          => isset($request->start[$i]) ? $request->start[$i] : "",
                            'to'            => isset($request->end[$i]) ? $request->end[$i] : "",
                            'work_hour'     => $work_hour > 0 ? $work_hour : 0,
                            'work'          => isset($request->work[$i]) ? $request->work[$i] : "",
                        ]);
                    }
                }

                $total_work_hour = DailyReportDetail::where('report_id', $report->id)->sum('work_hour');
                $report->update([
                    'date'      => $request->date,
                    'work_hour' => $total_work_hour
                ]);
                return sendResponse(200, "Daily Report Updated Successfully", null);
            }
            else{
                return sendResponse(400, "Invalid Request", null);
            }
        }
        else{
            $check = DailyReport::where('user_id', $user->id)->where('date', $request->date)->first();
            if(isset($check)){
                return sendResponse(400, "Report already available on provided date", null);
            }
            
            $report = DailyReport::create([
                'user_id'   => $user->id,
                'date'      => $request->date,
            ]);

            for($i=0; $i < count($request->start); $i++){
                $startTime      = Carbon::parse($request->start[$i]);
                $endTime        = Carbon::parse($request->end[$i]);
                $work_minutes   = $endTime->diffInMinutes($startTime);
                $work_hour      = number_format($work_minutes/60, 2);

                #insert report details
                DailyReportDetail::create([
                    'report_id'     => isset($report->id) ? $report->id : "",
                    'from'          => isset($request->start[$i]) ? $request->start[$i] : "",
                    'to'            => isset($request->end[$i]) ? $request->end[$i] : "",
                    'work_hour'     => $work_hour > 0 ? $work_hour : 0,
                    'work'          => isset($request->work[$i]) ? $request->work[$i] : "",
                ]);
            }
            #update total hours in report
            $total_work_hour = DailyReportDetail::where('report_id', $report->id)->sum('work_hour');
            DailyReport::find($report->id)->update([
                'work_hour' => $total_work_hour
            ]);
            return sendResponse(200, "Daily Report Submitted Successfully", null);
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_id = Auth::id();
        $report = DailyReport::where('id', $id)
        ->where('user_id', $user_id)
        ->with(['details'])
        ->first();

        if(isset($report)){
            $report->total_work_time = convertTimeIntoHourMinute($report->work_hour);
            $report->details->each(function($detail){
                $detail['work_time'] = convertTimeIntoHourMinute($detail->work_hour);
            });
            return $report;
        }
        else{
            return sendResponse(400, "Invalid Request", null);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_id = Auth::id();
        $report = DailyReport::where('id', $id)->where('user_id', $user_id)->first();
        if(isset($report)){
            $report->delete();
            return sendResponse(200, "Report Deleted Successfully", null);
        }
        else{
            return sendResponse(400, "Invalid Request", null);
        }
    }
}
