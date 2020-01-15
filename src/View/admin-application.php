<div id="application">
    <div class="padding container"> 
        <div class="section-header">
            <h1>Booth Application</h1>
            <h5>부스 신청</h5>
        </div>
        <div class="row py-5">
            <div class="col-md-3">  
                <h5 class="font-weight-bold">이용가능한 부스 검색</h5>
                <form class="search-form mt-3" method="post">
                    <div class="form-group">
                        <label for="schedule">행사 일정</label>
                        <select name="schedule" id="schedule" class="form-control">
                            <?php foreach($eventList as $event):?>
                                <option value="<?=$event->id?>" data-start="<?=$event->start_date?>" data-end="<?=$event->end_date?>" data-image="<?=$event->image?>"><?=date("Y-m-d", strtotime($event->start_date))?> ~ <?=date("Y-m-d", strtotime($event->end_date))?></option>
                            <?php endforeach;?>
                            <?php if(count($eventList) === 0):?>
                                <option value="null">참가 가능한 행사가 없습니다.</option>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="b_code">부스 번호</label>
                        <select name="b_code" id="b_code" class="form-control"></select>
                    </div>
                    <div class="form-group">
                        <label for="product">전시 품목</label>
                        <input type="text" class="form-control" id="product" name="product" placeholder="전시할 품목을 작성하세요">
                    </div>
                    <button class="button btn-blue w-100 mt-4">신청하기</button>
                </form>
            </div>
            <div class="col-md-9 d-flex justify-content-center align-items-center">
                <?php if(count($eventList) !== 0):?>
                    <img id="event-map" src="<?=$eventList[0]->image?>" alt="event-map">
                <?php endif;?>
            </div>
        </div>
        <?php if(count($applyList) > 0):?>
            <div class="row py-5 px-2">
                <h5 class="font-weight-bold">부스 신청 목록</h5>
                <table class="table text-center mt-4">
                    <thead>
                        <tr>
                            <th>행사 시작일</th>
                            <th>행사 종료일</th>
                            <th>부스 신청일</th>
                            <th>부스 번호</th>
                            <th>부스 크기</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($applyList as $apply):?>
                            <tr>
                                <td><?=$apply->start_date?></td>
                                <td><?=$apply->end_date?></td>
                                <td><?=$apply->apply_date?></td>
                                <td><?=$apply->code?></td>
                                <td><?=$apply->size?>㎡</td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        <?php endif;?>
    </div>
</div>

<script>
    window.onload = () => {
        let current_schedule = $("#schedule").val();
        reloadBooth(current_schedule);
        

        $("#schedule").on("change", e => {
            $("#event-map")[0].src = e.target.selectedOptions[0].dataset.image;
            reloadBooth(e.target.value);
        });

        function reloadBooth(event_id){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/api/take-booth/by-event/" + event_id);   
            xhr.send();
            xhr.onload = () => {
                $("#b_code").html("");
                let res = JSON.parse(xhr.responseText);
                res.length === 0 && $("#b_code").html("<option>등록 가능한 부스가 없습니다.</option");
                res.forEach(item => {
                    if(item.u_id) return;
                    let option = document.createElement("option");
                    option.value = item.id;
                    option.dataset.size = item.size;
                    option.innerText = item.code;
                    
                    $("#b_code").append(option);
                });  
            };
        }
        
    };
</script>