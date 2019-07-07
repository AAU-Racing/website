<template>
    <tr>
        <td scope="row">{{ element.name }}</td>
        <td>{{ element.title }}</td>
        <td class="fit">
            <a :href="element.edit_url" v-if="element.editable"><i class="fas fa-edit"></i></a>
        </td>
        <td class="fit">
            <form method="POST" v-if="!element.special" :action="element.delete_url" >
                <input type="hidden" name="_method" value="delete" />
                <input type="hidden" name="_token" :value="csrf">
                <button type="submit" class="btn btn-link no-border no-padding"><i class="fas fa-trash"></i></button>
            </form>
        </td>
        <td class="fit">
            <i class="fa fa-align-justify handle"></i>
        </td>
    </tr>
</template>
<script>
    export default {
        props: ['element'],
        data: function () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').content
            }
        },
    }
</script>