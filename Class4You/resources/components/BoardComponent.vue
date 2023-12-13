

<template>
	<div id="app">
	<!-- 베너 영역 -->
	<div class="board_banner" style="width: 1520px; height: 400px;">
		<img src="../../public/img/boardbg.png" alt="main_banner" style="width: 100%; height: 100%;">
	</div>

	<!-- 베너 배경 상단 버튼 영역 -->
	<div class="board_top-buttons" style="width: 1520px; height: 20px;">
		<!-- 버튼 또는 내용 추가 -->
	</div>

	<!-- 게시물 카테고리 목록 -->
	<div class="board_category_list">
		<!-- 정보를 공유해요 -->
		<p>정보를 공유해요</p>

		<!-- 1. 자유게시판 -->
		<div class="category">
		<h3>1. 자유게시판</h3>
		<!-- 자유게시판 내용 추가 -->
		<!-- 게시물 개수 표시 -->
		<span class="post_count">게시물 개수: X</span>
		</div>

		<!-- 2. 질문게시판 -->
		<div class="category">
		<a>2. 질문게시판</a>
		<!-- 질문게시판 내용 추가 -->
		<!-- 게시물 개수 표시 -->
		<span class="post_count">게시물 개수: Y</span>

		<!-- 질문게시판에 종속된 카테고리들 -->
		<ul class="sub_boardcategories">
			<li>HTML <span class="boardpost_count">게시물 개수: Z1</span></li>
			<li>CSS <span class="boardpost_count">게시물 개수: Z2</span></li>
			<li>JS <span class="boardpost_count">게시물 개수: Z3</span></li>
			<!-- 나머지 카테고리들도 동일하게 추가 -->
		</ul>
		</div>
	</div>

	<!-- 베너 배경 -->
	<div class="board_banner_background" style="width: 1920px; height: 485px;">
		<!-- 이미지 또는 내용 추가 -->
	</div>

	<!-- 게시물 전체 영역 -->
	<div class="post_area" style="width: 645px; height: 1720px;">
		<!-- 게시물 내용 추가 -->
	</div>
	<router-view></router-view>
	</div>
</template>

<script>
export default {
	name: 'BoardComponent'
}
</script>


<style scoped>
/* 스타일들은 그대로 유지 */
</style>







