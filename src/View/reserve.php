<div id="reserve">
    <div class="padding container">
        <div class="section-header">
            <h1>Reservation</h1>
            <h5>예매하기</h5>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-4 px-5">
                <form method="post">
                    <div class="form-group">
                        <label for="event">행사 일정</label>
                        <select name="e_id" id="event" class="form-control">
                            <?php foreach($eventList as $event):?>
                                <option value="<?=$event->id?>"><?=date("Y-m-d", strtotime($event->start_date))?> ~ <?=date("Y-m-d", strtotime($event->end_date))?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <button class="button btn-blue">예매하기</button>
                </form>
            </div>
            <div class="col-md-6">
                <img id="graph" src="/reserve/graph/<?=$eventList[0]->id?>" alt="graph">
            </div>
            <div class="col-md-12 p-5">
                <h5 class="font-weight-bold">예매한 행사 목록</h5>
                <table class="table text-center mt-4">
                    <thead>
                        <tr>
                            <th>행사 일정</th>
                            <th>예매일</th>
                            <th>예매 취소</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($reserveList as $item):?>
                            <tr>
                                <td><?=date("Y-m-d", strtotime($item->start_date))?> ~ <?=date("Y-m-d", strtotime($item->end_date))?></td>
                                <td><?=date("Y년 m월 d일", strtotime($item->reserve_date))?></td>
                                <td><a href="/reserve/cancel/<?=$item->id?>">×</a></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener("load", e => {
        document.querySelector("#event").addEventListener("change", e => {
            document.querySelector("#graph").src = "/reserve/graph/" + e.target.value;
        });
    });
</script>