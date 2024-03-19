<template>
  <div>
    <div class="list__container">
      <div v-if="user" class="card__container">
        <h2>{{ user.username }}</h2>
        <img :src="user.avatarUrl" alt="Avatar"/>
        <a @click="openURL(user.html_url)">Personal URL</a>
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

const openURL = url => {
  window.open(url, '_blank');
};

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
      border: 2px solid white;
      border-radius: 10px;
      width: 400px;
      margin: 10px 10px 10px 10px;

      h2{
        margin: 10px;
        font-size: 24px;
        font-weight: 600;
      }

      img{
        margin: 10px;
        width:150px;
        height: 150px;
      }

      a{
        margin: 10px;
        font-size: 18px;
        color: white;
        text-decoration: underline;
        cursor: pointer;
        transition: all 0.3s;

        &:hover{
          transform: scale(1.1);
        }
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