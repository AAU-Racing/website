<template>
    <tr>
        <td scope="row">{{ element.label }}</td>
        <td>
            <a v-if="element.media.length > 0" :href="element.photo_url" target="_blank">{{ element.media[0].file_name }}</a>
            <span v-if="element.media.length == 0">No image</span>
        </td>
        <td class="fit">
            <a :href="element.edit_url"><i class="fas fa-edit"></i></a>
        </td>
        <td class="fit" v-if="can_delete">
            <form method="POST" :action="element.delete_url">
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
        props: ['element', 'can_delete'],
        data: function () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').content
            }
        },
    }
</script>