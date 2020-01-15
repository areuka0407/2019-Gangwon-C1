<div id="booth-map">
    <div class="container padding">
        <div class="section-header">
            <h1>Booth Map</h1>
            <h5>부스 배치도</h5>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="event">행사일정</label>
                    <select name="event" id="event" class="form-control">
                        <?php foreach($eventList as $event):?>
                            <option value="<?=$event->id?>" data-image="<?=$event->image?>"><?=$event->start_date?> ~ <?=$event->end_date?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="col-md-8 offset-md-1">
                <img id="map-image" src="<?=$eventList[0]->image?>" alt="Event-BoothMap">
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <table id="show-table" class="table">
                <thead>
                    <tr>
                        <th>참가업체명</th>
                        <th>부스번호</th>
                        <th>전시품목</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($boothList) === 0):?>
                        <tr>
                            <td colspan="3">해당 행사에 참여한 업체를 찾을 수 없습니다.</td>
                        </tr>
                    <?php endif;?>
                    <?php foreach($boothList as $booth):?>
                        <tr>
                            <td><?=$booth->user_name?></td>
                            <td><?=$booth->code?></td>
                            <td><?=$booth->product?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = () => {
        document.querySelector("#event").addEventListener("change", e => {
            document.querySelector("#map-image").src = e.target.selectedOptions[0].dataset.image;

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "/api/take-booth/by-event/" + e.target.value);
            xhr.send();
            xhr.onload = () => {
                let res = JSON.parse(xhr.responseText);
                $("#show-table tbody").html("");

                let data = res.filter(x => x.u_id);

                data.length === 0 && $("#show-table tbody").html("<tr><td colspan=\"3\">해당 행사에 참여한 업체를 찾을 수 없습니다.</td></tr>");
                data.forEach(item => {
                    let row = $(`<tr>
                                        <td>${item.user_name}</td>
                                        <td>${item.code}</td>
                                        <td>${item.product}</td>
                                    </tr>`);
                    $("#show-table tbody").append(row);
                });
            }
        });
    };
</script>