<template>
    <div class="wrapper">
        <!-- <LoadingBar :loading="this.$store.state.loadingStatus"></LoadingBar> -->
        <div class="container">
            <main class="contents">
                <div class="main_mrap">
                    <div class="main_banner_box">
                        <div class="main_visual">
                            <div class="main_visual_slider">
                                <div class="main_visual_slider_list">
                                    <div class="main_visual_slider_track">
                                        <div class="main_visual_slider_track_slick">
                                            <div class="main_visual_slider_track_slick_item">
                                                <Carousel ref="carousel" :autoplay="autoplayDuration" :wrap-around="true" @after-slide="updateIndex">
                                                    <Slide v-for="slide in giftItems" :key="slide.id">
                                                        <a href="">
                                                            <img :src="slide.images[0]">
                                                        </a>
                                                    </Slide>
                                                    <!-- <template #addons>
                                                        <Pagination />
                                                        <div style="margin-bottom: 10px;"></div>
                                                    </template> -->
                                                    <template #addons>
                                                        <Navigation />
                                                        <!-- <Pagination /> -->
                                                    </template>
                                                </Carousel>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="main_nav">
                            <div class="main_nav_num_space">
                                <div class="index-wrapper">
                                    <span class="current-index">{{ currentIndex + 1 }}</span>
                                    /
                                    <span class="total-count">{{ giftItems.length }}</span>
                                </div>
                                <div class="control-wrapper">
                                    <button @click="prevSlide">&#60;</button>
                                    <button @click="toggleAutoplay"> {{ autoplay ? '&#124;&#124;' : '≥' }}</button>
                                    <but @click="nextSlide">&#62;</but   ton>
                                </div>
                            </div>
                            <div class="divider"></div>

                            <div class="main_nav_selection">
                                <div class="main_nav_selection_box">
                                    <span class="main_nav_selection_btn mr_10" v-for="(gift, index) in giftItems" :key="index" @click="selectGift(index)">
                                        {{ gift.name }}
                                    </span>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- <hr style="margin: 0px; padding: 0px;"> -->

                    <div class="main_new_text">
                        <h3>따끈따끈, 신규 강의를 만나보세요! 🙋🏻‍♀️ <span style="font-size: 15px; color:crimson;">NEW!!</span></h3>
                        <a href="#">2024년 당신의 커리어를 책임질  <span style="color:crimson;">LINE-UP</span></a>
                    </div>

                    <div class="main_container_new_box">
                        <ul class="main_container_new">
                            <carousel v-if="$store.state.shouldShowCarousel" :per-page="4" :navigation-enabled="true" :autoplay=0 :transition="500" >
                                <Slide v-for="item in newClassItems" :key="item.id">
                                <div>
                                    <!-- <router-link :to="{ name: 'classboarddetail', params: { ClassID: item.ClassID } }"> -->
                                    <a :href="'/classboarddetail/' + item.ClassID">
                                        <li class="main_container_new_card">
                                            <div class="main_container_new_card_img">
                                                <img :src="item.ClassImg" alt="">
                                            </div>
                                            <div class="main_container_new_card_title">
                                                <h4>{{ item.ClassTitle }}</h4>
                                            </div>
                                            <div class="main_container_new_card_content">
                                                <p>{{ item.ClassDescription }}</p>
                                            </div>
                                            <ul class="main_container_new_card_tag"> 
                                                <li v-for="item2 in item.languages" :key="item2.id">{{ item2.ClassLanguageName }}</li>
                                            </ul>
                                        </li>
                                    </a>
                                    <!-- </router-link> -->
                                </div>
                                </Slide>
                            </carousel>
                                <div v-if="!$store.state.shouldShowCarousel" v-for="item in newClassItems" :key="item.id" href="">
                                    <!-- <router-link :to="{ name: 'classboarddetail', params: { ClassID: item.ClassID } }"> -->
                                    <a :href="'/classboarddetail/' + item.ClassID">
                                        <li class="main_container_new_card">
                                            <div class="main_container_new_card_img">
                                                <img :src=item.ClassImg />
                                                <!-- <img :src="require(`@/img/${item.ClassImg}`)" /> -->
                                            </div>
                                            <div class="main_container_new_card_title">
                                                <h4>{{ item.ClassTitle }}</h4>
                                            </div>
                                            <div class="main_container_new_card_content">
                                                <p>{{ item.ClassDescription }}</p>
                                            </div>
                                            <ul class="main_container_new_card_tag"> 
                                                <li v-for="item2 in item.languages" :key="item2.id"  :class="{'main_container_new_card_tag_HTML': item2.ClassLanguageName === 'HTML',  'main_container_new_card_tag_CSS': item2.ClassLanguageName === 'CSS',  'main_container_new_card_tag_JAVASCRIPT': item2.ClassLanguageName === 'JavaScript', 'main_container_new_card_tag_PHP': item2.ClassLanguageName === 'PHP', 'main_container_new_card_tag_JAVA': item2.ClassLanguageName === 'JAVA', 'main_container_new_card_tag_DATABASE': item2.ClassLanguageName === 'DataBase'}">{{ item2.ClassLanguageName }}</li>
                                            </ul>
                                        </li>
                                    </a>
                                    <!-- </router-link> -->
                                </div>
                        </ul>
                    </div>

                    <img class="main_banner" src="/img/event_banner_1.png" alt="">

                    <div class="main_new_text">
                        <h3>기본부터 실무까지 제시해주는 로드맵 🏃🏻‍♀️ <span style="font-size: 15px; color:crimson;">RoadMap!!</span></h3>
                        <a href="#">Class 4 You의 대표 강의들을 만나보세요.</a>
                    </div>

                    <div class="main_container_hot_box">
                        <ul class="main_container_hot">

                            <carousel v-if="$store.state.shouldShowCarousel" :per-page="4" :navigation-enabled="true" :autoplay=0 :transition="500" >
                                <Slide v-for="item in hot_banners" :key="item.id">
                                    <a :href="item.url">
                                        <li class="main_container_hot_card">
                                            <div class="main_container_hot_card_img">
                                                <img :src="item.img" alt="">
                                            </div>
                                        </li>
                                    </a>
                                </Slide>
                            </carousel>
                            
                            <a v-if="!$store.state.shouldShowCarousel" v-for="item in hot_banners" :key="item.id" :href="item.url">
                                <li class="main_container_hot_card">
                                    <div class="main_container_hot_card_img">
                                        <img :src="item.img" alt="">
                                    </div>
                                </li>
                            </a>
                        </ul>
                    </div>

                        <img class="main_banner" src="/img/event_banner_2.png" alt="">
                        <!-- <div>

                        </div> -->
                        
                        

                    <div class="main_new_text">
                        <h3>뭘 배워할지 모르는 당신을 위한 학습 가이드 🏃🏻‍♀️ <span style="font-size: 15px; color:crimson;">guide!!</span></h3>
                        <a href="#">내게 딱 맞는 학습 순서가 궁금하다면?</a>
                    </div>

                    <div class="main_container_keyword_box">
                        <ul class="main_container_keyword">
                            <carousel v-if="$store.state.shouldShowCarousel" :per-page="4" :navigation-enabled="true" :autoplay=0 :transition="500" >
                                <Slide v-for="item in guide_banners" :key="item.id">
                                    <a :href="item.url">
                                        <li class="main_container_keyword_card">
                                            <div class="main_container_keyword_card_img">
                                                <img :src="item.img" alt="">
                                            </div>
                                        </li>
                                    </a>
                                </Slide>
                            </carousel>

                            <a v-if="!$store.state.shouldShowCarousel" v-for="item in guide_banners" :key="item.id" :href="item.url">
                                <li class="main_container_keyword_card">
                                    <div class="main_container_keyword_card_img">
                                        <img :src="item.img" alt="">
                                    </div>
                                </li>
                            </a>
                        </ul>
                    </div>


                </div>
            </main>
        </div>
    </div>
