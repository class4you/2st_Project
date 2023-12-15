<<<<<<< HEAD
	<template>
		<div id="wrap">
		<form @submit.prevent="search">
			<div class="whr">
			<title>커뮤니티리스트</title>
			</div>
	
			<div class="bannerBox">
			<div class="banner">
				<img class="bannerImg" src="/img/event_banner_2.png" alt="board_banner_img">
			</div>
			</div>
	
			<section class="mainSec row jcB">
			<article class="leftNav">
				<p>정보를 공유해요시른데요</p>
				<ul class="mainNav">
				<li @click="selectCategory('question')" :class="{ active: activeCategory === 'question' }">질문 게시판</li>
				<li @click="selectCategory('free')" :class="{ active: activeCategory === 'free' }">자유 게시판</li>
				<ul class="subNav" v-if="activeCategory === 'question'">
					<li v-for="category in categories" :key="category.id" class="row jcB">
					<p @click="selectSubCategory(category.id)">{{ category.name }}</p>
					<p>{{ getCategoryItemCount(category.id) }}</p>
					</li>
				</ul>
				</ul>
			</article>
	
			<div class="board_container">
				<div class="searchbox row aiC">
				<input v-model="searchText" type="text" id="searchTxt">
				<button type="submit">검색</button>
				</div>
	
				<div class="titBox row jcB aiC">
				<div class="sort">
					<ul class="row aiC">
					<li class="row aiC" @click="sortByRecent"><span></span>최신순</li>
					<li class="row aiC" @click="sortByPopularity"><span></span>인기순</li>
					<li class="row aiC" @click="sortByViews"><span></span>조회순</li>
					</ul>
				</div>
				<div class="btnbox row aiC">
					<button @click="markAsResolved" type="button">해결완료</button>
					<button @click="goToBoardInsert" type="button">글작성</button>
				</div>
				</div>
	
				<div class="board_detail_rating_list">
				<div class="contBox" v-for="item in filteredBoardItems" :key="item.id">
					<div class="cont">
					<div class="item">{{ item.title }}</div>
					</div>
				</div>
				</div>
			</div>
	
			<article class="best">
				<p>bestreviewer</p>
				<ul>
				<li v-for="bestuserItem in bestuserItems" :key="bestuserItem.id">{{ bestuserItem.name }}</li>
				</ul>
			</article>
			</section>
		</form>
=======
<template>
	<div id="wrap">
		<div class="whr"><span>게시판</span><span>></span><span>게시판</span>
	</div><!-- whr -->

	<div class="bannerBox">
		<div class="banner">
		<!-- <img class="bannerImg" src="/img/event_banner_2.png" alt="board_banenr_img"> -->
>>>>>>> aa4cce8dd5d8de093b080c2ce40b1552d509fa81
		</div>
	</div><!-- banner -->

	<section class="mainSec row jcB">

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
		<div class="contBox">
			<div class="cont">
			<div class="item"></div>
			</div>
		</div>
		<div class="contBox">
			<div class="cont">
			<div class="item"></div>
			</div>
		</div>
		<div class="contBox">
			<div class="cont">
			<div class="item"></div>
			</div>
		</div>
		<div class="contBox">
			<div class="cont">
			<div class="item"></div>
			</div>
		</div>
		</div><!-- container -->
		</div>

		<article class="best">
		<p>best</p>
		<ul>
			<li>1.홍길동</li>
			<li>2.홍길동</li>
			<li>3.홍길동</li>
			<li>4.홍길동</li>
			<li>5.홍길동</li>
			<li>6.홍길동</li>
		</ul>
		</article><!-- best -->
	</section>
</div>
</template>
	
	<script>
	// import axios from 'axios';
	// // 하위 카테고리별 목록
	// export default {
	// 	name: 'BoardComponent',

	// 	data() {
	// 	return {
	// 		boardItems: [],
	// 		categories: [
	// 		{ id: 1, name: 'HTML' },
	// 		{ id: 2, name: 'CSS' },
	// 		{ id: 3, name: 'JS' },
	// 		{ id: 4, name: 'PHP' },
	// 		{ id: 5, name: 'JAVA' },
	// 		{ id: 6, name: 'DB' },
	// 		{ id: 7, name: 'TOOL' },
	// 		],
	// 		activeCategory: null,
	// 		currentSubCategory: null,
	// 		searchText: '',
	// 	};
	// 	},
	// 	// 게시물 목록중 해결된것만 나오게끔 하는 정렬 카테고리 목록
	// 	computed: {
	// 	filteredBoardItems() {
	// 		let filteredItems = this.boardItems;
	// 		if (this.currentSubCategory) {
	// 		filteredItems = filteredItems.filter((item) => item.categoryId === this.currentSubCategory);
	// 		}
	// 		if (this.searchText) {
	// 		const searchTextLower = this.searchText.toLowerCase();
	// 		filteredItems = filteredItems.filter(
	// 			(item) => item.title.toLowerCase().includes(searchTextLower)
	// 		);
	// 		}
	// 		return filteredItems;
	// 	},
	// 	},
	// 	mounted() {
	// 	this.fetchBoardItems();
	// 	},
	// 	methods: {
	// 	fetchBoardItems() {
	// 		axios
	// 		.get('/api/getBoardItems')
	// 		.then((response) => {
	// 			this.boardItems = response.data;
	// 		})
	// 		.catch((error) => {
	// 			console.error('Error fetching board items:', error);
	// 		});
	// 	},
	// 	getCategoryItemCount(categoryId) {
	// 		return this.boardItems.filter((item) => item.categoryId === categoryId).length;
	// 	},
	// 	selectCategory(category) {
	// 		this.activeCategory = category;
	// 		this.currentSubCategory = null;
	// 	},
	// 	// 해결 카테고리.
	// 	selectSubCategory(subCategory) {
	// 		this.currentSubCategory = subCategory;
	// 	},
	// 	sortByRecent() {
	// 		this.boardItems.sort((a, b) => new Date(b.createdAt) - new Date(a.createdAt));
	// 	},
	// 	sortByPopularity() {
	// 		// 추가로 정렬 로직을 구현해야 합니다.
	// 	},
	// 	sortByViews() {
	// 		this.boardItems.sort((a, b) => b.viewCount - a.viewCount);
	// 	},
	// 	markAsResolved() {
	// 		// 선택된 게시물의 리스트를 해결된 것만 불러오는 로직을 추가합니다.
	// 		console.log('해결완료 클릭');
	// 	},
	// 	goToBoardInsert() {
	// 		// BoardInsertComponent.vue 페이지로 이동
	// 		console.log('글작성 버튼이 클릭되었습니다. BoardInsertComponent.vue 페이지로 이동합니다.');
	// 	},
	// 	search() {
	// 		// 검색 로직을 추가합니다.
	// 		console.log('검색 버튼 클릭');
	// 	},
	// 	},
	// };
	// </script>
	
	<style>
	</style>
	