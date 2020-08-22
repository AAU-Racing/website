<template>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col" class="fit"></th>
        <th scope="col" class="fit" v-if="can_delete"></th>
        <th scope="col" class="fit"></th>
    </tr>
</template>

<script>
    export default {
        props: ['can_delete']
    }
</script>
