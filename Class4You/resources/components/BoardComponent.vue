			<template>
		<div id="wrap">
				<div id="top_banner" class="top_banner">
					<div class="desc">
						<ul id="list_txt" class="list_txt">
							<li><a href="">새로운 온라인 클래스 STUDY 4 YOU 개설</a></li>
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
				</div>

				<header id="header">
					<div class="navigation">
						<ul class="nav_left side_nav">
							<li><a href="" class="menu_btn"><img src="./img/menu.png" alt="">전체 강의</a></li>
							<li><a href="">추천 강의</a></li>
							<li><a href="">신규 강의</a></li>
							<li>|</li>
							<li><a href="">커뮤니티</a></li>
						</ul>
						<h1>
							<a href="">
								<img src="./img/v2_14378e7f2adb0ec0ad8cddaaf3b0fbdd_0DXltiM6xt_top.jpg" alt="">
							</a>
						</h1>
						<div class="side_nav">
							<a href="">SIGN UP</a>
							<a href="">LOGIN</a>
							<div class="search_box">
								<input type="text" placeholder="SEARCH">
								<button type="button"><img src="./img/SEARCH.png" alt=""></button>
							</div>
						</div>
					</div>
			<hr>

			<title> 커뮤니티</title>

		<body>
			<div id="wrap">
				<form>

			
				<div class="whr"><span>게시판</span><span>></span><span>게시판</span>
				</div><!-- whr -->
				<section class="mainSectionpost">
				<section class="mainSec row jcB">
			
					<div class="postBox">
						<div class="postInfo row aiC jcB">
							<div>
								<p>작성자<span>홍길동</span></p>
							</div>
							<div class="row aiC">
								<p>작성일<span>2023.12.11</span></p>
								<p>조회수<span>9999</span></p>
								<p>좋아요<span>9999</span></p>
							</div>
						</div>
						<div class="postTitBox row aiC">
							<label for="postTit">제목</label>
							<input type="text" id="postTit">
						</div>
						<div class="postContBox row">
							<label for="postCont">내용</label>
							<textarea id="postCont"></textarea>
						</div>
						<div class="laguage">
							<ul class="row aiC">
								<li>React</li>
								<li>JS</li>
								<li>CSS</li>
								<li>HTML</li>
								<li>LARAVEL</li>
								<li>React</li>
							</ul>
						</div>
						<div class="reco row jcC">
							<div class="row aiC">
								<p>0</p>
								<button><i class="fas fa-thumbs-up" style="font-size: 20px;"></i></button>
							</div>
							<div class="row aiC">
								<button>엄지</button>
								<p>0</p>
							</div>
						</div>
					</div>
			
					<div class="reviewBox border-t-none">
						<div class="number">
							<p>답변<span>0</span></p>
						</div>
						<div class="reviewList">
						</div>
						<div class="reviewPost row jcB">
							<textarea placeholder="댓글을 입력해주세요."></textarea>
							<button type="button">저장</button>
						</div>
					</div>
			
				</section> 
			</section>
			</form>
			</div>
			<script src="https://kit.fontawesome.com/b69518c43b.js" crossorigin="anonymous"></script>
			</body>
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
	