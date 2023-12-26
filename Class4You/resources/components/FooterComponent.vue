<template>
    <div v-if="$route.fullPath.indexOf('classwatch') === -1">
        <footer>
            <div class="footer_main">

                <div class="footer_info">
                    <div class="footer_info_btn_div">
                        <ul class="footer_info_btn">
                            <li>
                                <a href="">
                                    <img src="" alt="">
                                </a>
                            </li>
                            <li>
                                <p>개인정보처리방침 |</p>
                            </li>
                            <li>
                                <p>| 이용약관</p>
                            </li>
                        </ul>
                    </div>
                    <div class="footer_info_buttom">
                        <p>(주)그린컴퓨터아카데미 | 대표자: 정명호 | 사업자번호: 001-81-000000 사업자 정보 확인</p>
                        <p>통신판매업: 2023-대구중구중앙로B-0062 | 개인정보보호책임자: 정명호 | 이메일: info@inflearn.com</p>
                        <p>주소: 대구 중구 중앙대로394 제일빌딩 5F</p>
                        <p>©INFLAB. ALL RIGHTS RESERVED</p>
                    </div>
                </div>

            </div>
        </footer>
    </div>
</template>
<script>

export default {
    name: 'FooterComponent'
}
</script>
<style>
    
</style>