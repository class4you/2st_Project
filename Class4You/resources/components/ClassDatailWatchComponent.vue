<template>
    <!-- <div @wheel.prevent="disableWheel"> -->
    <div>
        <div class="class_detail_watch">
            <div class="class_detail_watch_contents">
                <div class="class_detail_watch_nav">
                    <div class="class_detail_watch_list">
                        <a class="class_datail_watch_chapter" :href="'/classboarddetail/' + this.ClassID">강의 대시보드 가기</a>
                        <!-- <div>{{ClassDataItem.ClassTitle}}</div> -->
                        <!-- <div>전체 진도율</div> -->
                        <a>{{ClassDataItem.ClassTitle}}</a>
                        <button>수강평 작성</button>
                    </div>
                </div>
                <div class="class_detail_watch_main">
                    <!-- <div v-for="item in ChapterDataItem" class="class_detail_watch_main_content">
                        <div v-html="selectedLesson.LessonVideo"></div>
                    </div> -->
                    <!-- <div v-if="selectedLesson" class="video-container class_detail_watch_main_content"> -->
                    <div class="video-container class_detail_watch_main_content">
                        <div id="youtube-player"></div>
                        <!-- <div v-html="selectedLesson.LessonVideo"></div> -->
                    </div>
                    <!-- <div class="class_detail_watch_main_content_bar">
                        <span>재생바</span>
                    </div> -->
                </div>
                <div class="class_detail_watch_footer">
                    <button class="class_detail_watch_next_btn" @click="goToPreviousLesson">이전강의</button>
                    <button class="class_detail_watch_next_btn" @click="goToNextLesson">다음강의</button>
                </div>
            </div>

            <!-- 탭 UI 될부분 -->
            <div class="class_detail_watch_right_side">
                <div class="class_detail_watch_right_side_tab_nav">
                    <div class="class_detail_watch_side_tab1">
                        <span>커리큘럼</span>
                    </div>
                    <!-- <div class="class_detail_watch_side_tab2">
                        <span>강의노트</span>
                    </div> -->
                </div>
                <div class="class_datail_watch_side_title_box">
                    <div class="class_datail_watch_side_title">
                        <h3>스스로 키우는 PHP 문법</h3>
                        <p>진도율 :</p>
                        <progress class="class_datail_watch_progress_bar_progress" :value="classProgressData"  min="0" max="100" id="progress"></progress>
                        <!-- <div class="class_datail_watch_progress_bar_cover">
                            <div role="progressbar" aria-valuemax="100" aria-valuemin="0" :aria-valuenow="classProgressData" aria-label="진도율" class="class_datail_watchs_progress_bar"></div>
                        </div> -->
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
                                        <!-- <p>시간</p> -->
                                    </div>
                                    <!-- <div class="side_curriculum_bottom">
                                        <p>{{ chapter.ChapterTitle }}</p>
                                    </div> -->
                                </div>
                            </summary>
                            
                                <div v-for="lesson in LessonDataItem[chapter.ChapterID]" :key="lesson.LessonID" :class="{'side_content_curriculum_content_1': selectedLesson.LessonID == lesson.LessonID, 'side_content_curriculum_content_2': selectedLesson.LessonID !== lesson.LessonID}" @click="selectLesson(lesson)">
                                    <div class="side_content_curriculum_top">
                                        <p>{{lesson.LessonTitle}}</p>
                                    </div>
                                    <div class="side_content_curriculum_buttom">
                                        <p>{{lesson.LessonContent}}</p>
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
            selectedLesson: 1,
            // YouTube 동영상 ID
            videoId: '',
            // YouTube Player 객체
            player: null,
            LessonAllRunningTime: 0,
            LessonRunningTime: 0,
            LessonProgress: 0,
            LessonFlg: 0,
            classProgressData: '',

        }
    },

    
    beforeDestroy() {
        // 컴포넌트가 파괴되기 전에 호출되는 훅
        this.saveLessonProgress();
    },

    methods: {
        // disableWheel(event) {
        //     event.preventDefault();
        // },
        fetchData() {
		// 여기에서 정보를 추가로 조회하는 로직을 구현
		// 예시: API를 호출하여 데이터를 가져옴\
		axios.get('/classwatchview/' + this.ClassID)
			.then(response => {
			// API 응답에 대한 로직 수행
			// console.log(response.data);
                this.ClassDataItem = response.data.classData;
                this.ChapterDataItem = response.data.chapterData;
                this.LessonDataItem = response.data.lessonData;
                this.classProgressData = response.data.classProgressData;

                const firstChapterId = Object.keys(response.data.lessonData)[0];
                const firstChapterLessons = response.data.lessonData[firstChapterId];

                if (firstChapterLessons && firstChapterLessons.length > 0) {
                    const firstLessonVideoId = firstChapterLessons[0].LessonVideoID;
                    // console.log(firstLessonVideoId);
                    this.videoId = firstLessonVideoId;
                    // 여기에서 필요한 작업 수행
                }
                // console.log(response.data.lessonData);
                // this.videoId = response.data.lessonData
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
            // console.log(this.selectedLesson.LessonVideoID);
            this.videoId = this.selectedLesson.LessonVideoID;
        },
        getLessonVideo(lessonID) {
            return this.lessonDataItem.lessonVideoID
        },
        isSelectedLesson(lesson) {
            return this.selectedLesson === lesson;
        },

        initYoutubePlayer() {
            // YouTube Player 생성
            this.player = new window.YT.Player('youtube-player', {
            height: '550',
            width: '1000',
            videoId: this.videoId,
            events: {
                'onReady': this.onPlayerReady,
                'onStateChange': this.onPlayerStateChange,
            },
            playerVars: {
                'origin': 'http://127.0.0.1:8000', // 여기에는 웹사이트의 실제 origin을 넣어야 합니다.
                'key': 'AIzaSyCZuYGiU9g-_nslcbFnWRd9ZSxkEu9bltg',
            },
        });
        },
        onPlayerReady(event) {
            // 동영상이 준비되면 추가 작업 수행
            // console.log('영상 시작');
            this.LessonAllRunningTime = this.player.getDuration();
            // console.log(this.player);
        },
        getCurrentTime() {
            // YouTube API의 getCurrentTime() 메서드를 사용하여 동영상의 현재 위치(시간)를 가져옴
            if (this.player) {
                this.currentTime = this.player.getCurrentTime();
                this.LessonRunningTime = this.currentTime;
                // console.log('현재 동영상 위치:', this.currentTime);
                
                // 동영상 총 길이 가져오기
                this.duration = this.player.getDuration();
                // 진행도 계산
                this.progressPercentage = (this.currentTime / this.duration) * 100;
                // LessonProgress 업데이트
                this.LessonProgress = this.progressPercentage;
            }
        },
        onPlayerStateChange(event) {
            // 동영상 상태 변경 이벤트 처리
            if (event.data === window.YT.PlayerState.ENDED) {
                // 동영상이 종료되면 완료 체크 수행
                this.handleVideoCompletion();
            } else if (event.data === window.YT.PlayerState.PLAYING) {
                // 동영상이 재생 중일 때 1초 간격으로 현재 동영상 위치 콘솔에 출력
                    this.progressInterval = setInterval(() => {
                    this.getCurrentTime();
                }, 1000);
            } else if (event.data === window.YT.PlayerState.PAUSED) {
                // 동영상이 일시 정지 상태일 때 갱신 중지
                clearInterval(this.progressInterval);
                this.saveLessonProgress();
            }
        },
        handleVideoCompletion() {
            // 동영상이 끝났을 때 실행할 작업 수행
            this.LessonFlg = 1;
            this.saveLessonProgress();
            // console.log('영상 끝');
        },
        saveLessonProgress() {
            // 예시: Axios를 사용하여 서버에 데이터 업데이트 (PUT 요청)
            axios.put('/lessonprogress', {
                lessonAllRunningTime: this.LessonAllRunningTime,
                lessonRunningTime: this.LessonRunningTime,
                lessonId: this.selectedLesson.LessonID,
                lessonFlg: this.LessonFlg,
                progressPercentage: this.LessonProgress,  // Vuex Store에서 상태 가져오기
                // 다른 필요한 데이터 추가 가능
            })
            .then(response => {
                // 서버 응답에 대한 로직 수행
                // console.log(response.data);
            })
            .catch(error => {
                // 에러 처리
                console.error(error);
            });
        },
        goToNextLesson() {
        if (this.selectedLesson !== null) {
                const allLessons = Object.values(this.LessonDataItem).flat();
                const currentIndex = allLessons.findIndex(lesson => lesson.LessonID === this.selectedLesson);

                if (currentIndex !== -1 && currentIndex < allLessons.length - 1) {
                // 현재 리슨이 배열의 범위 내에 있고, 다음 리슨이 있다면
                const nextLesson = allLessons[currentIndex + 1];

                // 다음 리슨으로 전환
                this.selectedLesson = nextLesson.LessonID;
                this.videoId = nextLesson.LessonVideoID;

                // YouTube 플레이어 초기화
                this.player.destroy();
                this.initYoutubePlayer();
                } else {
                // console.log('더 이상 다음 강의가 없습니다.');
                alert('더 이상 다음 강의가 없습니다.');
                }
            } else {
                // console.log('선택된 리슨이 없습니다.');
                alert('선택된 리슨이 없습니다.');
            }
        },
        goToPreviousLesson() {
        if (this.selectedLesson !== null) {
                const allLessons = Object.values(this.LessonDataItem).flat();
                const currentIndex = allLessons.findIndex(lesson => lesson.LessonID === this.selectedLesson);

                if (currentIndex !== -1 && currentIndex > 0) {
                // 현재 리슨이 배열의 첫 번째보다 더 앞에 있고, 이전 리슨이 있다면
                const previousLesson = allLessons[currentIndex - 1];

                // 이전 리슨으로 전환
                this.selectedLesson = previousLesson.LessonID;
                this.videoId = previousLesson.LessonVideoID;

                // YouTube 플레이어 초기화
                this.player.destroy();
                this.initYoutubePlayer();
                } else {
                // console.log('더 이상 이전 강의가 없습니다.');
                alert('더 이상 이전 강의가 없습니다.');
                }
            } else {
                // console.log('선택된 리슨이 없습니다.');
                alert('선택된 리슨이 없습니다.');
            }
        },
    },
    
    mounted() {
        this.fetchData();
            if (window.YT && window.YT.Player) {
            this.initYoutubePlayer();
            } else {
            // YouTube IFrame API 로드 후 초기화
            window.onYouTubeIframeAPIReady = () => {
                this.initYoutubePlayer();
            };
        }    
    },

    watch: {
        // videoId가 변경될 때마다 YT.Player 재생성
        videoId(newVideoId) {
        if (this.player) {
            // 이미 플레이어가 있는 경우 중지하고 파괴
            // this.player.stopVideo();
            this.player.destroy();
        }
        // 새로운 videoId로 플레이어 생성
        this.initYoutubePlayer();
        },
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