<template>
   <div class="mt-4">
       <ul class="list-group">
           <li class="list-group-item active text-light text-center">Menu</li>
           <li class="list-group-item"> <router-link to="/today">Rendez vous du jour</router-link> </li>
           <li class="list-group-item"> <router-link to="/content">Liste des rendez vous</router-link> </li>
           <li class="list-group-item"><router-link to="/example">Créer un rdv</router-link></li>
       </ul>
   </div>
</template>

<script>
    export default {}
</script>

<style scoped>

</style>
