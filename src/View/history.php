<style>
    #history .history-list {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    #history .item { width: 100%; padding: 20px 0; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; }
    #history .item > img { flex: 0 0 400px; }
    #history .item > .title { width: 100%; font-weight: bold; color: var(--bluegreen); }

    #history .item:nth-child(2n) { flex-direction: row-reverse; }
    #history .item:nth-child(2n) > .title { text-align: right; color: var(--blue); }

</style>
<div id="history">
    <div class="container padding">
        <div class="section-header">
            <h1>HISTORY</h1>
            <h5>축제 연혁</h5>
        </div>
        <div class="history-list">
            <?php foreach($histories as $history):?>
                <div class="item">
                    <h4 class="title mb-5"><?=$history->title?></h4>
                    <img class="col-md-3" src="<?=$history->image?>" alt="history-image">
                    <table class="table col-md-8 mt-4">
                        <tbody>
                            <tr>
                                <td>주제</td>
                                <td><?=$history->title?></td>
                            </tr>
                            <tr>
                                <td>장소</td>
                                <td><?=$history->space?></td>
                            </tr>
                            <tr>
                                <td>기간</td>
                                <td><?=$history->date?></td>
                            </tr>
                            <tr>
                                <td>주최</td>
                                <td><?=$history->sponsor?></td>
                            </tr>
                            <tr>
                                <td>주관</td>
                                <td><?=$history->supervisor?></td>
                            </tr>
                            <tr>
                                <td>참가업체</td>
                                <td><?=$history->companies?></td>
                            </tr>
                            <tr>
                                <td>관람인원</td>
                                <td><?=$history->viewCount?></td>
                            </tr>
                            <tr>
                                <td>전시품목</td>
                                <td><?=$history->viewItem?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>