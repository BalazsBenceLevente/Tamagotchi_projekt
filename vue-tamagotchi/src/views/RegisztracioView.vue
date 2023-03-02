<script>
import Signup from '../components/Regisztracio.vue'
import {http} from '../helper/http.js'

export default{
    components:{
        Signup
    },
    methods:{
        async registerUser(newUser){
            const response = await http.post('newuser',newUser);
            this.$router.push({name: 'login'});
        }
    }
}

</script>
<template>
    <div class="container-fluid">
        <Signup @register-user="registerUser"/>
    </div>
</template>
<style scoped>
.container-fluid {
    width: 800px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    margin: auto;
    margin-top: 10%;

}
</style>
