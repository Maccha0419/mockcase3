<template>
    <div>
        <div>
            <button v-if="!liked" type="button" class="liked" @click="like(itemId)">グレー星</button>
            <button v-else type="button" class="unliked" @click="unlike(itemId)">黄色星</button>
        </div>
        <p class="like__number">{{ like_number }}</p>
    </div>
</template>

<script>
export default {
    props: ['userId', 'itemId', 'defaultLiked', 'likeNumber'],
    data() {
        return {
            liked: false,
            like_number: this.likeNumber
        };
    },
    created() {
        this.liked = this.defaultLiked
    },
    methods: {
        like(itemId) {
            let url = `/api/item/${itemId}/like`
            axios.post(url, {
                user_id: this.userId
            })
                .then(response => {
                    this.liked = true,
                    this.like_number = response.data[0]
                })
                .catch(error => {
                    alert(error)
                });
        },
        unlike(itemId) {
            let url = `/api/item/${itemId}/unlike`
            axios.post(url, {
                user_id: this.userId
            })
                .then(response => {
                    this.liked = false,
                    this.like_number = response.data[0]
                })
                .catch(error => {
                    alert(error)
                });
        }
    }
}
</script>
