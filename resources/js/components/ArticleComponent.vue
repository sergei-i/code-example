<template>
    <div class="row mt-5">
        <div class="col-12 p-3">
            <img
                class="border rounded mx-auto d-block"
                :src="article.image"
                alt="..."
            >
            <h5 class="mt-5">
                {{ article.title }}
            </h5>
            <p v-if="tags.length">
                <span
                    class="tag"
                    v-for="(tag, index) in tags"
                    :key="tag.id"
                >
                    <span>
                        {{ tag.label }}
                        <span v-if="tags.length !== (index + 1)">|</span>
                    </span>
                </span>
            </p>
            <p class="card-text">
                {{ article.content }}
            </p>
            <p>
                Опубликовано:
                <i>{{ article.createdAt }}</i>
            </p>
            <div class="mt-3">
                <views-component></views-component>
                <likes-component></likes-component>
            </div>
        </div>
    </div>
</template>

<script>
import {mapState} from 'vuex';

export default {
    computed: {
        ...mapState('article', {
            article: 'article',
        }),
        tags() {
            return this.article.tags;
        },
    },
}
</script>
