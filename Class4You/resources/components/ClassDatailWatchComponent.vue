<template>
    <!-- <div @wheel.prevent="disableWheel"> -->
    <div>
        <div class="class_detail_watch">
            <div class="class_detail_watch_contents">
                <div class="class_detail_watch_nav">
                    <div class="class_detail_watch_list">
                        <div class="class_datail_watch_chapter">PHP 기초 문법 학습</div>
                        <div>{{ClassDataItem.ClassTitle}}</div>
                        <!-- <div>전체 진도율</div> -->
                        <a :href="'/classboarddetail/' + this.ClassID">이전으로</a>
                    </div>
                </div>
                <div class="class_detail_watch_main">
                    <!-- <div v-for="item in ChapterDataItem" class="class_detail_watch_main_content">
                        <div v-html="selectedLesson.LessonVideo"></div>
                    </div> -->
                    <div v-if="selectedLesson" class="video-container class_detail_watch_main_content">
                        <div v-html="selectedLesson.LessonVideo"></div>
                    </div>
                    <!-- <div class="class_detail_watch_main_content_bar">
                        <span>재생바</span>
                    </div> -->
                </div>
                <div class="class_detail_watch_footer">
                    <!-- 근데 이전강의 버튼은 필요없나? -->
                    <div>
                        <button>
                            <span>이전강의</span>
                        </button>
                        <button class="class_detail_watch_next_btn">
                            <span>다음강의</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- 탭 UI 될부분 -->
            <div class="class_detail_watch_right_side">
                <div class="class_detail_watch_right_side_tab_nav">
                    <div class="class_detail_watch_side_tab1">
                        <span>커리큘럼</span>
                    </div>
                    <div class="class_detail_watch_side_tab2">
                        <span>강의노트</span>
                    </div>
                </div>
                <div class="class_datail_watch_side_title_box">
                    <div class="class_datail_watch_side_title">
                        <h3>스스로 키우는 PHP 문법</h3>
                        <p>진도율 :</p>
                        <div class="class_datail_watch_progress_bar_cover">
                            <div role="progressbar" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10.53" aria-label="진도율" class="class_datail_watchs_progress_bar"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="class_datail_watch_side_content">
                    <div class="class_side_content_curriculum">
                        <div v-for="(chapter, chapterIndex) in ChapterDataItem" :key="chapter.ChapterID">
                            <details>
                            <summary>
                                <div  class="side_content_curriculum_title">
                                    <div class="side_curriculum_top">
                                        <p> {{ chapter.ChapterTitle }}</p>
                                        <p>시간</p>
                                    </div>
                                    <div class="side_curriculum_bottom">
                                        <p>강의 소개</p>
                                    </div>
                                </div>
                            </summary>
                            
                                <div v-for="lesson in LessonDataItem[chapter.ChapterID]" :key="lesson.LessonID" class="side_content_curriculum_content" @click="selectLesson(lesson)">
                                    <div class="side_content_curriculum_top">
                                        <p>{{lesson.LessonTitle}}</p>
                                    </div>
                                    <!-- <div class="side_content_curriculum_bottom">
                                        <p>아이콘</p>
                                        <p>10분</p>
                                    </div> -->
                                </div>
                            </details>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 다른페이지 만들기 애매해서 주석처리 -->
        </div>
    </div>
</template>
<script>
export default {
    name: 'ClassDatailWatchComponent',

    props: ['ClassID'],

    data() {
        return {
            ClassDataItem: {},
            ChapterDataItem: {},
            LessonDataItem: {},
            selectedChapter: null,
            selectedLesson: null,
        }
    },

    methods: {
        disableWheel(event) {
            event.preventDefault();
        },
        fetchData() {
		// 여기에서 정보를 추가로 조회하는 로직을 구현
		// 예시: API를 호출하여 데이터를 가져옴\
		axios.get('/classwatchview/' + this.ClassID)
			.then(response => {
			// API 응답에 대한 로직 수행
			console.log(response.data);
                this.ClassDataItem = response.data.classData;
                this.ChapterDataItem = response.data.chapterData;
                this.LessonDataItem = response.data.lessonData;
			})
			.catch(error => {
			// 에러 처리
			    console.error(error);
			});
		},
        selectChapter(chapterID) {
            this.selectedChapter = chapterID;
            this.selectedLesson = null;
        },
        selectLesson(lessonID) {
            this.selectedLesson = lessonID;
        },
        getLessonVideo(lessonID) {
            return this.lessonDataItem.lessonVideo
        },
    },
    
    mounted() {
        this.fetchData();
    },
}
</script>
<style>
    .wrapper {
        height:auto;
        min-height: 100%;
        /* padding-bottom: 0px; */
    }
</style>