<?php

namespace Database\Seeders;

use App\Models\DailyReportDetail;
use Carbon\Carbon;
use App\Models\User;
use Carbon\CarbonPeriod;
use App\Models\DailyReport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DailyReportSeeder extends Seeder
{
    
    public function run(): void
    {
        $user = User::where('email', "test@gmail.com")->first();
        if(isset($user)){
            $from_date = Carbon::today()->subDays(30)->format('Y-m-d');
            $to_date = Carbon::today()->format('Y-m-d');
            $period = CarbonPeriod::create($from_date, $to_date);

            $work = array(
                //good level
                [
                    [
                        'from'              => "05:30",
                        'to'                => "06:30",
                        'work_hour'         => "1.00",
                        'work'              => "Exercise",
                    ],
                    [
                        'from'              => "07:30",
                        'to'                => "08:30",
                        'work_hour'         => "1.00",
                        'work'              => "Book Read",
                    ],
                    [
                        'from'              => "09:30",
                        'to'                => "11:00",
                        'work_hour'         => "1.50",
                        'work'              => "Work on daily task",
                    ],
                    [
                        'from'              => "13:30",
                        'to'                => "15:30",
                        'work_hour'         => "2.00",
                        'work'              => "Work on new project",
                    ],
                    [
                        'from'              => "17:00",
                        'to'                => "18:30",
                        'work_hour'         => "1.50",
                        'work'              => "Learn English",
                    ]
                ],
                //modarate level
                [
                    [
                        'from'              => "05:30",
                        'to'                => "06:00",
                        'work_hour'         => "0.50",
                        'work'              => "Exercise",
                    ],
                    [
                        'from'              => "07:30",
                        'to'                => "08:30",
                        'work_hour'         => "1.00",
                        'work'              => "Book Read",
                    ],
                    [
                        'from'              => "13:30",
                        'to'                => "14:30",
                        'work_hour'         => "1.00",
                        'work'              => "Work on new project",
                    ],
                    [
                        'from'              => "17:00",
                        'to'                => "17:30",
                        'work_hour'         => "0.50",
                        'work'              => "Learn English",
                    ]
                ],
                //low level
                [
                    [
                        'from'              => "05:30",
                        'to'                => "06:00",
                        'work_hour'         => "0.50",
                        'work'              => "Exercise",
                    ],
                    [
                        'from'              => "07:30",
                        'to'                => "08:00",
                        'work_hour'         => "0.50",
                        'work'              => "Book Read",
                    ],
                    
                    [
                        'from'              => "13:30",
                        'to'                => "13:45",
                        'work_hour'         => "0.25",
                        'work'              => "Work on new project",
                    ],
                    [
                        'from'              => "17:00",
                        'to'                => "17:15",
                        'work_hour'         => "0.25",
                        'work'              => "Learn English",
                    ]
                ]
            );
            foreach($period as $date){
                $report = DailyReport::create([
                    'user_id'           => $user->id,
                    'date'              => $date->format('Y-m-d'),
                ]);

                $type = rand(0,2);
                foreach($work[$type] as $data){
                    DailyReportDetail::create([
                        'report_id'     => $report->id,
                        'from'          => $data['from'],
                        'to'            => $data['to'],
                        'work_hour'     => $data['work_hour'],
                        'work'          => $data['work'],
                    ]);
                }

                $total_work_hour = DailyReportDetail::where('report_id', $report->id)->sum('work_hour');
                DailyReport::find($report->id)->update([
                    'work_hour' => $total_work_hour
                ]);
            }

        }
    }
}
