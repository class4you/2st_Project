<template>
    <div class="wrapper">
		<div style="padding: 0 10vw;" class="whr"><span>전체강의</span><span>&gt;</span><span>{{ detailClassItems.languages[0].ClassLanguageName }}</span></div>
        <div class="class_detail_visual">
            <div class="class_detail_container_box">
                
                <div class="class_detail_container">
                    <div class="class_detail_container_lr">
                        <div class="class_detail_container_l">
                            <div class="class_detail_container_l_img_cover">
                                <img :src="'/' + detailClassItems.ClassImg" alt="">
                            </div>
                        </div>

                        <div class="class_detail_container_r">
                            <div class="class_detail_container_r_banner">
                                <div class="class_detail_container_r_banner_label">
                                    <span>NEW</span>
                                </div>
                                <span>{{detailClassItems.languages[0].ClassLanguageName}}</span>
                            </div>
                            <div class="class_detail_container_r_title_box">
                                <h2 class="class_detail_container_r_title">
                                    {{ detailClassItems.ClassTitle }}
                                </h2>
                            </div>
                            <div class="class_detail_container_r_content_box">
                                <p class="class_detail_container_r_content">
                                    {{ detailClassItems.ClassDescription }}
                                </p>
                            </div>
                            <div class="class_detail_container_r_info_box">
                                <span class="class_detail_container_r_info_star_box">
                                    <div class="class_detail_container_r_info_star">
                                        <div class="class_detail_container_r_info_star_inr">
                                            <span>☆</span>
                                            <span>☆</span>
                                            <span>☆</span>
                                            <span>☆</span>
                                            <span>☆</span>
                                        </div>
                                    </div>
                                    <span>(5.0)</span>
                                </span>
                                <span>수강생 수</span>
                                <span>{{ enrollmentCnt }}</span>
                            </div>
                            <div class="class_detail_container_r_language">
                                <span class="class_detail_container_r_language_icon">#</span>
                                <span v-for="language in detailClassItems.languages" :key="language.id">
									{{ language.ClassLanguageName }}
								</span>
                            </div>
                            <div class="class_detail_container_r_payment_box">
                                <div class="class_detail_container_r_payment_price">
                                    <span>가격: {{ detailClassItems.ClassPrice === 0 ? '무료' : detailClassItems.ClassPrice + '원' }}</span>
                                </div>
                                <div class="class_detail_container_r_payment_classes">
									<a v-if="EnrollChk" :href="'/classwatch/' + detailClassItems.ClassID">강의 시청</a>
                                    <button v-else @click="postEnrollApp()">수강 신청</button>
                                    <!-- <button v-else @click="postEnrollApp()">{{ classEnrollData.value }}</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="class_container">
            <!-- 강의 소개 -->
			<div class="class_tab_menu_div">
				<ul class="class_tabs">
					<li @click="clickFlgTab = 0; solve = null; sortData = 0;" :class="{'class_tab_link_on': sortData == 0}" class="class_tab_link current" data-tab="class_tab1">강의 소개</li>
					<li @click="clickFlgTab = 1; solve = null; sortData = 1;" :class="{'class_tab_link_on': sortData == 1}" class="class_tab_link" data-tab="class_tab2">수강평</li>
					<!-- <li @click="clickFlgTab = 2;" class="class_tab_link" data-tab="class_tab3">커뮤니티</li> -->
					<!-- <li @click="clickFlgTab = 3;" class="class_tab_link" data-tab="class_tab4">공지사항</li> -->
				</ul>
			</div>	

        <div v-if="clickFlgTab === 0">
			<div class="class_tab_content_div">
				<div id="class_tab1" class="class_tab_content class_current">
					<p>{{ detailClassItems.ClassIntroduction }}</p>
					<p>{{ detailClassItems.ClassIntroduction }}</p>
					<p>{{ detailClassItems.ClassIntroduction }}</p>
				</div>
			</div>
        
			<div class="class_tab_content_div">
				<div class="class_tab_content_title">
					<p>기초 설명</p>
				</div>
				<div id="class_tab1" class="class_tab_content class_tab_content_basic">
					<p><strong>
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  						<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  						<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
						</svg>
						추천드려요
					</strong></p>
					<p>✔코딩의 기초를 다지고싶은 분</p>
					<p>✔코딩 스터디를 원하시는 분</p>
					<p>✔학습 성취감을 느끼고 싶은 분</p>
				</div>
				<div class="class_tab_content">
					<p>{{ detailClassItems.ClassDescription }}</p>
				</div>
			</div>

			<div class="class_tab_content_div">
				<div class="class_tab_content_title">
					<p>커리큘럼</p>
				</div>
				<div id="class_tab1" class="class_tab_content">
					<div class="class_tab_content_curriculum" style="display: inline-block;">
						<div class="class_tab_content_curriculm_title">
							<span>{{ classCuriData.ChapterTitle }}</span>
						</div>
						<div>
							<p>{{ classCuriData.LessonTitle }}</p>
						</div>
						<div>
							<p>{{ classCuriData.LessonContent }}</p>
						</div>
					</div>
				</div>
			</div>	

			<div class="class_tab_content_div">
				<div class="class_tab_content_title">
					<p>강의 특징</p>
				</div>
				<div id="class_tab1" class="class_tab_content">
					<p>{{detailClassItems.ClassPoint}}</p>
				</div>
			</div>	

			<div class="class_tab_content_div">
				<div class="class_tab_content_title">
					<p>강사 이력</p>
				</div>
				<div id="class_tab1" class="class_tab_content">
					<p>{{detailClassItems.InstructorID}}</p>
					<p>{{detailClassItems.InstructorFullName}}</p>
					<p>{{detailClassItems.InstructorHistory}}</p>
				</div>
			</div>	

        </div>

            <!-- 수강평 -->
        <div v-if="clickFlgTab === 1">    
            <div v-if="EnrollChk" id="class_tab1" class="class_current class_detail_rating_form">
                <!-- <form name="myform" id="myform" method="post"> -->
                    <fieldset>

                        <div class="class_detail_rating_form_text">
                            <textarea v-model="classReviewData.ReviewComment" name="myform" id="" cols="30" rows="10" placeholder="수강평을 작성해주세요."></textarea>
                            <!-- <textarea name="myform" id="" cols="30" rows="10" placeholder="수강평을 작성해주세요."></textarea> -->
                        </div>

                        <div class="class_detail_rating_form_content">
                            <div class="class_detail_rating_form_star">
								
								<fieldset class="class_detail_rating_star_form" name="myform">
                                        <legend class="class_detail_rating_star_form_title">별점</legend>
                                            <input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="5" id="rate1">
                                                <label class="class_detail_rating_star_label" for="rate1">⭐</label>
                                            <input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="4" id="rate2">
                                                <label class="class_detail_rating_star_label" for="rate2">⭐</label>
                                            <input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="3" id="rate3">
                                                <label class="class_detail_rating_star_label" for="rate3">⭐</label>
                                            <input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="2" id="rate4">
                                                <label class="class_detail_rating_star_label" for="rate4">⭐</label>
                                            <input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="1" id="rate5">
                                                <label class="class_detail_rating_star_label" for="rate5">⭐</label>
                                    </fieldset>    
                                
                            </div>

                            <div class="class_detail_rating_form_button">
                                <button @click="addClassReview()">수강평 작성</button>
                            </div>
                        </div>

                    </fieldset>
                <!-- </form> -->
            </div>

			<!-- <div v-if="!EnrollChk">
				로그인 바람
			</div> -->

            <div class="class_detail_rating_list">
				<div class="class_detail_rating_view_tab">
					<div class="class_detail_rating_tab_title_view">
						<span>VIEW</span>
					</div>
                    <div class="class_detail_rating_tab_title">
						<span>|</span>
					</div>
					<div class="class_detail_rating_tab_title">
						<span>최신순</span>
					</div>
					<!-- <div class="class_detail_rating_tab_title">
						<span>인기순</span>
					</div> -->
					<!-- <div class="class_detail_rating_tab_title">
						<span><a href="">조회순</a></span>
					</div> -->
				</div>

				<div>
					<div v-for="data in reviewClassItems" :key="data.ReviewID" id="class_tab1" class="class_detail_rating_list_div class_tab_content_div">
						<div class="class_detail_rating_list_user">
							<div class="class_detail_rating_user_id">
								<p>{{ hideEmail(data.UserEmail) }} | {{ data.ReviewRating }}점</p>
							</div>
							<div class="class_detail_rating_user_date">
								<p>{{ data.created_at }}</p>
							</div>
						</div>
						<div class="class_detail_rating_list_text">
							<p>{{ data.ReviewComment }}</p>
						</div>
						<div class="class_detail_rating_user_button">
							<div class="class_detail_rating_user_update_button">
								<!-- <button @click="classReviewUpdate(data)">수정</button> -->
							</div>
							<div v-if="data.UserID == $store.state.UserID" class="class_detail_rating_user_delete_button">
								<!-- <button @click="deleteClassReview(data.ReviewID)">삭제</button> -->
								<button @click="deleteClassReview(data)">삭제</button>
							</div>
						</div>
					</div>
				</div>

				<!-- 수정폼 -->
				<!-- <div v-if="editReview" id="class_tab1" class="class_detail_rating_list_div">
						<div class="class_detail_rating_list_user">
							<div class="class_detail_rating_form_star">
								
								<fieldset class="class_detail_rating_star_form" name="myform">
									<legend class="class_detail_rating_star_form_title">별점</legend>
										<input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="5" id="rate1">
											<label class="class_detail_rating_star_label" for="rate1">⭐</label>
										<input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="4" id="rate2">
											<label class="class_detail_rating_star_label" for="rate2">⭐</label>
										<input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="3" id="rate3">
											<label class="class_detail_rating_star_label" for="rate3">⭐</label>
										<input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="2" id="rate4">
											<label class="class_detail_rating_star_label" for="rate4">⭐</label>
										<input v-model="classReviewData.ReviewRating" class="class_detail_rating_star_input" type="radio" name="rating" value="1" id="rate5">
											<label class="class_detail_rating_star_label" for="rate5">⭐</label>
								</fieldset>
							
							</div>
						</div>
						<div class="class_detail_rating_list_text">
							<textarea v-model="editReviewData.ReviewComment"></textarea>
						</div>
						<div class="class_detail_rating_user_button">
							<div class="class_detail_rating_user_update_button">
								<button @click="putClassReview()">수정</button>
							</div>
							<div class="class_detail_rating_user_delete_button">
								<button>취소</button>
							</div>
						</div>
				</div> -->
			
				
        	</div>
        </div>

            <!-- 커뮤니티 -->
            
        <div v-if="clickFlgTab === 2">    
            <div id="class_tab1" class="class_current class_detail_rating_form">
                <form action="">
                    <fieldset>

                        <div class="class_detail_rating_form_text">
                            <textarea name="" id="" cols="30" rows="10" placeholder="강의에 대한 질문을 작성해주세요."></textarea>
                        </div>

                        <div class="class_detail_commu_form_content">

                            <div class="class_detail_rating_form_button">
                                <button>질문 작성</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>

            <div class="class_detail_rating_list">
				<div class="class_detail_rating_view_tab">
					<div class="class_detail_rating_tab_title">
                        <!-- 질문게시판 클릭시 커뮤니티 질문게시판 페이지로 이동 -->
						<span>
                            <a href="">질문게시판</a>
                        </span>
					</div>
				</div>

			<hr>

				<div id="class_tab1" class="class_detail_rating_list_div">
					<div class="class_detail_rating_list_user">
						<div class="class_detail_rating_user_id">
							<p>작성자ID</p>
						</div>
						<div class="class_detail_rating_user_date">
							<p>2023-12-13</p>
						</div>
					</div>
					<div class="class_detail_rating_list_text">
						<p>css 이렇게 많이 써본건 처음이야</p>
						<p>css 이렇게 많이 써본건 처음이야</p>
						<p>css 이렇게 많이 써본건 처음이야</p>
						<p>내가 쓴글 수정삭제가능</p>
					</div>
					<div class="class_detail_rating_user_button">
						<div class="class_detail_rating_user_update_button">
							<button>수정</button>
						</div>
						<div class="class_detail_rating_user_delete_button">
							<button>삭제</button>
						</div>
					</div>
				</div>
			
			<hr>

				<div id="class_tab1" class="class_detail_rating_list_div">
					<div class="class_detail_rating_list_user">
						<div class="class_detail_rating_user_id">
							<p>작성자ID</p>
						</div>
						<div class="class_detail_rating_user_date">
							<p>2023-12-13</p>
						</div>
					</div>
					<div class="class_detail_rating_list_text">
						<p>수업이 재밌어요</p>
					</div>
				</div>

			<hr>	

				<div id="class_tab1" class="class_detail_rating_list_div">
					<div class="class_detail_rating_list_user">
						<div class="class_detail_rating_user_id">
							<p>작성자ID</p>
						</div>
						<div class="class_detail_rating_user_date">
							<p>2023-12-13</p>
						</div>
					</div>
					<div class="class_detail_rating_list_text">
						<p>코딩 조아요</p>
					</div>
				</div>

			<hr>

				<div id="class_tab1" class="class_detail_rating_list_div">
					<div class="class_detail_rating_list_user">
						<div class="class_detail_rating_user_id">
							<p>작성자ID</p>
						</div>
						<div class="class_detail_rating_user_date">
							<p>2023-12-13</p>
						</div>
					</div>
					<div class="class_detail_rating_list_text">
						<p>재밌는 라라벨</p>
					</div>
				</div>
        	</div>
        </div>    

            <!-- 공지사항 -->
        
        <div v-if="clickFlgTab === 3">   
            <div id="class_tab1" class="class_tab_content class_current class_detail_notice_main">
				<div class="class_detail_notice_main_div">
					<div class="class_detail_notice_title">
						<p>메인 공지사항</p>
					</div>
					<div class="class_detail_notice_content">
						<p>집에가면머합니까남아서열심히하소</p>
						<p>그래도레이아웃작업은다해가지않슴니까?</p>
						<p>감사하다명호야</p>
						<p>근데 이거 늘어나나?</p>
						<p>늘어나긴하네</p>
						<p>div로 함더 묶을까 말까</p>
					</div>
				</div>
            </div>
            
            <div class="class_detail_rating_list">
				<div class="class_detail_rating_view_tab">
					<div class="class_detail_rating_tab_title">
                        <!-- 질문게시판 클릭시 커뮤니티 질문게시판 페이지로 이동 -->
						<span>이전 공지사항</span>
					</div>
				</div>

			<hr>

				<div id="class_tab1" class="class_detail_rating_list_div">
					<div class="class_detail_rating_list_user">
						<div class="class_detail_rating_user_id">
							<p>관리자ID</p>
						</div>
						<div class="class_detail_rating_user_date">
							<p>2023-12-13</p>
						</div>
					</div>
					<div class="class_detail_rating_list_text">
						<p>css 이렇게 많이 써본건 처음이야</p>
						<p>css 이렇게 많이 써본건 처음이야</p>
						<p>css 이렇게 많이 써본건 처음이야</p>
						
					</div>
				</div>
			
			<hr>

				<div id="class_tab1" class="class_detail_rating_list_div">
					<div class="class_detail_rating_list_user">
						<div class="class_detail_rating_user_id">
							<p>관리자ID</p>
						</div>
						<div class="class_detail_rating_user_date">
							<p>2023-12-13</p>
						</div>
					</div>
					<div class="class_detail_rating_list_text">
						<p>수업이 재밌어요</p>
					</div>
				</div>

			<hr>	

				<div id="class_tab1" class="class_detail_rating_list_div">
					<div class="class_detail_rating_list_user">
						<div class="class_detail_rating_user_id">
							<p>관리자ID</p>
						</div>
						<div class="class_detail_rating_user_date">
							<p>2023-12-13</p>
						</div>
					</div>
					<div class="class_detail_rating_list_text">
						<p>코딩 조아요</p>
					</div>
				</div>

			<hr>

				<div id="class_tab1" class="class_detail_rating_list_div">
					<div class="class_detail_rating_list_user">
						<div class="class_detail_rating_user_id">
							<p>관리자ID</p>
						</div>
						<div class="class_detail_rating_user_date">
							<p>2023-12-13</p>
						</div>
					</div>
					<div class="class_detail_rating_list_text">
						<p>재밌는 라라벨</p>
					</div>
				</div>
        	</div>
        </div> 

		</div>
        

        
    </div>
