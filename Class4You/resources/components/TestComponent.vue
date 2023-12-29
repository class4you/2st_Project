<template>
	<div>
	  <iframe
		width="560"
		height="315"
		:src="embedUrl"
		frameborder="0"
		allowfullscreen
	  ></iframe>
	</div>
  </template>
  
  <script>
  export default {
	data() {
	  return {
		videoId: 'AXlLlRLyx-Y',
	  };
	},
	computed: {
	  embedUrl() {
		return `https://www.youtube.com/embed/${this.videoId}`;
	  },
	},
  };
  </script>
  
  <style scoped>
  /* 스타일을 추가할 수 있습니다. */
  </style>