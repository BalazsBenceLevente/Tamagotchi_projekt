<template>
    <NavBar />
    <div class="alert alert-info" v-if="isloading" role="alert">
  Loading...
</div>
<div class="container petcontainer" v-if="!isloading">
    <div class="stat">
        <KedvencAdat :pet="pet" />
    </div>
    <div class="pet">
        <Kedvenc :animal="animal"/>
        <KedvencAkcio/>
    </div>
</div>
</template>
<script>
import {http} from '../helper/http.js'
import NavBar from "../components/NavBar.vue"
import KedvencAdat from "../components/KedvencAdat.vue"
import Kedvenc from "../components/Kedvenc.vue"
import KedvencAkcio from "../components/KedvencAkcio.vue"

export default{
    components:{
    NavBar,
    KedvencAdat,
    Kedvenc,
    KedvencAkcio
},
    data(){
return{
    pet: {},
    animal:{},
    isloading: true
}
},
    
methods:{
        async petStats(){
            const response = await http.get('pet/'+localStorage.getItem('petid'),{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            this.pet = response.data.data;
            this.Animaldata()
        },
        async Animaldata(){
            const response = await http.get('animal/'+this.pet.animals_id,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            this.animal = response.data.data;
            this.isloading = false;
        }
},
mounted(){
    this.petStats()
}
}

</script>
<style scoped>
.items{
    background-color:rgb(216, 158, 10);
    margin-top: 20px;
    border-radius: 40px;
    padding: 20px;
    color: black;
    text-align: center;
    height: 65%;
}
.pet{
    background-color: rgba(216, 158, 10, 70%);
    margin-top: 20px;
    border-radius: 40px;
    padding: 20px;
    color: black;
    text-align: center;
}
.stat{
    background-color: rgba(216, 158, 10, 70%);
    margin: auto;
    margin-top: 20px;
    border-radius: 40px;
    padding: 20px;
    color: black;
}

</style>