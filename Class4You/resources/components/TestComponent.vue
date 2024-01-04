<template>
	<div class="aaaa" @mousemove="updatePosition" @mouseover="showTooltip = true" @mouseout="showTooltip = false">
		<Doughnut class="abcd" id="my-doughnut-chart-id" :options="chartOptions" :data="chartData" />
		<div v-if="showTooltip" class="tooltip" :style="{ top: `${position.y - 80}px`, left: `${position.x + 10}px` }">
			<p>20230104</p>
			<br>
			<p>학습 강의 : 1</p>
			<p>학습 챕터 : 5</p>
		</div>
	</div>
</template>

<script>
import { Doughnut } from 'vue-chartjs';
import { Chart as ChartJS, Title, DoughnutController, ArcElement, LinearScale, CategoryScale } from 'chart.js';

ChartJS.register(Title, DoughnutController, ArcElement, LinearScale, CategoryScale);

export default {
name: 'DoughnutChart',
components: { Doughnut },

methods: {
	updatePosition(event) {
		// 마우스 위치 업데이트
		this.position.x = event.clientX;
		this.position.y = event.clientY;
	}
},

data() {
	return {
		chartData: {
			labels: ['Outer', 'Inner'],
			datasets: [
				{
					data: [60, 40],
					backgroundColor: ['#FF6384', '#36A2EB'],
					hoverBackgroundColor: ['#ff3d66', '#36A2EB'],
				},
				{
					data: [30, 10],
					backgroundColor: ['#FFA07A', '#20B2AA'],
					hoverBackgroundColor: ['#FFA07A', '#20B2AA'],
				},
			],
		},

		chartOptions: {
			responsive: true,
			legend: {
				
			},
			cutoutPercentage: 10,
			plugins: {
				tooltip: {
					enabled: false,
				},
			},
		},

		showTooltip: false,
		position: { x: 0, y: 0 },
	};
}
};
</script>

<style>
.aaaa {
	width: 50px;
	position: relative;
}

.tooltip {
	position: absolute;
	background-color: #ffffff;
	color: #000000;
	padding: 10px;
	border-radius: 5px;
	z-index: 999;
	box-shadow: 0px 0px 5px 0px rgb(191, 191, 191);
	width: 100px;
	font-weight: 500;
}
</style>