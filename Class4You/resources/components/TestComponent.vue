<template>
	<div>
	  <input type="date" v-model="selectedDate" @change="handleDateChange">
	  <div>
		<p>선택한 날짜: {{ formatDate(selectedDate) || '선택되지 않음' }}</p>
		<p>선택한 주의 요일:</p>
		<ul>
		  <span v-for="(weekday, index) in weekdays" :key="index">{{ weekday }}</span>
		</ul>
		<p>
		  <button @click="decrementWeek">◀</button>
		  현재 주차: {{ currentWeek }}
		  <button @click="incrementWeek">▶</button>
		</p>
	  </div>
	</div>
  </template>
  
  <script>
  export default {
	data() {
	  return {
		selectedDate: this.getCurrentDate(),
		weekdays: [],
		currentWeek: '',
	  };
	},
	mounted() {
	  this.calculateWeekdays();
	  this.calculateCurrentWeek();
	},
	methods: {
	  getCurrentDate() {
		const today = new Date();
		const year = today.getFullYear();
		const month = today.getMonth() + 1; // 월은 0부터 시작하므로 1을 더합니다.
		const day = today.getDate();
  
		return `${year}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
	  },
	  handleDateChange() {
		this.calculateWeekdays();
		this.calculateCurrentWeek();
	  },
	  calculateWeekdays() {
		const currentDate = this.selectedDate ? new Date(this.selectedDate) : new Date();
		const startDate = new Date(currentDate);
		startDate.setDate(currentDate.getDate() - (currentDate.getDay() + 6) % 7); // 주의 첫 날로 설정
  
		const weekdays = [];
		for (let i = 0; i < 7; i++) {
		  const currentDate = new Date(startDate);
		  currentDate.setDate(startDate.getDate() + i);
		  weekdays.push(this.formatDate(currentDate));
		}
  
		this.weekdays = weekdays;
	  },
	  calculateCurrentWeek() {
		const currentDate = this.selectedDate ? new Date(this.selectedDate) : new Date();
		const startOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
  
		// 요일이 월요일(1)부터 일요일(7)까지인 경우를 고려하여 조정합니다.
		const offset = (startOfMonth.getDay() + 6) % 7;
  
		const days = Math.floor((currentDate - startOfMonth + offset) / (24 * 60 * 60 * 1000)) + 1;
		const currentMonthWeek = Math.ceil(days / 7);
		this.currentWeek = `${currentDate.getMonth() + 1}월 ${currentMonthWeek}주차`;
	  },
	  formatDate(date) {
		if (date instanceof Date) {
		  const options = { weekday: 'short', locale: 'ko-KR' };
		  return date.toLocaleDateString('ko-KR', options);
		} else {
		  return ''; // 혹은 다른 처리를 수행하거나 에러 처리를 추가할 수 있습니다.
		}
	  },
	  incrementWeek() {
		const currentDate = this.selectedDate ? new Date(this.selectedDate) : new Date();
		currentDate.setDate(currentDate.getDate() + 7);
		this.selectedDate = `${currentDate.getFullYear()}-${(currentDate.getMonth() + 1).toString().padStart(2, '0')}-${currentDate.getDate().toString().padStart(2, '0')}`;
		this.calculateWeekdays();
		this.calculateCurrentWeek();
	  },
	  decrementWeek() {
		const currentDate = this.selectedDate ? new Date(this.selectedDate) : new Date();
		currentDate.setDate(currentDate.getDate() - 7);
		this.selectedDate = `${currentDate.getFullYear()}-${(currentDate.getMonth() + 1).toString().padStart(2, '0')}-${currentDate.getDate().toString().padStart(2, '0')}`;
		this.calculateWeekdays();
		this.calculateCurrentWeek();
	  },
	},
  };
  </script>
  
  <style>
  /* 스타일링을 추가하면 됩니다. */
  </style>