</template>
<script>

import { defineComponent } from "vue";
import { Carousel, Pagination, Slide, Navigation } from "vue3-carousel";
import LoadingBar from './LoadingComponent';
import axios from 'axios'
// import Swal from 'sweetalert2';

import "vue3-carousel/dist/carousel.css"; 


export default {
    name: 'MainComponent',

    components: {
		Carousel,
		Slide,
		Pagination,
        Navigation,
        LoadingBar
	},
    // href="/classBoard/HTML"
    data() {
        return {
            newClassItems: [],
            // hot_banners: ['/img/hot_banner/hot_banner_1.png', '/img/hot_banner/hot_banner_2.png', '/img/hot_banner/hot_banner_3.png', '/img/hot_banner/hot_banner_4.png', '/img/hot_banner/hot_banner_5.png', '/img/hot_banner/hot_banner_6.png', '/img/hot_banner/hot_banner_7.png' , '/img/hot_banner/hot_banner_8.png'],
            
            // 배너 데이터 바인딩
            hot_banners: [
                { url: ['/classboarddetail/5'], img: ['/img/hot_banner/hot_banner_1.png']},
                { url: ['/classboarddetail/5'], img: ['/img/hot_banner/hot_banner_2.png']},
                { url: ['/classboarddetail/5'], img: ['/img/hot_banner/hot_banner_3.png']},
                { url: ['/classboarddetail/5'], img: ['/img/hot_banner/hot_banner_4.png']},
                { url: ['/classboarddetail/5'], img: ['/img/hot_banner/hot_banner_5.png']},
                { url: ['/classboarddetail/5'], img: ['/img/hot_banner/hot_banner_6.png']},
                { url: ['/classboarddetail/5'], img: ['/img/hot_banner/hot_banner_7.png']},
                { url: ['/classboarddetail/5'], img: ['/img/hot_banner/hot_banner_8.png']},
            ],
            
            // guide_banners: ['/img/guide/html.png', '/img/guide/css.png', '/img/guide/js.png', '/img/guide/php.png', '/img/guide/java.png', '/img/guide/db.png', '/img/guide/jira.png', '/img/guide/figma.png',],

            // 가이드 배너 데이터 바인딩
            guide_banners: [
                { url: ['/classBoard/HTML'], img: ['/img/guide/html.png']},
                { url: ['/classBoard/CSS'], img: ['/img/guide/css.png']},
                { url: ['/classBoard/JavaScript'], img: ['/img/guide/js.png']},
                { url: ['/classBoard/PHP'], img: ['/img/guide/php.png']},
                { url: ['/classBoard/JAVA'], img: ['/img/guide/java.png']},
                { url: ['/classBoard/DataBase'], img: ['/img/guide/db.png']},
                { url: ['/classBoard/HTML'], img: ['/img/guide/jira.png']},
                { url: ['/classBoard/HTML'], img: ['/img/guide/figma.png']},
            ],

            autoplay: true,
            autoplayDuration: 2500,
            giftItems: [
                { id: 1, name: "갑코 채용", images: ['/img/banner/banner1.png'] },
                { id: 2, name: "코딩 역량 인증 시험", images: ['/img/banner/banner2.png'] },
                { id: 3, name: "크래프톤", images: ['/img/banner/banner3.png'] },
                { id: 4, name: "데브코스 (부트캠프)", images: ['/img/banner/banner4.png'] },
                { id: 4, name: "이벤트 배너", images: ['/img/banner/banner6.png'] },
                { id: 4, name: "이벤트 배너", images: ['/img/banner/banner7.png'] },
            ],
            selectedGiftId: null,
            currentIndex: 0,
        }
    },
    mounted() {
        this.fetchData();
        this.checkWindowWidth();
        // 윈도우 크기에 따라서 캐러셀 적용
        window.addEventListener('resize', this.checkWindowWidth);
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.checkWindowWidth);
    },
    methods: {
        fetchData() {
        axios.get('/getNewClassMainData')
            .then(response => {
                console.log(response);
                this.newClassItems = response.data;
                // return axios.get('/getUserData');
            })
            // .then(response2 => {
            //     if (response2.data.userChk) {
            //         Swal.fire({
            //             icon: 'success',
            //             title: '로그인 성공',
            //             text: '로그인에 성공했습니다.',
            //             confirmButtonText: '확인'
            //         })
            //         console.log(response2);
            //         this.$store.commit('setSaveToLocalStorage', response2.data);
            //         this.$store.commit('setUserLoginChk', response2.data.sessionDataCheck);
            //         this.$store.commit('setUserID', response2.data.userId);
            //     }
            // })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        },
        selectGift(gift) {
            this.selectedGiftId = gift;
        },
        prevSlide() {
            this.$refs.carousel.prev();
        },
        nextSlide() {
            this.$refs.carousel.next();
        },
        toggleAutoplay() {
            this.autoplay = !this.autoplay;
            this.autoplayDuration = this.autoplay ? 3000 : 0;
        },
        updateIndex(index) {
            this.currentIndex = index;
        },
        checkWindowWidth() {
            this.$store.dispatch('checkWindowWidth');
        },
        // handleClassImageClick(classId) {
        //     const url = '/classBoardDetail/${classId}'
        //     const header = {
        //         headers: {
        //             "Content-Type": 'application/json',
        //             // 'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
        //         },
        //     }
        //     axios.get(url, header)
        //     .then(response => {
        //     const detailData = response.data;

        //     // 프로그래밍 방식으로 라우터를 통해 디테일 페이지로 이동
        //     this.$router.push({
        //             name: 'classboarddetail', // 디테일 페이지의 라우터 이름
        //             params: {
        //             id: classId,
        //             // 기타 필요한 파라미터들...
        //             },
        //             query: {
        //             },
        //         });
        //     })
        //     .catch(error => {
        //     console.error('API 요청 실패:', error);
        //     });
        // },
    }
}
</script>
<style>
.carousel__item {
    color: var(--vc-clr-white);
    margin: 0px;
    padding: 0px;
	font-size: 20px;
	border-radius: 8px;
	display: flex;
	justify-content: center;
	align-items: center;
}

