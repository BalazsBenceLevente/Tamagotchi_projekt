<template>
        <ul id="statul">
                <li><p>Pet name:</p><p>{{ pet.petname }}</p></li>
                <li><p>Mood level:</p><p>{{ pet.mood }}</p></li>
                <li><p>Hunger level:</p><p>{{ pet.hunger }}</p></li>
                <li><p>Thirst level:</p><p>{{ pet.thirst }}</p></li>
                <li><p>Fatigue level:</p><p>{{ pet.fatigue }}</p></li>
                <li><p>Birth date:</p><p>{{ pet.birth }}</p></li>
        </ul>
</template>
<script>
export default {
        props: {
                pet: Object
        }
}
</script>

<style scoped>
li{
        list-style: none;
        display: flex;
        justify-content: space-between;
}
</style>