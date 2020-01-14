<div id="JOIN" class="mb-5 pb-5">
    <div class="container">
        <div class="padding">
            <div class="section-header center">
                <h1>JOIN</h1>
                <h5>회원가입</h5>
            </div>
            <form method="post" class="col-md-6 offset-md-3 mt-5">
                <div class="form-group">
                    <label for="user_id">아이디</label>
                    <input type="text" id="user_id" name="user_id" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="passconf">비밀번호 재확인</label>
                    <input type="password" id="passconf" name="passconf" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user_name">이름/업체명</label>
                    <input type="text" id="user_name" name="user_name" class="form-control">
                </div>
                <div class="form-group mt-5">
                    <label class="pr-5">회원 구분</label>
                    <label for="normal">일반 회원 <input type="radio" id="normal" name="user_type" value="normal" checked></label>
                    <label for="company" class="pl-3">기업 회원 <input type="radio" id="company" name="user_type" value="company"></label>
                </div>
                <button class="button btn-blue w-100 mt-4">로그인</button>
                <a href="/users/login" class="text-muted mt-3 d-inline-block">이미 계정이 있으신가요?</a>
            </form>
        </div>
    </div>
</div>