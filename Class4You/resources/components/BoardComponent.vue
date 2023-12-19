<template>
	<div>
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
										<li class="community_aside_menu">
										<a href="">질문게시판</a>
											<ul class="community_dropdown">
											<li><a href="/classBoard/HTML">HTML</a></li>
											<li><a href="/classBoard/CSS">CSS</a></li>
											<li><a href="/classBoard/JavaScript">Java Script</a></li>
											<li><a href="/classBoard/PHP">PHP</a></li>
											<li><a href="/classBoard/JAVA">JAVA</a></li>
											<li><a href="/classBoard/DataBase">DataBase</a></li>
											</ul> 
										</li>
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
									<button class="e_status_active_tap_button">
										미해결
									</button>
									</li>
									<li class="e_status_active">
									<button class="e_status_active_tap_button">
										해결
									</button>
									</li>
								</ul>
								<div class="e_search">
									<div class="search_item">
									<div class="ac_input_with_item">
										<input type="text">
									</div>
									<button class="search_item_button">
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
										<button class="order_pc_button">최신순</button>
									</li>
									<li class="e_order active">
										<button class="order_pc_button">답변많은순</button>
									</li>
									<li class="e_order active">
										<button class="order_pc_button">좋아요순</button>
									</li>
									</ul>
									<div class="posts_container_header_button_cover"></div>
									<router-link class="ac_button" to="/boardinsert" >글쓰기</router-link>
								</div>
								<ul class="question_list">
									<li class="question_container">
									<a href="">
										<div v-for="item in newBoardItems" class="question">
										<div class="question_info">
											<div class="question_title">
											<div class="title_sub_text">
												<div class="question_status_tag">
												<span class="question_status_tag_badge">미해결</span>
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
												<span class="question_info_user_name">작성자</span>
												<span> · </span>
												<span class="question_info_user_name">작성시간 : {{ item.created_at }}</span>
											</div>
											<div class="question_info_user_data">
												<dl>
												<dt class="visually_hidden">투표점수</dt>
												<dd class="comment_count">
													<i>추천수 {{ item.BoardRecommended }}</i>
													<span>{{item.Boardgoodcount}}</span>
												</dd>
												<dt class="visually_hidden">투표점수</dt>
												<dd class="comment_count">
													<i>비추천: {{ item.BoardNotRecommended }}</i>
													<span>{{item.Boardbadcount}}</span>
												</dd>
												<dt class="visually_hidden">조회수</dt>
												<dd class="comment_count">
													<i>조회수 : {{ item.BoardView }}</i>
													<span>{{item.Boardhitscount}}</span>
												</dd>
												<dt class="visually_hidden">답변</dt>
												<dd class="comment_count">
													<i>답변순</i>
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
								<div v-for="page in pagination" >
									<a href="">{{ page.url }}</a>
								</div>
								</div>
							</div>
							<div class="community_right_side">
								<div class="ranking_container">
								<p class="weeklyranking">주간 인기 순위</p>
								<ul class="ranking_weekly_popular_writes_list">
									<li class="ranking_weekly_popular_write">
									<a href="">
										<ol class="ranking_weekly_popular_write_list">
										<li class="ranking_weekly_popular_write_writer">1. 작성자 아이디</li>
										<li class="ranking_weekly_popular_write_writer">2. 작성자 아이디</li>
										<li class="ranking_weekly_popular_write_writer">3. 작성자 아이디</li>
										</ol>
										
									</a>
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

	data() {
		return {
			newBoardItems: [],
			pagination: [],
		}
	},
	
	mounted() {
        this.fetchData();
    },
	methods: {
		fetchData() {
        axios.get('/api/board')
            .then(response => {
				console.log(response.data.links);
                this.newBoardItems = response.data.data;
				this.pagination = response.data.links;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        },
	}
}

</script>
<style>
	
</style>