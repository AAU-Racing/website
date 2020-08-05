<template>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Link</th>
        <th scope="col">Logo</th>
        <th scope="col">Active</th>
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
