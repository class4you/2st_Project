<template>
    <div>
      <carousel :perPage="3" :perPageCustom="[[0, 1], [480, 2], [768, 3]]">
        <slide v-for="item in items" :key="item.id">
          <!-- 캐러셀 아이템 내용 -->
          <div class="carousel-item">
            <img :src="item.image" alt="Carousel Item" />
            <div class="carousel-caption">{{ item.caption }}</div>
          </div>
        </slide>
      </carousel>
    </div>
  </template>
  
  <script>
  import { Carousel, Slide } from 'vue-carousel';
  
  export default {
    name: 'TestComponent',
    components: {
      Carousel,
      Slide,
    },
    data() {
      return {
        items: [
          { id: 1, image: 'image1.jpg', caption: 'Caption 1' },
          { id: 2, image: 'image2.jpg', caption: 'Caption 2' },
          { id: 3, image: 'image3.jpg', caption: 'Caption 3' },
          // 추가적인 아이템들
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  .carousel-item {
    text-align: center;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
  }
  </style>