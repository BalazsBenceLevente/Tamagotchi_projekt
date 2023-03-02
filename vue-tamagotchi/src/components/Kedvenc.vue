<template>
   <img :src="`/img/${animal.animalimg}`" :alt="`${animal.animalimg}`">
</template>
<script>
export default{
props:{
        animal: Object
}
}
</script>