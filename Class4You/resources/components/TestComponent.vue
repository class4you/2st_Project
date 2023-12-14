<template>
	<div class="wrapper">
		<Carousel :autoplay="3000" :wrap-around="true">
			<Slide v-for="slide in slides" :key="slide">
				<div class="carousel__item">
					<img class="slideImg" :src="slide" />
				</div>
			</Slide>

			<template #addons>
				<Pagination />
			</template>
		</Carousel>
	</div>
  </template>
  
  <script>
  import { defineComponent } from "vue";
  import { Carousel, Pagination, Slide } from "vue3-carousel";
  import home_1 from "/img/html/1st/html1.png";
  import home_2 from "/img/html/1st/html2.png";
  import home_3 from "/img/html/1st/html3.png";

  import "vue3-carousel/dist/carousel.css"; 

export default defineComponent({
	name: "Autoplay",
	components: {
		Carousel,
		Slide,
		Pagination,
	},
	data() {
		return {
			slides: [home_1, home_2, home_3],
		};
	},
});
</script>

<style>
</style>