	<template>
		<div id="wrap">
			<div class="main_visual">
					<div class="main_visual_slider">
						<div class="main_visual_slider_list">
							<div class="main_visual_slider_track">
								<div class="main_visual_slider_track_slick">
									<div class="main_visual_slider_track_slick_item">
										<a href="">
											<img src="/img/banner/banner1.png">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	<section class="mainSec row jcB" style="margin-top: 50px;">
		<article class="leftNav">
		<p>정보를 공유해요</p>
		<ul class="mainNav">
			<li>자유 게시판</li>
			<li>질문 게시판</li>
			<ul class="subNav">
				<li class="row jcB active">
				<p>HTML</p>
				<p>0</p>
				</li>
				<li class="row jcB">
				<p>CSS</p>
				<p>0</p>
				</li>
				<li class="row jcB">
				<p>JS</p>
				<p>0</p>
				</li>
				<li class="row jcB">
				<p>PHP</p>
				<p>0</p>
				</li>
				<li class="row jcB">
				<p>JAVA</p>
				<p>0</p>
				</li>
				<li class="row jcB">
				<p>DB</p>
				<p>0</p>
				</li>
				<li class="row jcB">
				<p>TOOL</p>
				<p>0</p>
				</li>
			</ul>
		</ul>
		</article><!-- leftNav -->
	
		<div class="board_container">
		<div class="searchbox row aiC">
			<input type="text" id="searchTxt">
			<button type="submit" for="">검색</button>
		</div>

		<div class="titBox row jcB aiC">
			<div class="sort">
			<ul class="row aiC">
				<li class="row aiC active"><span></span>최신순</li>
				<li class="row aiC"><span></span>인기순</li>
				<li class="row aiC"><span></span>조회순</li>
			</ul>
			</div>
			<div class="btnbox row aiC">
			<button type="button">미해결</button>
			<button type="button">글작성</button>
			</div>
		</div><!-- titBox -->
		<div class="board_detail_rating_list">
			<div class="question-container">
    <a class="e-click-post" href="/questions/1104598/single-cluster-큰-장애-복구">
        <div class="question">
            <div class="question__info">
                <div class="question__title">
                    <div class="title-sub__text">
                        <div class="bootstrap-components question__status-tag question__status-tag--unresolved">
                            <span class="badge rounded-pill">
                                미해결
                            </span>
                        </div>
                        <span class="is-hidden-tablet course__title">대규모 시스템 설계 Part 1</span>
                    </div>
                    <h3 class="title__text">
                        큰 장애 복구
                        <span class="infd-icon title__icon">
                        </span>
                    </h3>
                </div>
                <p class="question__body">
                    큰 장애 복구는 다른 클러스터로 우회한다고 하셨는데 single cluster는 클러스터가 1개 아닌가요 ??
                </p>
                <div class="question__tags">
                    <button class="ac-button is-sm is-solid is-gray ac-tag ac-tag--blue">
                        <span class="ac-tag__name">dbms/rdbms</span>
                    </button>
                    <button class="ac-button is-sm is-solid is-gray ac-tag ac-tag--blue">
                        <span class="ac-tag__name">소프트웨어-설계</span>
                    </button>
                </div>
                <div class="question__info-footer">
                    <div class="question__info-detail">
                        <span class="question__info-user-name">yrs</span>
                        <span>&nbsp;·&nbsp;</span>
                        <span>24분 전</span>
                        <span class="is-hidden-mobile">&nbsp;·&nbsp;</span>
                        <span class="is-hidden-mobile question__info-course-title">대규모 시스템 설계 Part 1</span>
                    </div>
                    <div class="question__info-userData">
                        <dl>
                            <dt class="visually-hidden">좋아요수</dt>
                            <dd class="comment__count">
                                <i class="fa-regular fa-thumbs-up"></i>
                                <span class="text">0</span>
                            </dd>
                            <dt class="visually-hidden">조회수</dt>
                            <dd class="view__count">
                                <i class="fa-regular fa-eye"></i>
                                <span class="text">5</span>
                            </dd>
                            <dt class="visually-hidden">답변</dt>
                            <dd class="comment__count">
                                <i class="fa-regular fa-comment"></i>
                                <span class="text">0</span>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </a>
  </div>
		</div><!-- container -->
		</div>

		<article class="best">
            <p>best</p>
            <ul>
              <div class="bestname">1.홍길동</div>
              <div class="bestname">2.홍길동</div>
              <div class="bestname">3.홍길동</div>
              <div class="bestname">4.홍길동</div>
              <div class="bestname">5.홍길동</div>
              <div class="bestname">6.홍길동</div>
            </ul>
          </article>
	</section>
