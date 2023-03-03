<template>
     <div class="row mb-3">
            <div class="col">
                <h2>Register</h2>
            </div>
        </div>
        <div class="row mb-3 p-4">
            <div class="col">
                <form @submit.prevent="$emit('registerUser', newUser)">
                    <label for="username">Felhasználónév</label><br>
                    <input type="text" name="username" id="username" class="form-control" v-model="newUser.username">

                    <label for="password">Jelszó</label><br>
                    <input type="password" name="password" id="password" class="form-control" v-model="newUser.password">
                    <label for="password_confirmation">Jelszó újra</label><br>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" v-model="newUser.password_confirmation">
                    <br>
                    <button class="btn btn-warning text-dark" type="submit">Regisztráció</button>
                    <button class="btn btn-warning text-dark" @click="redirect()">Bejelentkezés</button>
                </form>
            </div>
        </div>
</template>

<script>

export default{
data(){
    return{
        newUser:{
            username: "",
            password: "",
            password_confirmation: ""
        }
    }
},
methods:{
   redirect(){
    this.$router.push({name: 'login'});
   }     
},
emits:[
        "registerUser"
]
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
    margin: 10px;
    border-radius: 40px;
}
</style>