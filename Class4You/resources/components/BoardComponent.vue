<template>
	<div class="wrapper">
		<div id="wrap">
			<div style="padding: 0 10vw;" class="whr"><span>게시판</span><span>&gt;</span><span>게시판</span></div>
				<div class="main_visual">
					<div class="main_visual_slider">
						<div class="main_visual_slider_list">
							<div class="main_visual_slider_track">
								<div class="main_visual_slider_track_slick">
									<div class="main_visual_slider_track_slick_item">
										<a href="">
											<img src="/img/banner/banner4.png">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="board_container_main">
					<div class="board_contents">
						<div class="main_mrap">
							<section class="community_body">
							<div class="community_left_side">
								<nav class="community_body_navigation">
								<ul class="community_aside">
									<li class="community_aside_group">
									<h6>함께 공부해요</h6>
									<ul class="community_aside_menu_list">
										<li class="community_aside_menu">
										<a href="">
											자유게시판
										</a>
										</li>
										<!-- <li class="community_aside_menu">
										<a href="">질문게시판</a>
											<ul class="community_dropdown">
											<li><a href="/classBoard/HTML">HTML</a></li>
											<li><a href="/classBoard/CSS">CSS</a></li>
											<li><a href="/classBoard/JavaScript">Java Script</a></li>
											<li><a href="/classBoard/PHP">PHP</a></li>
											<li><a href="/classBoard/JAVA">JAVA</a></li>
											<li><a href="/classBoard/DataBase">DataBase</a></li>
											</ul> 
										</li> -->
									</ul>
									</li>
								</ul>
								</nav>
							</div>

							<div class="community_body_content">
								<div class="search_filter">
								<ul class="search_filter_status">
									<li class="e_status_active">
									<button class="e_status_active_tap_button">
										전체
									</button>
									</li>
									<li class="e_status_active">
									<button type="button" @click="fetchData(page = 1, searchQuery, solve = 0)" class="e_status_active_tap_button">
										미해결
									</button>
									</li>
									<li class="e_status_active">
									<button type="button" @click="fetchData(page = 1, searchQuery, solve = 1)" class="e_status_active_tap_button">
										해결
									</button>
									</li>
								</ul>
								<div class="e_search">
									<div class="search_item">
									<div class="ac_input_with_item">
										<input type="text" v-model="searchQuery">
									</div>
									<button type="button" @click="fetchData(1, searchQuery, solve = null)" class="search_item_button">
										검색
									</button>
									</div>
								</div>
								</div>
								<div class="question_list_container">
								<div class="posts_container_header">
									<select>
									<option value="">자유게시판</option>
									<option value="">질문게시판</option>
									</select>
									<select style="margin-left: 10px;">
									<option value="">최신순</option>
									<option value="">답변많은순</option>
									<option value="">좋아요순</option>
									</select>
									<ul class="order_pc">
									<li class="e_order active">
										<button type="button" @click="fetchData(page = 1, searchQuery, solve = null, sortData = 1)" class="order_pc_button">최신순</button>
									</li>
									<!-- <li class="e_order active">
										<button type="button" @click="fetchData(page = 1, searchQuery, solve = null, sortData = 2)" class="order_pc_button">답변많은순</button>
									</li> -->
									<li class="e_order active">
										<button type="button" @click="fetchData(page = 1, searchQuery, solve = null, sortData = 3)" class="order_pc_button">좋아요순</button>
									</li>
									<li class="e_order active">
										<button type="button" @click="fetchData(page = 1, searchQuery, solve = null, sortData = 4)" class="order_pc_button">조회순</button>
									</li>
									</ul>
									<div class="posts_container_header_button_cover"></div>
									<router-link v-if="$store.state.UserID" class="ac_button" to="/boardinsert" >글쓰기</router-link>
								</div>
								<ul class="question_list">
									<li class="question_container">
									<a v-for="item in newBoardItems" :href="'/boardDetail/' + item.BoardID">
										<div  class="question">
										<div class="question_info">
											<div class="question_title">
											<div class="title_sub_text">
												<div class="question_status_tag">
												<span :class="{'question_status_tag_badge': true, 'question_tag_unresolved': item.BoardFlg === '0', 'question_tag_resolved': item.BoardFlg === '1'}">{{ item.BoardFlg === '0' ? '미해결' : '해결' }}</span>
												</div>
											</div>
											<h3 class="title_text">
												{{ item.BoardTitle }}
											</h3>
											</div>
											<p class="question_content_body">
												{{ item.BoardComment }}
											</p>
											<div class="question_tags">
											<button class="question_tags_button">
												언어 태그란
											</button>
											</div>
											<div class="question_info_footer">
											<div class="question_info_detail">
												<span class="question_info_user_name">작성자 : {{ hideEmail(item.UserEmail) }}</span>
												<span style="margin: 0px 10px 0px 10px;"> / </span>
												<span class="question_info_user_name">작성시간 : {{ item.created_at }}</span>
											</div>
											<div class="question_info_user_data">
												<dl>
												<dt class="visually_hidden">투표점수</dt>
												<dd class="comment_count">
													<i>추천수 : {{ item.BoardRecommended }}</i>
												</dd>
												<dt class="visually_hidden">투표점수</dt>
												<dd class="comment_count">
													<i>비추천 : {{ item.BoardNotRecommended }}</i>
												</dd>
												<dt class="visually_hidden">조회수</dt>
												<dd class="comment_count">
													<i>조회수 : {{ item.BoardView }}</i>
												</dd>
												<dt class="visually_hidden">답변</dt>
												<dd class="comment_count">
													<i>답변수 :</i>
													<span>0</span>
												</dd>
												</dl>
											</div>
											</div>
										</div>
										</div>
									</a>
									</li>
								</ul>
								</div>

								<div class="qustuon_list_pageing">
									<div v-for="(page, index) in pagination" :key="index">
										<template v-if="page.url !== null">
											<a @click.prevent="fetchData(page.label)" href="#">{{ replaceString(page.label) }}</a>
										</template>
										<template v-else>
											<span>{{ replaceString(page.label) }}</span>
										</template>
									</div>
								</div>

							</div>
							<div class="community_right_side">
								<div class="ranking_container">
								<p class="weeklyranking">주간 인기 순위</p>
								<ul class="ranking_weekly_popular_writes_list">
									<li class="ranking_weekly_popular_write">
									<div>
										<ol v-for="(item, index) in newUserCntItems" :key="item.id" class="ranking_weekly_popular_write_list">
											<li class="ranking_weekly_popular_write_writer">{{ index + 1 }}. {{ hideEmail(item.UserEmail) }}</li>
											<li class="ranking_weekly_popular_write_writer">답변 수 : {{ item.cnt }}</li>
										</ol>
									</div>
									</li>
								</ul>
								</div>
							</div>
							</section>
						</div>
				</div>
		</div>
	</div>

