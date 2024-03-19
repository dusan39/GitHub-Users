<template>
  <Head title="GitHub Users List" />
  <div>
    <div class="title__container">
      <h1 class="title">GitHub users list API</h1>
    </div>
    <div class="cards__grid">
      <userCard v-for="user in users" :key="user.username" :user="user" />
    </div>
  </div>
</template>
  
<script setup>
  import { ref, onMounted } from 'vue';
  import { usePage, Head } from '@inertiajs/vue3';
  import userCard from '../Components/userCard.vue';
  
  //const { props } = usePage();
  
  const users = ref([]);
  
  onMounted(async () => {
  try {
    const response = await fetch('/github-users');
    const responseData = await response.json();
    users.value = responseData.map(user => ({
      username: user.login,
      avatarUrl: user.avatar_url,
      url: user.url
    }));
  } catch (error) {
    console.error('Errore nel recupero dei dati degli utenti GitHub:', error);
  }
});

</script>  

<style lang="scss">

  .title__container{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px;

    h1{
      font-size: 32px;
      font-weight: bold;
    }
  }

  @media (min-width: 860px) {
    .cards__grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px; 
    }
  }

</style>