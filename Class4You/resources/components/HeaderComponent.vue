<template>
    <div v-if="$route.fullPath.indexOf('classwatch') === -1 && $route.fullPath.indexOf('loading') === -1">
    <!-- <div v-if="$route.fullPath !== '/classwatch/' && $route.fullPath !== '/classwatch'"> -->
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
                    <li><a href="/board">커뮤니티</a></li>
                    <!-- <button type="button" @click="logoutWithKakao" style="cursor: pointer;">카카오톡 로그아웃</button> -->
                </ul>
                <h1>
                    <a href="/">
                        <img src="/img/Logo.png" alt="">
                    </a>
                </h1>
                <div v-if="!$store.state.userLoginChk" class="side_nav">
                    <!-- <router-link to="/registration">SIGN UP</router-link> -->
                    <a href="/registration">SIGN UP</a>
                    <a @click="loginOpenModal" style="cursor: pointer;">LOGIN</a>
                    <!-- <div class="search_box">
                        <input type="text" placeholder="SEARCH">
                        <button><img src="/img/SEARCH.png" alt=""></button>
                    </div> -->
                </div>
                <div v-if="$store.state.userLoginChk" class="side_nav">
                    <!-- <router-link to="/">MY PAGE</router-link> -->
                    <a href="/usermypage">MY PAGE</a>
                    <a @click="logout" style="cursor: pointer;">LOGOUT</a>
                    <!-- <div class="search_box">
                        <input type="text" placeholder="SEARCH">
                        <button><img src="/img/SEARCH.png" alt=""></button>
                    </div> -->
                </div>
            </div>
        </header>

        <div class="login_modal_bk" v-if="loginShowModal">
            <div class="login_modal">
                <div class="login_modal_cancel">
                    <img style="cursor: pointer;" src="/img/modal_cancel.png" alt="" @click="loginCloseModal">
                </div>
                <div class="login_modal_logo">
                    <img src="/img/Logo.png" alt="">
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
                    <!-- <span><a href="">비밀번호 찾기</a></span>
                    <span>&#124;</span> -->
                    <span><a href="/registration">회원가입 하기</a></span>
                </div>
                <div class="login_modal_easy_box">
                    <p>간편 로그인</p>
                </div>
                <div class="login_modal_button">
                    <button type="button" @click="loginWithKakao" style="cursor: pointer;">카카오톡 로그인</button>
                    
                </div>
            </div>
        </div>

    </div>
</template>
<script>
import { defineComponent } from "vue";
import { Carousel, Pagination, Slide, Navigation } from "vue3-carousel";
import Swal from 'sweetalert2';


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

    mounted() {
        axios.get('/getUserData')
        .then(response2 => {
            if (response2.data.userChk) {
                Swal.fire({
                    icon: 'success',
                    title: '로그인 성공',
                    text: '로그인에 성공했습니다.',
                    confirmButtonText: '확인'
                })
                console.log(response2);
                this.$store.commit('setSaveToLocalStorage', response2.data);
                this.$store.commit('setUserLoginChk', response2.data.sessionDataCheck);
                this.$store.commit('setUserID', response2.data.userId);
            }

        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
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
        loginWithKakao() {
            axios.get('/login/kakao/callback')
            // .then(response => {
            //     // 서버에서 받은 응답(response)을 이용한 로직 수행
            //     console.log(response.data);

            //     // 리다이렉션 등 필요한 작업 수행
            //     if (response.data.success) {
            //     // 로그인이 성공하면 홈페이지로 이동
            //     this.$router.push('/');
            //     } else {
            //     // 로그인 실패 등의 경우 처리
            //     alert('로그인에 실패했습니다.');
            //     }
            // })
            // .catch(error => {
            //     // 오류 처리
            //     console.error('에러 발생:', error);
            // });
            location.href='/login/kakao?before_url=' + window.location.pathname;
            
        },
        logoutWithKakao() {
            location.href='/logout/kakao/callback';
        }
    }
}
</script>
<style>

</style>