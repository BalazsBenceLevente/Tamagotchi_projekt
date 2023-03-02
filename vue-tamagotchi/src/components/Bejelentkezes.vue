<template>
        <div class="row mb-3">
            <div class="col">
                <h2>Login</h2>
            </div>
        </div>
        <div class="row mb-3 p-4">
            <div class="col">
                <form @submit.prevent="login">
                    <label for="username">Username:</label><br>
                    <input type="text" name="username" id="username" class="form-control" v-model="userData.username">

                    <label for="password">Password:</label> <br>
                    <input type="password" name="password" id="password" class="form-control" v-model="userData.password">
                    <br>
                    <button class="btn btn-warning" type="submit">Login</button>
                </form>
            </div>
        </div>
        <div class="row mb-3">
                <Router-link class="btn btn-warning" to="/signup">Sign up</Router-link>
        </div>
</template>
<script setup>
import {reactive,ref} from 'vue';
import {http} from '../helper/http.js';
import {useRouter} from "vue-router";

const router = useRouter();

const userData = reactive({
    username: '',
    password: ''
});

const error = ref(null);


async function login(){
    const response = await http.post('login', userData);
    if(response.status !== 200){
        error.value = response.statusText
    }else{
        console.log(response.data);
        localStorage.setItem('token',response.data.data.token);
        localStorage.setItem('userid',response.data.data.userid);
        if(response.data.data.pets.length == 0)
        {
            router.push({name:'create'});
        }
        else{
            localStorage.setItem('petid',response.data.data.pets[0].id)
            router.push({name:'pet'});
        }
        
    }
}

</script>
<style scoped>

.row {
    background-color: #D89E0A;
    border-radius: 40px;
    color: black;
    width: 70%;
    text-align: center;
    margin: auto;
}
p{
    margin:auto;
    text-decoration: none;
    color:black;
}

input {
    width: 70%;
    margin: auto;
    border-radius: 40px;
}

label {
    padding: 10px;
    font-size: larger;
}
.btn{
    border-radius: 40px;
}
</style>