</template>
<script>
import axios from 'axios'

export default {
    name: 'ClassBoardDetailComponent',
	props: 
		['ClassID'],
	
    data() {
        return {
            clickFlgTab: 0,
			// detailClassItems: [],
			detailClassItems: {
				languages: [
					{ ClassLanguageName: '' },
				]
			},
			reviewClassItems: [],
			// 글작성시 필요한 데이터?
			classReviewData: {
				ClassID: this.ClassID,
        		UserID: this.$store.state.UserID,
        		UserEmail: this.$store.state.UserEmail,
        		ReviewComment: '',
        		ReviewRating: Number,
				ReviewID: this.ReviewID,
			},
			EnrollChk: {},
			delReviewData: {
				ReviewID: this.ReviewID
			},
			newReviewData() {
				return {
					ClassID: this.ClassID,
					UserID: this.$store.state.UserID,
					UserEmail: this.$store.state.UserEmail,
					ReviewComment: '',
					ReviewRating: Number,
					ReviewID: this.ReviewID,
				};
			},
			// 질문하기. 함수로 객체만드는것과 데이터자체를 객체로 만드는것은 어떤 차이가 있는가
			// newReviewData: {
			// 	ClassID: this.ClassID,
        	// 	UserID: this.$store.state.UserID,
        	// 	UserEmail: this.$store.state.UserEmail,
        	// 	ReviewComment: '',
        	// 	ReviewRating: Number,
			// 	ReviewID: this.ReviewID,
			// },
			editReview: false,
			classEnrollData: {
				ClassID: this.ClassID,
				UserID: this.$store.state.UserID
			},
			enrollmentCnt: {},
			// pagination: {},
			// page: {},
			solve: null,
			sortData: 0,
			classCuriData: {},
        }
    },
	mounted() {
        this.fetchData();
    },

	updated() {

	},

	methods: {
		fetchData() {
		// 여기에서 정보를 추가로 조회하는 로직을 구현
		// 예시: API를 호출하여 데이터를 가져옴\
		axios.get('/classBoardDetail/' + this.ClassID)
			.then(response => {
			// API 응답에 대한 로직 수행
			console.log(response.data);
			this.detailClassItems = response.data.result;
			this.enrollmentCnt = response.data.userCnt.user_count;
			this.classCuriData = response.data.classCuri;

			// if(this.clickFlgTab === 1) {
				axios.get('/classboarddetailreview/' + this.ClassID)
				// axios.get(`/classboarddetailreview/data`, {
				// 	params: {
				// 		page: this.pagination.current_page
				// 	}
				// })
				.then(reviewResponse => {
                    // 두 번째 API 응답에 대한 로직 수행
                    console.log(reviewResponse.data);
						this.reviewClassItems = reviewResponse.data.reviewsData;
						// this.pagination = reviewResponse.data.links;
						this.EnrollChk = reviewResponse.data.enrollmentData;
						// this.newReviewData = reviewResponse.data.classReviewData;
                })
                .catch(reviewError => {
                    // 두 번째 API 에러 처리
                    console.error(reviewError);
                });
			// }

			})
			.catch(error => {
			// 에러 처리
			console.error(error);
			});
		},

		// addClassReview() {
		// 	axios.post('/classboarddetailreview/' + this.ClassID)
		// 		.then(reviewResponse => {
        //             // 두 번째 API 응답에 대한 로직 수행
        //             console.log(reviewResponse.data);
		// 			this.userClassReviewComment = reviewResponse.data;
        //         })
        //         .catch(reviewError => {
        //             // 두 번째 API 에러 처리
        //             console.error(reviewError);
        //         });
    	// },

		// 수강평 작성 함수
		addClassReview() {
			// this.$store.dispatch('addClassReview', this.classReviewData);
            const url = '/classboarddetailreview'
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data',
                    // 'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }
            let frm = new FormData();
            frm.append('ClassID',this.classReviewData.ClassID);
            frm.append('UserID',this.classReviewData.UserID);
            frm.append('ReviewComment',this.classReviewData.ReviewComment);
            frm.append('ReviewRating',this.classReviewData.ReviewRating);

            // console.log(frm);

            axios.post(url, frm, header)
            .then(res => {
				// console.log(this.reviewClassItems);
                // console.log(res.data[0]);
				
				// 기존 수강평 데이터의 [0]번 방에 작성한 수강평 추가
                this.reviewClassItems.unshift(res.data[0]);
				// 수강평 등록시 기록된 데이터 삭제?
				// if(this.deleteClassReview) {
				// if(this.addClassReview) {
				// 	return this.classReviewData = '';
				// }
				this.classReviewData = this.newReviewData();
				// this.classReviewData = this.newReviewData ;
				
			})
			// .then(res => {
			// 	this.newReviewData();
			// })
            .catch(err => {
                console.log(err.response.data.errors)
                // context.commit('setRegistrationErrorMessage', err.response.data.errors);
				alert('별점을 체크해주세요!');
            })
		},
		hideEmail(email) {
			const atIndex = email.indexOf('@');
			const username = email.substring(0, Math.min(4, atIndex));
			const asterisks = '*'.repeat(atIndex - 4);
			return username + asterisks;
		},

		// 수강평 삭제 함수
		// deleteClassReview(data) {
		// 	this.$store.dispatch('deleteClassReview', data);
		// },

		deleteClassReview(data) {
            const url = '/classboarddetailreview/' + data.ReviewID
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                },
            }

            // let frm = new FormData();
            // const data = {
            //     ReviewID: data.ReviewID,
            // };

			// 데이터값이 옴
            console.log(data);
            // console.log(data.ReviewID);

            axios.delete(url,data, header)
            .then(res => { 
                // console.log(this.reviewClassItems);
                // console.log(res.data[0]);

				// this.reviewClassItems.shift(res.data);
				// if(this.deleteClassReview) {
				// 	return this.classReviewData = '';
				// }

				// this.reviewClassItems 배열에서 삭제 대상인 항목을 제외한 새로운 배열을 생성하여 할당합니다. 
				// 이렇게 하면 삭제된 항목이 제외된 배열이 this.reviewClassItems에 다시 할당되어 뷰에 반영됩니다.
				this.reviewClassItems = this.reviewClassItems.filter(item => item.ReviewID !== data.ReviewID);
    
            })
            .catch(err => {
                console.log(err.response.data.errors)
                // context.commit('setRegistrationErrorMessage', err.response.data.errors);
				// alert('별점을 체크해주세요!');
            })
        },

		postEnrollApp() {
			this.$store.dispatch('postClassEnrollApp', this.classEnrollData);
		},
		
		clickTab() {
			this.hovered = true;
		},
		clickTabOut() {
			this.hovered = false;
		},
	},
    
}
</script>
<style>
    .class_tab_link.hovered {
		/* color: #222; */
    	border-bottom: 2px solid #000;
	}
</style>