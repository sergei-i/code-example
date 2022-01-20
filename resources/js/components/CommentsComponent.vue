<template>
    <div class="row">
        <form
            @submit.prevent="submitForm"
            v-if="!commentSent"
        >
            <div class="mb-3">
                <label
                    class="form-label"
                    for="commentSubject"
                >
                    Тема комментария
                </label>
                <input
                    class="form-control"
                    id="commentSubject"
                    type="text"
                    v-model="subject"
                >
                <div
                    class="alert alert-warning"
                    role="alert"
                    v-if="errors.subject"
                >
                    {{ errors.subject[0] }}
                </div>
            </div>
            <div class="mb-3">
                <label
                    class="form-label"
                    for="commentBody"
                >
                    Комментарий
                </label>
                <textarea
                    class="form-control"
                    id="commentBody"
                    rows="3"
                    v-model="body"
                ></textarea>
                <div
                    class="alert alert-warning"
                    role="alert"
                    v-if="errors.body"
                >
                    {{ errors.body[0] }}
                </div>
            </div>
            <button
                class="btn btn-success"
                type="submit"
            >
                Отправить
            </button>
        </form>
        <div
            class="alert alert-success"
            role="alert"
            v-else
        >
            Комментарий успешно отправлен!
        </div>
        <div
            class="toast-container pb-2 mt-4 mx-auto"
            style="min-width: 100%;"
            v-for="comment in comments"
            :key="comment.id"
        >
            <div class="toast-header">
                <img
                    src="https://via.placeholder.com/50/5F113B/FFFFFF/?text=User"
                    class="rounded me-2"
                    alt="..."
                >
                <strong class="me-auto">
                    {{ comment.subject }}
                </strong>
                <small class="text-muted">
                    {{ comment.createdAt }}
                </small>
            </div>
            <div class="toast-body">
                {{ comment.body }}
            </div>
        </div>
    </div>
</template>

<script>
import {mapState, mapActions} from 'vuex';

export default {
    data() {
        return {
            subject: '',
            body: '',
        }
    },
    computed: {
        ...mapState('article', {
            article: 'article',
            commentSent: 'commentSent',
            errors: 'errors',
        }),
        comments() {
            return this.article.comments;
        },
    },
    methods: {
        ...mapActions('article', {
            addComment: 'addComment',
        }),
        submitForm() {
            this.addComment({
                subject: this.subject,
                body: this.body,
            });
        }
    },
}
</script>
