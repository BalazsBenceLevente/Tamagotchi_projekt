<template>
    <div class="row p-3">
        <div class="col"><button class="btn" id="eat" :disabled="maxhunger"  @click="editHunger()">Eat</button></div>
        <div class="col"><button class="btn" id="drink" :disabled="maxthirst" @click="editThirst()">Drink</button></div>
        <div class="col"><button class="btn" id="hunt" :disabled="fatigue" @click="huntMood()">Hunt</button></div>
        <div class="col"><button class="btn" id="pet" :disabled="maxmood" @click="editMood()">Pet</button></div>
        <div class="col"><button class="btn" id="medicine"  @click="Medicine()">Medicine</button></div>
        <div class="col"><button class="btn" id="sleep" :disabled="sleepy" @click="Sleep()">Sleep</button></div>
    </div>
</template>
<script>
import { http } from '../helper/http'
export default{
    data(){
        return{
            pet: {},
            obj: {}
        }
    },
    computed:{
        IncHunger(){
            if(this.pet.hunger > 80)
            {
            return 100;
            }
            else{
                return this.pet.hunger + 20;
            }
        },
        maxhunger(){
            return (this.pet.hunger == 100);
        },
        IncMood(){
            if(this.pet.mood > 80)
            {
            return 100;
            }
            else{
                return this.pet.mood + 20;
            }
        },
        IncMoodWithHunt(){
            if(this.pet.mood > 60)
            {
            return 100;
            }
            else{
                return this.pet.mood + 40;
            }
        },
        maxmood(){
            return (this.pet.mood == 100);
        },
        IncThirst(){
            if(this.pet.thirst > 80)
            {
            return 100;
            }
            else{
                return this.pet.thirst + 20;
            }
        },
        maxthirst(){
            return (this.pet.thirst == 100);
        },
        RedFatigue(){
            if(this.pet.fatigue < 20 )
            {
            return 0;
            }
            else{
                return this.pet.fatigue - 20;
            }
        },
        fatigue(){
            return (this.pet.fatigue == 0);
        },
        sleepy(){
            return (this.pet.fatigue > 60);
        },
        RedMedicineMood(){
            if(this.pet.mood < 60 )
            {
            return 0;
            }
            else{
                return this.pet.mood - 60;
            }
        },
        RedMedicineFatigue(){
            if(this.pet.fatigue < 10 )
            {
            return 0;
            }
            else{
                return this.pet.fatigue - 10;
            }
        },
        IncFatigue(){
            if(this.pet.fatigue > 40 )
            {
            return 100;
            }
            else{
                return this.pet.fatigue + 60;
            }
        },
        RedHunger(){
            if(this.pet.hunger < 60)
            {
            return 0;
            }
            else{
                return this.pet.hunger - 60;
            }
        },
        RedThirst(){
            if(this.pet.thirst < 60)
            {
            return 0;
            }
            else{
                return this.pet.thirst - 60;
            }
        },
    },
    methods:{
        async petStats(){
            const response = await http.get('pet/'+localStorage.getItem('petid'),{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            this.pet = response.data.data;
        },
        async Sleep(){
            this.obj = {
                hunger: this.RedHunger,
                thirst: this.RedThirst,
                mood: this.pet.mood,
                fatigue: this.IncFatigue
            }
            alert("Alszik egyet az Állatodat!");
            const response = await http.put('editpetstat/'+localStorage.getItem('petid'), this.obj,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            window.location.reload();
        },
        async editHunger(){
            this.obj = {
                hunger: this.IncHunger,
                thirst: this.pet.thirst,
                mood: this.pet.mood,
                fatigue: this.pet.fatigue
            }
            alert("Megetetted az Állatodat!");
            const response = await http.put('editpetstat/'+localStorage.getItem('petid'), this.obj,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            window.location.reload();
        },
        async Medicine(){
            this.obj = {
                hunger: this.pet.hunger,
                thirst: this.pet.thirst,
                mood: this.RedMedicineMood,
                fatigue: this.RedMedicineFatigue
            }
            alert("Szurit adtál az Állatodnak!");
            const response = await http.put('editpetstat/'+localStorage.getItem('petid'), this.obj,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            window.location.reload();
        },
        async editThirst(){
            this.obj = {
                hunger: this.pet.hunger,
                thirst: this.IncThirst,
                mood: this.pet.mood,
                fatigue: this.pet.fatigue
            }
            alert("Megitattad az Állatodat!");
            const response = await http.put('editpetstat/'+localStorage.getItem('petid'), this.obj,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            window.location.reload();
        },
        async editMood(){
            this.obj = {
                hunger: this.pet.hunger,
                thirst: this.pet.thirst,
                mood: this.IncMood,
                fatigue: this.pet.fatigue
            }
            alert("Megsimogattad az Állatodat!");
            const response = await http.put('editpetstat/'+localStorage.getItem('petid'), this.obj,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            window.location.reload();
        },
        async huntMood(){
            this.obj = {
                hunger: this.pet.hunger,
                thirst: this.RedThirst,
                mood: this.IncMoodWithHunt,
                fatigue: this.RedFatigue
            }
            const response = await http.put('editpetstat/'+localStorage.getItem('petid'), this.obj,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
            window.location.reload();
        }
    },
    mounted(){
        this.petStats();
    }
}




</script>
<style scoped>
button{
    background-color: brown;
    padding: 10px;
    color:wheat;
}
</style>
