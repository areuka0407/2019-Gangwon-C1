<link rel="stylesheet" href="/css/site-manage.css">
<div id="s-manage">
    <div class="padding container">
        <div class="inner">
            <div class="section-header">
                <h1>Site Manage</h1>
                <h5>사이트 관리자</h5>
            </div>
        </div>
        <div class="d-flex flex-column align-items-start">
            <div id="canvas" class="w-100 d-flex flex-column align-items-start">
                <div id="sub-line" class="ml-4 d-flex align-items-start justify-content-between">
                    <div class="d-flex">
                        <select id="booth-select" class="select"></select>
                        <span id="view-color" class="ml-3" style="background-color: #f2f200;"></span>
                        <p class="ml-4">
                            지정된 영역:
                            <span id="area-size" class="text-blue ml-2">0</span>
                            ㎥
                        </p>
                    </div>
                    <div>
                        <button id="save-btn" class="button btn-blue ml-5">저장하기</button>
                        <button id="delete-btn" class="button btn-bluegreen ml-1">삭제하기</button>
                    </div>
                </div>
                <div id="viewport" class="mt-1 w-100">
                    <canvas width="830" height="430"></canvas>
                </div>
            </div>
            <div id="type-line" class="w-100">
                <h5 class="line-title mb-3">TYPE</h5>
                <div class="list">
                </div>
            </div>
            <div id="save-line" class="w-100">
                <h5 class="line-title">SAVE</h5>
                <div class="list">
                </div>
            </div>
        </div>
        <form id="execute-form" method="post" class="container mt-5">
            <h3 class="font-weight-bold text-bluegreen d-inline">FORM</h3>
            <p class="text-muted d-inline pl-2">제작한 도면을 사용하기</p>
            <div class="row mt-4">
                <input type="hidden" id="layout" name="layout">
                <div class="form-group col-md-6">
                    <label for="start_date">행사시작일</label>
                    <input type="date" name="start_date" id="start_date" placeholder="다음과 같은 양식으로 입력하세요. (예: 20-01-14)" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="end_date">행사종료일</label>
                    <input type="date" name="end_date" id="end_date" placeholder="다음과 같은 양식으로 입력하세요. (예: 20-01-14)" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="join_count">참관 인원수</label>
                    <div>
                        <input type="text" name="join_count" id="join_count" class="form-control" style="display: inline; width: 150px;"> 명
                    </div>
                </div>
            </div>
            <button class="button btn-blue mt-4">사용하기</button>
        </form>
    </div>
</div>
<script src="/js/data.js"></script>
<script src="/js/App.js"></script>
<script src="/js/Viewport.js"></script>
<script src="/js/Blueprint.js"></script>
<script src="/js/Booth.js"></script>

<script>
    window.onload = () => {
        let manager = new App("#s-manage");

        document.querySelector("#join_count").addEventListener("input", e => {
            e.target.value = e.target.value.replace(/[^0-9]/g, "");
        });

        document.querySelector("#execute-form").addEventListener("submit", e => {
            e.preventDefault();
            
            if(manager.current_view !== null){
                document.querySelector("#layout").value = manager.current_view.toURL(800, 400);
                e.target.submit();
            }
        });
    }
</script>