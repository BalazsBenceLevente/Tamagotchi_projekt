<template>
    <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <Router-link class="navbar-brand" to="/pet">Kedvenc</Router-link>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
         <Router-link class="nav-link active" aria-current="page" to="/account">Fiók</Router-link>
        </li>
      </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <button id="logout" class="btn btn-danger nav-link active" aria-current="page" @click="logout">Kijelentkezés</button>
            </li>
        </ul>
    </div>
  </div>
</nav>
</template>
<style>
nav{
    background-color: #D89E0A;
    font-weight: bold;
}
Router-link{
    text-decoration: none;
    color:black;
    font-size: larger;
}
</style>

<script setup>
import {http} from '../helper/http.js';
import {useRouter} from "vue-router";
const router = useRouter();
async function logout(){
  const response = await http.get('logout',{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
  localStorage.clear();
  router.push({name:'login'});
}
</script>