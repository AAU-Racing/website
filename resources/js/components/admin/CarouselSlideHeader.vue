<template>
    <tr>
        <th scope="col">Label</th>
        <th scope="col">Image</th>
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