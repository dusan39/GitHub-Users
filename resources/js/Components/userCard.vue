<template>
  <div>
    <div class="list__container">
      <div v-if="user" class="card__container">
        <h2>{{ user.username }}</h2>
        <img :src="user.avatarUrl" alt="Avatar" width="100" height="100" />
        <a :href="user.url">{{ user.url }}</a>
      </div>
      <div v-else class="card__container">
        <p>User data not available</p>
      </div>
    </div>
    
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  user: Object
});

</script>

<style lang="scss" scoped>

  .list__container{
    display: flex;
    justify-content: center;

    .card__container{
      display: flex;
      justify-content: center;
      flex-direction: column;
      align-items: center;
      border: 3px solid white;
      border-radius: 10px;
      width: 400px;
      margin: 10px 0px 10px 0px;

      h2{
        margin: 10px;
      }

      img{
        margin: 10px;
      }

      a{
        margin: 10px;
        color: white;
      }
    }
  }

  @media (max-width: 500px) {
    .list__container{
      .card__container {
        width: 300px; 

        a{
          font-size: 14px;
        }
      }
    }
  }

</style>