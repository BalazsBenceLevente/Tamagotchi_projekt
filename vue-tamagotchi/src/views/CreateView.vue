<template>
    <NavBar />
    <div class="container">
        <CreateForm />
    </div>
</template>
<script>
import NavBar from "../components/NavBar.vue"
import CreateForm from '../components/CreateForm.vue';

export default{
    components:{
        NavBar,
        CreateForm
    },
}
</script>