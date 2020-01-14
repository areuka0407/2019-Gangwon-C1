<?php
namespace Controller;

use App\DB;

class AdminController {
    function siteManage(){
        view("admin-sitemanage");
    }

    function act_sitemanage(){
        emptyCheck();
        extract($_POST);

        $start_time = strtotime($start_date);
        $end_time = strtotime($end_date);

        if($start_time > $end_time) return back("시작일은 종료일 이후에 이뤄질 수 없습니다.");
        
        $overlap = DB::fetch("SELECT * FROM events 
                              WHERE (start_date <= timestamp(?) AND timestamp(?) <= end_date)
                              OR (start_date <= timestamp(?) AND timestamp(?) <= end_date)
                              OR (timestamp(?) <= start_date AND start_date <= timestamp(?))
                              OR (timestamp(?) <= end_date AND end_date <= timestamp(?))", [$start_date, $start_date, $end_date, $end_date, $start_date, $end_date, $start_date, $end_date]);
        if($overlap) return back("중복되는 일정이 있어, 추가할 수 없습니다.");

        DB::query("INSERT INTO events(image, start_date, end_date, join_count) VALUES (?, ?, ?, ?)", [$layout, $start_date, $end_date, $join_count]);
        
        go("/", "새로운 일정이 추가되었습니다.");
    }
}