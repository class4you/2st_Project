<template>
    <div>
        <div class="container">
            <main class="contents">
                <div class="main_mrap">
                    <div class="main_banner_box">
                        <div class="main_visual">
                            <a class="main_visual_scene">
                                <div class="main_visual_scene_content">
                                    <div class="main_visual_scene_container">
                                        <div class="main_visual_scene_container_cover_right">
                                            <img src="/img/img-1.png" alt="">
                                        </div>
                                        <div class="main_visual_scene_container_cover_left">
                                            <div class="main_visual_scene_container_cover_left_tags">
                                                <div>
                                                    0원 부트캠프
                                                </div>
                                            </div>
                                            <h3>
                                                나에게 주어지는 합격 목걸이! 0원 취업 지원 교육 모음
                                            </h3>
                                            <p>
                                                비전공, 경험, 경력 없는 취준생을 위한 2,000만원 상당의 취업 부트캠프
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="main_nav">
                            <div class="main_nav_num_space">
                                <div class="index-wrapper">
                                    <span class="current-index">2</span>
                                    /
                                    <span class="total-count">7</span>
                                </div>
                                <div class="control-wrapper">
                                    <button>&#60;</button>
                                    <button>&#124;&#124;</button>
                                    <button>&#62;</button>
                                </div>
                            </div>
                            <div class="divider"></div>

                            <div class="main_nav_selection">
                                <div class="main_nav_selection_box">
                                    <span class="main_nav_selection_btn">김영한님의 선물</span>
                                    <span class="main_nav_selection_btn ml_10">김영한님의 선물</span>
                                    <span class="main_nav_selection_btn ml_10">김영한님의 선물</span>
                                    <span class="main_nav_selection_btn ml_10">김영한님의 선물</span>
                                    <span class="main_nav_selection_btn ml_10">김영한님의 선물</span>
                                    <span class="main_nav_selection_btn ml_10">김영한님의 선물</span>
                                    <span class="main_nav_selection_btn ml_10">김영한님의 선물</span>
                                    <span class="main_nav_selection_btn ml_10">김영한님의 선물</span>
                                    <span class="main_nav_selection_btn ml_10">김영한님의 선물</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

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
                                        <li>html</li>
                                        <li>css</li>
                                        <li>php</li>
                                        <li>java</li>
                                    </ul>
                                </li>
                            </a>
                        </ul>
                    </div>

                    <div class="main_banner">

                    </div>

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

                    <div class="main_banner">

                    </div>

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
export default {
    name: 'MainComponent',

    data() {
        return {
            newClassItems: [],
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
    },
}
</script>
<style>
    
</style>