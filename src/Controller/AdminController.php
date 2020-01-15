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


        // Event 추가
        DB::query("INSERT INTO events(image, start_date, end_date, join_count) VALUES (?, ?, ?, ?)", [$layout, $start_date, $end_date, $join_count]);

        $lid = DB::lastInsertId();


        // Event_Booth 추가
        foreach(json_decode($booths) as $booth){
            DB::query("INSERT INTO event_booths(code, e_id, size) VALUES ( ?, ?, ?)", [$booth->name, $lid, $booth->size]);
        }
        
        go("/", "새로운 일정이 추가되었습니다.");
    }


    function application(){
        $data = [
            "eventList" => DB::fetchAll("SELECT * FROM events WHERE NOW() < start_date ORDER BY start_date ASC"),
            "applyList" => DB::fetchAll("SELECT B.*, E.start_date, E.end_date FROM event_booths B LEFT JOIN events E ON E.id = B.e_id WHERE B.u_id = ?", [user()->id])
        ];

        view("admin-application", $data);
    }

    function act_application(){
        emptyCheck();
        extract($_POST);

        $find = DB::fetch("SELECT * FROM event_booths WHERE id = ?", [$b_code]);
        if(!$find) return back("해당 부스를 찾을 수 없습니다.");
        
        DB::query("UPDATE event_booths SET u_id = ?, product = ?, apply_date = NOW() WHERE id = ?", [user()->id, $product, $b_code]);

        go("/admin/booth-application", "신청이 완료되었습니다.");
    }


    /**
     * API
     */

     function takeBoothByEvent($e_id){
         return json_response(DB::fetchAll("SELECT * FROM event_booths WHERE e_id = ?", [$e_id]));
     }
}