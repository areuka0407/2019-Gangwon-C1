<?php
namespace Controller;

use App\DB;

class MainController {
    static function notFound(){
        echo "<h1>페이지를 찾을 수 없습니다!</h1><p>돌아가시려면 <a href=\"/\">이곳</a>을 클릭하세요</p>";
    }

    function index(){
        view("index");
    }

    function info(){
        view("info");
    }

    function history(){
        $read = file_get_contents(__PUBLIC.DS."history.json");
        $json_data = json_decode($read);
        $dataList = [];

        /**
         * 0: 이미지 데이터,
         * 1: 주제,
         * 2: 장소,
         * 3: 기간,
         * 4: 주최,
         * 5: 주관,
         * 6: 참가업체,
         * 7: 관람인원,
         * 8: 전시품목
         */

        foreach($json_data as $year => $data){
            $dataList[] = (object)[
                "year" => $year,
                "image" => $data[0],
                "title" => $data[1],
                "space" => $data[2],
                "date" => $data[3],
                "sponsor" => $data[4],
                "supervisor" => $data[5],
                "companies" => $data[6],
                "viewCount" => $data[7],
                "viewItem" => $data[8],
            ];
        }

        view("history", ["histories" => $dataList]);
    }

    function boothMap(){
        $formatYM = date("Y-m-");
        $tomorrow = (int)date("m") + 1;
        $tomorrow = $formatYM . $tomorrow;

        $data = [
            "eventList" => DB::fetchAll("SELECT * FROM events WHERE end_date > timestamp(?) ORDER BY start_date ASC", [$tomorrow]),
            
        ];
        $data['boothList'] = DB::fetchAll("SELECT B.*, U.user_name FROM event_booths B LEFT JOIN users U ON U.id = B.u_id WHERE B.u_id IS NOT NULL AND B.e_id = ?", [ $data['eventList'][0]->id ]);

        view("booth-map", $data);
    }
}