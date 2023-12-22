<!-- components/YouTubePlayer.vue -->
<template>
	<div>
	  <div id="youtube-player"></div>
	</div>
  </template>
  
  <script>
  export default {
	data() {
	  return {
		// YouTube 동영상 ID
		videoId: 'KUXO_swGPMk',
		// YouTube Player 객체
		player: null,
	  };
	},
	mounted() {
	  // YouTube IFrame API 초기화
	  this.initYoutubePlayer();
	},
	methods: {
	  initYoutubePlayer() {
		// YouTube Player 생성
		this.player = new window.YT.Player('youtube-player', {
		  height: '315',
		  width: '560',
		  videoId: this.videoId,
		  events: {
			'onReady': this.onPlayerReady,
			'onStateChange': this.onPlayerStateChange,
		  },
		});
	  },
	  onPlayerReady(event) {
		// 동영상이 준비되면 추가 작업 수행
		console.log('영상 시작');
	  },
	  onPlayerStateChange(event) {
		// 동영상 상태 변경 이벤트 처리
		if (event.data === window.YT.PlayerState.ENDED) {
		  // 동영상이 종료되면 완료 체크 수행
		  this.handleVideoCompletion();
		}
	  },
	  handleVideoCompletion() {
		// TODO: 동영상 완료 시 실행할 작업 수행
		console.log('영상 끝');
	  },
	},
  };
  </script>
  
  <style scoped>
  /* 필요한 스타일 추가 */
  </style>