</div>
</template>
	
	<script>
	import axios from 'axios';
	// 하위 카테고리별 목록
	export default {
		name: 'BoardComponent',

		// data() {
		// return {
		// 	boardItems: [],
		// 	categories: [
		// 	{ id: 1, name: 'HTML' },
		// 	{ id: 2, name: 'CSS' },
		// 	{ id: 3, name: 'JS' },
		// 	{ id: 4, name: 'PHP' },
		// 	{ id: 5, name: 'JAVA' },
		// 	{ id: 6, name: 'DB' },
		// 	{ id: 7, name: 'TOOL' },
		// 	],
		// 	activeCategory: null,
		// 	currentSubCategory: null,
		// 	searchText: '',
		// };
		// },
		// // 게시물 목록중 해결된것만 나오게끔 하는 정렬 카테고리 목록
		// computed: {
		// filteredBoardItems() {
		// 	let filteredItems = this.boardItems;
		// 	if (this.currentSubCategory) {
		// 	filteredItems = filteredItems.filter((item) => item.categoryId === this.currentSubCategory);
		// 	}
		// 	if (this.searchText) {
		// 	const searchTextLower = this.searchText.toLowerCase();
		// 	filteredItems = filteredItems.filter(
		// 		(item) => item.title.toLowerCase().includes(searchTextLower)
		// 	);
		// 	}
		// 	return filteredItems;
		// },
		// },
		// mounted() {
		// this.fetchBoardItems();
		// },
		// methods: {
		// fetchBoardItems() {
		// 	axios
		// 	.get('/api/getBoardItems')
		// 	.then((response) => {
		// 		this.boardItems = response.data;
		// 	})
		// 	.catch((error) => {
		// 		console.error('Error fetching board items:', error);
		// 	});
		// },
		// getCategoryItemCount(categoryId) {
		// 	return this.boardItems.filter((item) => item.categoryId === categoryId).length;
		// },
		// selectCategory(category) {
		// 	this.activeCategory = category;
		// 	this.currentSubCategory = null;
		// },
		// // 해결 카테고리.
		// selectSubCategory(subCategory) {
		// 	this.currentSubCategory = subCategory;
		// },
		// sortByRecent() {
		// 	this.boardItems.sort((a, b) => new Date(b.createdAt) - new Date(a.createdAt));
		// },
		// sortByPopularity() {
		// 	// 추가로 정렬 로직을 구현해야 합니다.
		// },
		// sortByViews() {
		// 	this.boardItems.sort((a, b) => b.viewCount - a.viewCount);
		// },
		// markAsResolved() {
		// 	// 선택된 게시물의 리스트를 해결된 것만 불러오는 로직을 추가합니다.
		// 	console.log('해결완료 클릭');
		// },
		// goToBoardInsert() {
		// 	// BoardInsertComponent.vue 페이지로 이동
		// 	console.log('글작성 버튼이 클릭되었습니다. BoardInsertComponent.vue 페이지로 이동합니다.');
		// },
		// search() {
		// 	// 검색 로직을 추가합니다.
		// 	console.log('검색 버튼 클릭');
		// },
		// },
	};
	</script>
	
	<style>
	</style>
	