</div>
</template>
<script>
// import Pagination from 'vue3-pagination';
export default {
	name: 'BoardComponent',

	computed: {
	},

	data() {
		return {
			newBoardItems: [],
			newUserCntItems: [],
			pagination: {},
			page: {},
			searchQuery: '',
			solve: null,
			sortData: 1,
		}
	},
	
	mounted() {
        this.fetchData();
    },
	methods: {
		fetchData(page = 1, searchQuery = '', solve = null, sortData = 1,) {
        axios.get(`/board/data?page=${page}&search=${searchQuery}&solve=${solve}&sort=${sortData}`)
            .then(response => {
                this.newBoardItems = response.data.boardData.data;
                this.newUserCntItems = response.data.userCntData;
                this.pagination = response.data.boardData.links;
                this.page = response.data.boardData.current_page;
				// console.log(response.data.boardData.links);
				// console.log(response.data.boardData.current_page);
				// console.log(response.data);
				// console.log(response.data.userCntData);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    	},
		hideEmail(email) {
			const atIndex = email.indexOf('@');
			const username = email.substring(0, Math.min(4, atIndex));
			const asterisks = '*'.repeat(atIndex - 4);
			return username + asterisks;
		},
		// boardSearch() {
		// 	axios.get('/search', {
		// 		params: {
		// 		search_item: this.search_item
		// 		}
		// 	})
		// 		.then(response => {
		// 	// 서버 응답에 대한 로직 수행
		// 	console.log(response.data);
		// })
		// .catch(error => {
		// 	// 에러 처리
		// 	console.error(error);
		// });

		// }
		replaceString(str) {
			const arrList = {
				'&laquo;': '≪',
				'&raquo;': '≫'
			}
			//  &laquo; 이전
			//  다음 &raquo;
			str = str.replace('&laquo;', '≪');
			str = str.replace('&raquo;', '≫');
			console.log(str);
			return str;
		},
	}
}

</script>
<style>
	
</style>