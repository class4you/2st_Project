<template>
    <div class="carousel">
      <div class="slides" :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
        <div v-for="(slide, index) in slides" :key="index" class="slide">
          <!-- Your slide content goes here -->
          <img :src="slide.image" alt="Slide Image">
          <h3>{{ slide.title }}</h3>
        </div>
      </div>
      <button @click="prevSlide">Previous</button>
      <button @click="nextSlide">Next</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        slides: [
          { title: 'Slide 1', image: 'slide1.jpg' },
          { title: 'Slide 2', image: 'slide2.jpg' },
          { title: 'Slide 3', image: 'slide3.jpg' },
        ],
        currentSlide: 0,
      };
    },
    methods: {
      nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
      },
      prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
      },
    },
  };
  </script>
  
  <style scoped>
  .carousel {
    width: 100%;
    overflow: hidden;
    position: relative;
  }
  
  .slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }
  
  .slide {
    width: 100%;
  }
  
  button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
  }
  </style>