<template>
    <div>
        <div id="top_banner" class="top_banner">
            <div class="desc">
                <ul id="list_txt" class="list_txt">
                    <li><a href="">새로운 온라인 클래스 STUDY 4 YOU 개설</a></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>

        <header id="header">
            <div class="navigation">
                <ul class="nav_left side_nav">
                    <li><a href="" class="menu_btn"><img src="/img/menu.png" alt="">전체 강의</a>
                        <ul class="dropdown">
                            <li><a href="#">HTML</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">Java Script</a></li>
                            <li><a href="#">PHP</a></li>
                            <li><a href="#">MariaDB</a></li>
                            <!-- 필요한 만큼 강의 항목을 추가 -->
                        </ul>
                    </li>
                    <li><a href="">추천 강의</a></li>
                    <li><a href="">신규 강의</a></li>
                    <li><a href="">|</a></li>
                    <li><a href="">커뮤니티</a></li>
                </ul>
                <h1>
                    <a href="/">
                        <img src="/img/v2_14378e7f2adb0ec0ad8cddaaf3b0fbdd_0DXltiM6xt_top.jpg" alt="">
                    </a>
                </h1>
                <div class="side_nav">
                    <router-link to="/registration">SIGN UP</router-link>
                    <a href="">LOGIN</a>
                    <div class="search_box">
                        <input type="text" placeholder="SEARCH">
                        <button><img src="/img/SEARCH.png" alt=""></button>
                    </div>
                </div>
            </div>
        </header>
        <hr>
    </div>
</template>
<script>
export default {
    name: 'HeaderComponent'
}
</script>
<style>
    @import url('/css/common.css');
</style>