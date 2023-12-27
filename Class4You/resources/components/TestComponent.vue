<template>
	<div>
	  <div>
		<button @click="prevYear">&lt;</button>
		<span>{{ selectedYear }}</span>
		<button @click="nextYear" :disabled="isNextYearDisabled">&gt;</button>
	  </div>
	  <!-- 이곳에 데이터 표시나 다른 처리를 추가하세요 -->
	</div>
  </template>
  
  <script>
  export default {
	data() {
	  return {
		selectedYear: new Date().getFullYear(),
		startDate: '',
		endDate: '',
	  };
	},
	computed: {
	  isNextYearDisabled() {
		const currentYear = new Date().getFullYear();
		return this.selectedYear === currentYear;
	  },
	},
	methods: {
	  fetchYearData() {
		// 선택된 연도에 따른 데이터를 여기에서 처리하세요
		// 예: API 호출 또는 데이터 처리 로직
		console.log(`Fetching data for year ${this.selectedYear}`);
		
		// 데이터의 시작일과 종료일 설정
		this.startDate = `${this.selectedYear}01-01`;
		this.endDate = `${this.selectedYear}12-31`;
  
		// API 호출 또는 컨트롤러로 데이터 전송
		this.sendDataToController();
	  },
	  sendDataToController() {
		// 여기에서 데이터를 컨트롤러로 전송하는 로직을 추가하세요
		// 예: axios 또는 fetch를 사용하여 API 호출
		console.log(`Sending data to controller: ${this.startDate} ~ ${this.endDate}`);
	  },
	  prevYear() {
		this.selectedYear--;
		this.fetchYearData();
	  },
	  nextYear() {
		if (!this.isNextYearDisabled) {
		  this.selectedYear++;
		  this.fetchYearData();
		}
	  },
	},
	mounted() {
	  this.fetchYearData();
	},
  };
  </script>
  
  <style>
  /* 필요한 스타일링을 추가하세요 */
  </style>