<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>

export default {
    name: 'AppComponent',

    beforeUpdate() {
    },

    created() {
    },

    updated() {
    },

    data() {
        return {
        };
    },

    methods: {
    },

    components: {
    },
}
</script>
<style>
    @import url('/css/common.css');
    #app {
  display: flex;
  flex-direction: column;
  min-height: 100vh; /* viewport의 전체 높이를 차지 */

  > header {
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  > footer {
    margin-top: auto; /* footer를 #app의 맨 아래로 보냄 */
  }
}
</style>