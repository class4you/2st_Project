<template>
    <div>
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
                                                <Carousel ref="carousel" :autoplay="autoplayDuration" :wrap-around="true" >
                                                    <Slide v-for="slide in giftItems" :key="slide">
                                                        <a href="">
                                                            <img :src="slide.images">
                                                            <div v-if="selectedGift">
                                                                <img :src="selectedGift" alt="선택된 선물 이미지">
                                                            </div>
                                                        </a>
                                                    </Slide>
                                                </Carousel>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main_nav">
                            <div class="main_nav_num_space">
                                <div class="index-wrapper">
                                    <span class="current-index">2</span>
                                    /
                                    <span class="total-count">7</span>
                                </div>
                                <div class="control-wrapper">
                                    <button @click="prevSlide">&#60;</button>
                                    <button @click="toggleAutoplay"> {{ autoplay ? '&#124;&#124;' : '≥' }}</button>
                                    <button @click="nextSlide">&#62;</button>
                                </div>
                            </div>
                            <div class="divider"></div>

                            <div class="main_nav_selection">
                                <div class="main_nav_selection_box">
                                    <span class="main_nav_selection_btn mr_10" v-for="(gift, index) in giftItems" :key="index" @click="selectGift(gift.images[0])">
                                        {{ gift.name }}
                                    </span>
                                    <span class="main_nav_selection_btn">김영한님의 선물</span>
                                    <span class="main_nav_selection_btn ml_10">김영한님의 선물</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="margin: 0px; padding: 0px;">

                    <div class="main_new_text">
                        <h3>NEW 신규강의</h3>
                        <a href="#">모든 신규강의 보러가기 ></a>
                    </div>

                    <div class="main_container_new_box">
                        <ul class="main_container_new">
                            <a v-for="item in newClassItems" :key="item.id" href="">
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
                        </ul>
                    </div>

                    <img class="main_banner" src="/img/banner-1.jpg" alt="">

                    <div class="main_new_text">
                        <h3>HOT 추천강의</h3>
                        <a href="#">모든 추천강의 보러가기 ></a>
                    </div>

                    <div class="main_container_hot_box">
                        <ul class="main_container_hot">
                            <a v-for="item in newClassItems" :key="item.id" href="">
                                <li class="main_container_hot_card">
                                    <div class="main_container_hot_card_img">
                                        <img src="/img/img-2.png" alt="">
                                    </div>
                                </li>
                            </a>
                        </ul>
                    </div>

                        <img class="main_banner" src="/img/banner-1.jpg" alt="">

                    <div class="main_new_text">
                        <h3>학습 가이드</h3>
                        <a href="#">원하는 키워드를 눌러보세요</a>
                    </div>

                    <div class="main_container_keyword_box">
                        <ul class="main_container_keyword">
                            <a href="">
                                <li class="main_container_keyword_card">
                                    <div class="main_container_keyword_card_img">
                                        <img src="/img/guide/html.png" alt="">
                                    </div>
                                </li>
                            </a>

                            <a href="">
                                <li class="main_container_keyword_card">
                                    <div class="main_container_keyword_card_img">
                                        <img src="/img/guide/css.png" alt="">
                                    </div>
                                </li>
                            </a>

                            <a href="">
                                <li class="main_container_keyword_card">
                                    <div class="main_container_keyword_card_img">
                                        <img src="/img/guide/js.png" alt="">
                                    </div>
                                </li>
                            </a>

                            <a href="">
                                <li class="main_container_keyword_card">
                                    <div class="main_container_keyword_card_img">
                                        <img src="/img/guide/php.png" alt="">
                                    </div>
                                </li>
                            </a>

                            <a href="">
                                <li class="main_container_keyword_card">
                                    <div class="main_container_keyword_card_img">
                                        <img src="/img/guide/java.png" alt="">
                                    </div>
                                </li>
                            </a>
                            
                            <a href="">
                                <li class="main_container_keyword_card">
                                    <div class="main_container_keyword_card_img">
                                        <img src="/img/guide/db.png" alt="">
                                    </div>
                                </li>
                            </a>

                            <a href="">
                                <li class="main_container_keyword_card">
                                    <div class="main_container_keyword_card_img">
                                        <img src="/img/guide/jira.png" alt="">
                                    </div>
                                </li>
                            </a>
                            
                            <a href="">
                                <li class="main_container_keyword_card">
                                    <div class="main_container_keyword_card_img">
                                        <img src="/img/guide/figma.png" alt="">
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
import { Carousel, Pagination, Slide } from "vue3-carousel";

import "vue3-carousel/dist/carousel.css"; 


export default {
    name: 'MainComponent',

    components: {
		Carousel,
		Slide,
		Pagination,
	},

    data() {
        return {
            newClassItems: [],
            slides: ['/img/banner/banner1.png', '/img/banner/banner2.png', '/img/banner/banner3.png', '/img/banner/banner4.png'],
            autoplay: true,
            autoplayDuration: 2000,
            giftItems: [
                { id: 1, name: "김영한님의 선물1", images: ['/img/banner/banner1.png'] },
                { id: 2, name: "김영한님의 선물2", images: ['/img/banner/banner2.png'] },
                { id: 3, name: "김영한님의 선물3", images: ['/img/banner/banner3.png'] },
                { id: 4, name: "김영한님의 선물4", images: ['/img/banner/banner4.png'] },
            ],
            selectedGift: null,
        }
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
        axios.get('/api/getNewClassMainData')
            .then(response => {
                this.newClassItems = response.data;
                console.log(response.data);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        },
        selectGift(gift) {
            this.selectedGift = image;
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
    },
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
</style>