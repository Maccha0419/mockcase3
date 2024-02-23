<template>
    <div class="comment__content">
        <div class="comment__button" @click='active = !active'>コメント</div>
        <p class="comment__number">{{ comment_number }}</p>
        <transition class="comment__form">
            <div class="comment__form-content" v-show="active">
                <input type="textarea" class="comment__form-mycomment" v-model="itemComment">
                <button class="comment__form-button" @click="post(itemId, itemComment)">提出する</button>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    props: ['userId', 'itemId', 'commentNumber'],
    data() {
        return {
            active: false,
            itemComment: "",
            comment_number: this.commentNumber
        };
    },
    methods: {
        post(itemId, itemComment) {
            let url = `/api/item/${itemId}/comment`
            axios.post(url, {
                user_id: this.userId,
                comment: this.itemComment
            })
                .then(response => {
                    this.active = false,
                    this.comment_number = response.data[0]
                })
                .catch(error => {
                    alert(error)
                });
        },
    }
}
</script>