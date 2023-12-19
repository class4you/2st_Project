<template>
    <div> 
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
                                <span>게임 개발</span>
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
                            </div>
                            <div class="class_detail_container_r_language">
                                <span class="class_detail_container_r_language_icon">#</span>
                                <span v-for="language in detailClassItems.languages" :key="language.id">
									{{ language.ClassLanguageName }}
								</span>
                            </div>
                            <div class="class_detail_container_r_payment_box">
                                <div class="class_detail_container_r_payment_price">
                                    <span>가격: {{ detailClassItems.ClassPrice }}원</span>
                                </div>
                                <div class="class_detail_container_r_payment_classes">
                                    <button>수강 신청</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="class_container">
            <!-- 강의 소개 -->
            <ul class="class_tabs">
                <li @click="clickFlgTab = 0;" class="class_tab_link current" data-tab="class_tab1">강의 소개</li>
                <li @click="clickFlgTab = 1;" class="class_tab_link" data-tab="class_tab2">수강평</li>
                <li @click="clickFlgTab = 2;" class="class_tab_link" data-tab="class_tab3">커뮤니티</li>
                <li @click="clickFlgTab = 3;" class="class_tab_link" data-tab="class_tab4">공지사항</li>
            </ul>

        <div v-if="clickFlgTab === 0">
            <div id="class_tab1" class="class_tab_content class_current">
                <p>ClassIntroduction 입니다</p>
                <p>{{ detailClassItems.ClassIntroduction }}</p>
            </div>
            
            <div class="class_tab_content_title">
                <p>기초 설명</p>
            </div>
            <div id="class_tab1" class="class_tab_content">
                <p>{{ detailClassItems.ClassDescription }}</p>
            </div>

            <div class="class_tab_content_title">
                <p>커리큘럼</p>
            </div>
            <div id="class_tab1" class="class_tab_content">
                <p>커리큘럼</p>
            </div>

            <div class="class_tab_content_title">
                <p>강의 특징</p>
            </div>
            <div id="class_tab1" class="class_tab_content">
                <p>{{detailClassItems.ClassPoint}}</p>
            </div>

            <div class="class_tab_content_title">
                <p>강사 이력</p>
            </div>
            <div id="class_tab1" class="class_tab_content">
                <p>강사 소개란 입니다.</p>
            </div>
        </div>

            <!-- 수강평 -->
        <div v-if="clickFlgTab === 1">    
            <div id="class_tab1" class="class_current class_detail_rating_form">
                <form name="myform" id="myform" method="post" action="./save">
                    <fieldset>

                        <div class="class_detail_rating_form_text">
                            <textarea name="myform" id="" cols="30" rows="10" placeholder="수강평을 작성해주세요."></textarea>
                            <!-- <input type="text" placeholder="수강평을 작성해주세요."> -->
                        </div>

                        <div class="class_detail_rating_form_content">
                            <div class="class_detail_rating_form_star">
								
                                    <fieldset class="class_detail_rating_star_form" name="myform">
                                        <legend class="class_detail_rating_star_form_title">별점</legend>
                                            <input class="class_detail_rating_star_input" type="radio" name="rating" value="5" id="rate1">
                                                <label class="class_detail_rating_star_label" for="rate1">⭐</label>
                                            <input class="class_detail_rating_star_input" type="radio" name="rating" value="4" id="rate2">
                                                <label class="class_detail_rating_star_label" for="rate2">⭐</label>
                                            <input class="class_detail_rating_star_input" type="radio" name="rating" value="3" id="rate3">
                                                <label class="class_detail_rating_star_label" for="rate3">⭐</label>
                                            <input class="class_detail_rating_star_input" type="radio" name="rating" value="2" id="rate4">
                                                <label class="class_detail_rating_star_label" for="rate4">⭐</label>
                                            <input class="class_detail_rating_star_input" type="radio" name="rating" value="1" id="rate5">
                                                <label class="class_detail_rating_star_label" for="rate5">⭐</label>
                                    </fieldset>
                                
                            </div>

                            <div class="class_detail_rating_form_button">
                                <button type="submit">수강평 작성</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>

            <div class="class_detail_rating_list">
				<div class="class_detail_rating_view_tab">
					<div class="class_detail_rating_tab_title">
						<span><a href="">최신순</a></span>
					</div>
					<div class="class_detail_rating_tab_title">
						<span><a href="">인기순</a></span>
					</div>
					<div class="class_detail_rating_tab_title">
						<span><a href="">조회순</a></span>
					</div>
				</div>

			<hr>

				<div id="class_tab1" class="class_detail_rating_list_div">
					<div class="class_detail_rating_list_user">
						<div class="class_detail_rating_user_id">
							<p>{{ detailClassItems.UserID }}</p>
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
		['ClassID', 'UserID'],
	
    data() {
        return {
            clickFlgTab: 0,
			detailClassItems: [],
        }
    },
	mounted() {
        this.fetchData();
    },
	methods: {
		fetchData() {
		// 여기에서 정보를 추가로 조회하는 로직을 구현
		// 예시: API를 호출하여 데이터를 가져옴\
		axios.get('/api/classboarddetail/' + this.ClassID)
			.then(response => {
			// API 응답에 대한 로직 수행
			console.log(response.data);
			this.detailClassItems = response.data;
			// axios.get('/api/classboarddetailreview/')
			})
			.catch(error => {
			// 에러 처리
			console.error(error);
			});
		},
	},
    
}
</script>
<style>
    
</style>