.carousel__slide {
    margin: 0px;
    padding: 0px;
    display: block;
    width: 100%;
}

.carousel__pagination {
    position: absolute;
    bottom: 0px;
    background-color: rgba(255,255,255, 0.2);
    padding: 5px;
    width: 100%;
}

.carousel__pagination-button::after {
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 0 5px;
    background-color: #bbb;
    border-radius: 50%;
    cursor: pointer;
}

.carousel__pagination-button:hover::after, .carousel__pagination-button--active::after {
    background-color: var(--vc-pgn-active-color);
}

.carousel__prev,
.carousel__next {
    box-sizing: content-box;
    /* border: 5px solid white; */
    /* font-size: 300px; */
}

.carousel__icon {
    color: #fff;
}

@media screen and (max-width: 1000px) {
    .carousel__pagination {
        padding: 3px;
    }
}

@media screen and (max-width: 450px) {
    .carousel__pagination {
        padding: 0px;
    }

    .carousel__pagination-button::after {
        width: 5px;
        height: 5px;
    }
}
.carousel__next {
    width: 150px;
    height: 150px;
    font-size: 250px;
    opacity: 0.3;
}

.carousel__next:hover {
    color: #fff;
    width: 150px;
    height: 150px;
    font-size: 250px;
    opacity: 0.8;
}

.carousel__prev {
    width: 150px;
    height: 150px;
    font-size: 250px;
    opacity: 0.3;
}

.carousel__prev:hover {
    color: #fff;
    width: 150px;
    height: 150px;
    font-size: 250px;
    opacity: 0.8;
}

@media screen and (max-width: 800px) {
    .carousel__next {
        width: 80px;
        height: 80px;
        font-size: 250px;
        opacity: 0.3;
    }

    .carousel__prev {
        width: 80px;
        height: 80px;
        font-size: 250px;
        opacity: 0.3;
    }
}
</style>