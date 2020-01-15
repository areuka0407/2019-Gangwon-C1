<?php
namespace Controller;

use App\DB;

class ReserveController {
    function reserve(){
        $formatYM = date("Y-m-");
        $tomorrow = (int)date("d") + 1;
        $tomorrow = $formatYM . $tomorrow;

        $data = [
            "eventList" => DB::fetchAll("SELECT * FROM events WHERE end_date > timestamp(?) ORDER BY start_date", [$tomorrow]),
            "reserveList" => DB::fetchAll("SELECT R.*, E.start_date, E.end_date FROM reservations R LEFT JOIN events E ON E.id = R.e_id WHERE R.u_id = ?", [user()->id]),
        ];
        
        view("reserve", $data);
    }

    function act_reserve(){
        emptyCheck();
        extract($_POST);

        $find = DB::fetch("SELECT * FROM events WHERE id = ?", [$e_id]);
        if(!$find) return back("예매할 행사를 찾지 못했습니다.");
        
        DB::query("INSERT INTO reservations(u_id, e_id, reserve_date) VALUES (?, ?, NOW())", [user()->id, $e_id]);
        
        
        go("/reserve", "예매가 완료되었습니다.");
    }

    function cancel_reserve($r_id){

        $find = DB::fetch("SELECT * FROM reservations WHERE id = ?", [$r_id]);
        if(!$find) return back("취소할 예약 목록을 찾지 못했습니다.");
        if($find->u_id !== user()->id) return back("권한이 없습니다.");

        $formatYM = date("Y-m-");
        $tomorrow = (int)date("m") + 1;
        $tomorrow = $formatYM . $tomorrow;

        if(strtotime($tomorrow) > strtotime($find->end_date)) return back("행사종료일이 최소 1일 이상 남아야 취소가 가능합니다.");
        
        DB::query("DELETE FROM reservations WHERE id = ?", [$r_id]);
        go("/reserve", "예매 취소가 완료되었습니다.");
    }   

    function graph_reserve($e_id){
        require_once __ROOT.DS."reserve_graph.php";

        $event = DB::fetch("SELECT join_count FROM events WHERE id = ?", [$e_id]);
        if(!$event) return back("해당 행사 내역을 찾을 수 없습니다.");
        $total = $event->join_count;

        $reserveCount = DB::fetch("SELECT COUNT(*) cnt FROM reservations WHERE e_id = ?", [$e_id])->cnt;
        graph($total, $reserveCount);
    }
}