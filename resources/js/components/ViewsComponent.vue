<template>
    <span class="badge bg-danger">
        {{ articleViews }}
        <i class="far fa-eye"></i>
    </span>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
    computed: {
        ...mapGetters('article', {
            articleViews: 'articleViews',
        }),
    },
}
</script>
