<script>
import {http} from '../helper/http.js'
import NavBar from "../components/NavBar.vue"
export default{
    components:{
        NavBar,
    },
    data(){
        return{
            user: '',
            isloading: true
        }
    },
    methods:{
        async currentUser(){
            const response = await http.get('user/' + localStorage.getItem('userid'),{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            this.user = response.data.data.username;
            this.isloading = false;
        },
        async deleteAcc(){
            const response = await http.delete('deleteuser/' + localStorage.getItem('userid'),{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            this.$router.push({name: 'login'});
        }
    },
    mounted(){
        this.currentUser();
    }

}
</script>

<template>
    <NavBar />
    <div class="alert alert-info" v-if="isloading" role="alert">
  Loading...
</div>
    <div class="container" v-if="!isloading">
        <div class="row">
        <div class="col">
            <h1>Welcome {{ this.user }}</h1>
            <button class="btn btn-danger" @click="deleteAcc()">Delete account</button>
        </div>
    </div>
    </div>
</template>

<style scoped>
div{
    text-align: center;
    margin-top: 20px;
}
</style>