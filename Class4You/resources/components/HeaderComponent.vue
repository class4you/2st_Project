<template>
    <div>
        <div id="top_banner" class="top_banner">
            <div class="desc">
                <ul id="list_txt" class="list_txt">
                    <Carousel ref="carousel" :autoplay="autoplayDuration" :wrap-around="true">
                        <Slide v-for="slide in top_banners" :key="slide.id">
                            <li><a href="">{{ slide }}</a></li>
                        </Slide>
                    </Carousel>
                </ul>
            </div>
        </div>

        <header id="header" style="border-bottom: 0.5px solid rgba(114, 114, 114, 0.1);">
            <div class="navigation">
                <ul class="nav_left side_nav">
                    <li><a href="" class="menu_btn"><img src="/img/menu.png" alt="">전체 강의</a>
                        <ul class="dropdown">
                            <li><a href="/classBoard/HTML">HTML</a></li>
                            <li><a href="/classBoard/CSS">CSS</a></li>
                            <li><a href="/classBoard/JavaScript">Java Script</a></li>
                            <li><a href="/classBoard/PHP">PHP</a></li>
                            <li><a href="/classBoard/JAVA">JAVA</a></li>
                            <li><a href="/classBoard/DataBase">DataBase</a></li>
                            <!-- 필요한 만큼 강의 항목을 추가 -->
                        </ul>
                    </li>
                    <!-- <li><a href="">추천 강의</a></li> -->
                    <!-- <li><a href="">신규 강의</a></li> -->
                    <li>|</li>
                    <li><a href="/Board/">커뮤니티</a></li>
                </ul>
                <h1>
                    <a href="/">
                        <img src="/img/Logo.png" alt="">
                    </a>
                </h1>
                <div v-if="!$store.state.userLoginChk" class="side_nav">
                    <router-link to="/registration">SIGN UP</router-link>
                    <a @click="loginOpenModal" style="cursor: pointer;">LOGIN</a>
                    <div class="search_box">
                        <input type="text" placeholder="SEARCH">
                        <button><img src="/img/SEARCH.png" alt=""></button>
                    </div>
                </div>
                <div v-if="$store.state.userLoginChk" class="side_nav">
                    <router-link to="/">MY PAGE</router-link>
                    <a @click="logout" style="cursor: pointer;">LOGOUT</a>
                    <div class="search_box">
                        <input type="text" placeholder="SEARCH">
                        <button><img src="/img/SEARCH.png" alt=""></button>
                    </div>
                </div>
            </div>
        </header>

        <div class="login_modal_bk" v-if="loginShowModal">
            <div class="login_modal">
                <div class="login_modal_cancel">
                    <img style="cursor: pointer;" src="/img/modal_cancel.png" alt="" @click="loginCloseModal">
                </div>
                <div class="login_modal_logo">
                    <img src="/img/v2_14378e7f2adb0ec0ad8cddaaf3b0fbdd_0DXltiM6xt_top.jpg" alt="">
                </div>
                <div class="login_modal_input_box">
                    <input type="email" placeholder="이메일" name="UserEmail" v-model="frmUserLoginData.UserEmail">
                    <input type="password" placeholder="비밀번호" name="UserPassword" v-model="frmUserLoginData.UserPassword">
                </div>
                <div class="login_error_message"></div>
                <div class="login_modal_button">
                    <button type="button" @click="submitUserLoginData()" style="cursor: pointer;">로그인</button>
                </div>
                <div class="login_modal_find_box">
                    <span><a href="">비밀번호 찾기</a></span>
                    <span>&#124;</span>
                    <span><a href="">회원가입 하기</a></span>
                </div>
                <div class="login_modal_easy_box">
                    <p>간편 로그인</p>
                </div>
                <div class="login_modal_easy_login">

                </div>
            </div>
        </div>

    </div>
</template>
<script>
import { defineComponent } from "vue";
import { Carousel, Pagination, Slide, Navigation } from "vue3-carousel";


import "vue3-carousel/dist/carousel.css"; 
export default {
    name: 'HeaderComponent',

    components: {
		Carousel,
		Slide,
		Pagination,
        Navigation
	},

    data() {
        return {
            // loginShowModal: false,

            frmUserLoginData: {
                UserEmail: '',
                UserPassword: '',
            },

            top_banners: ['새로운 온라인 클래스 오픈', '풀스택 개발자를 위한 과정', '지금 결제 시 무료 강의 오픈', '오픈 찬스 지금 당장 확인하세요',],
            autoplay: true,
            autoplayDuration: 5000,
        }
    },

    created() {
        this.loadUserLoginStatus();
    },

    computed: {
        loginShowModal() {
            return this.$store.state.loginShowModal;
        },
    },

    methods: {
        loginOpenModal() {
            this.$store.commit('setOpenLoginModal');
        }, 
        loginCloseModal() {
            this.$store.commit('setCloseLoginModal');
        },
        submitUserLoginData() {
            this.$store.dispatch('submitUserLoginData', this.frmUserLoginData);
        },
        logout() {
            this.$store.dispatch('logout');
            localStorage.clear();
        },
        loadUserLoginStatus() {
            const userLoginChk = localStorage.getItem('userCheck');
            const UserID = localStorage.getItem('UserID');
            if (userLoginChk !== null) {
                this.$store.commit('setUserLoginChk', userLoginChk);
                this.$store.commit('setUserID', UserID);
            }
        },
    }
}
</script>
<style>

</style>