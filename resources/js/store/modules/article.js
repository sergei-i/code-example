export const namespaced = true;

export const state = {
    article: {
        comments: [],
        tags: [],
        counter: {
            likes: 0,
            views: 0,
        }
    },
    isLiked: false,
    commentSent: false,
    errors: [],
}

export const getters = {
    articleLikes: (state) => state.article.counter.likes,
    articleViews: (state) => state.article.counter.views,
}

export const mutations = {
    SET_ARTICLE(state, payload) {
        state.article = payload;
    },
    SET_IS_LIKED(state, payload) {
        state.isLiked = payload;
    },
    SET_COMMENT_SENT(state, payload) {
        state.commentSent = payload;
    }
}

export const actions = {
    getArticleData({commit}, id) {
        axios
            .get(`/api/v1/articles/${id}`)
            .then(({data}) => {
                commit('SET_ARTICLE', data);
            }).catch(() => {
        });
    },
    incrementViews({commit, state}) {
        setTimeout(() => {
            axios
                .put(`/api/v1/articles/${state.article.id}/views/increment`)
                .then(({data}) => {
                    commit('SET_ARTICLE', data);
                }).catch(() => {
            });
        }, 5000)
    },
    incrementLike({commit, state}) {
        axios
            .put(`/api/v1/articles/${state.article.id}/likes/increment`)
            .then(({data}) => {
                commit('SET_ARTICLE', data);
                commit('SET_IS_LIKED', true);
            }).catch(() => {
        });
    },
    decrementLike({commit, state}) {
        axios
            .put(`/api/v1/articles/${state.article.id}/likes/decrement`)
            .then(({data}) => {
                commit('SET_ARTICLE', data);
                commit('SET_IS_LIKED', false);
            }).catch(() => {
        });
    },
    addComment({commit, dispatch, state}, {subject, body}) {
        axios
            .post(`/api/v1/articles/${state.article.id}/comments/store`, {subject, body})
            .then((response) => {
                dispatch('getArticleData', state.article.id);
                commit('SET_COMMENT_SENT', true);
            }).catch(({response}) => {
            if (response.status === 422) {
                state.errors = response.data.errors;
            }
        });
    }
}
