<template>
    <span
        class="badge likesButton"
        :class="isLiked ? 'bg-danger': 'bg-primary'"
        role="button"
        @click="toggleLike"
    >
        {{ articleLikes }}
        <i class="far fa-thumbs-up"></i>
    </span>
</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex';

export default {
    computed: {
        ...mapState('article', {
            isLiked: 'isLiked',
        }),
        ...mapGetters('article', {
            articleLikes: 'articleLikes',
        }),
    },
    methods: {
        ...mapActions('article', {
            incrementLike: 'incrementLike',
            decrementLike: 'decrementLike',
        }),
        toggleLike() {
            this.isLiked
                ? this.decrementLike()
                : this.incrementLike();
        },
    },
}
</script>
