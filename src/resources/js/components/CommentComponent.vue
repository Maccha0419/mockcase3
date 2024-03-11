<template>
    <div class="comment__content">
        <div class="comment">
            <div class="comment__button" @click='active = !active'></div>
            <div class="comment__number">
                <p class="comment__number-content">{{ commentNumber }}</p>
            </div>
            <div class="error-log">
                <p class="error" v-for="value in error.comment">{{ value }}</p>
            </div>
        </div>
        <transition class="comment__form">
            <div class="comment__form-content" v-show="active">
                <div class="comment_form-line" v-for="comment in comments" v-bind:key="comment.id">
                    <div class="comment_form-line_content" v-if="comment.user.user_id != userId">
                        <div class="" v-if="comment.user.profile">
                            <img v-if="comment.user.profile.img_url" :src="'../storage/img/profile/' + comment.user.profile.img_url" alt="">
                        </div>
                        <img v-else :src="'../storage/img/no-image.jpg'" alt="">
                        <p class="comment_form-line_name">{{ comment.user.name }}</p>
                        <p class="comment_form-line_comment">{{ comment.comment }}</p>
                    </div>
                    <div class="comment_form-line_content-myself" v-else>
                        <p class="comment_form-line_name">{{  }}</p>
                        <img v-if="comment.user.profile.img_url" :src="'../storage/img/profile/' + comment.user.profile.img_url" alt="">
                        <img v-else :src="'../storage/img/no-image.jpg'" alt="">
                        <p class="comment_form-line_comment">{{ comment.comment }}</p>
                    </div>
                </div>
                <form class="comment-form-content__form" action="/comment" method="post">
                    <input type="hidden" name="_token" :value="csrf">
                    <input class="reservation-form__id" name="item_id" type="hidden" v-model="itemId">
                    <input class="reservation-form__id" name="user_id" type="hidden" v-model="userId">
                    <input type="textarea" class="comment__form-mycomment" name="comment" v-model="comment">
                    <button class="comment__form-button">提出する</button>
                </form>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    props: ['old', 'errors', 'userId', 'itemId', 'commentNumber', 'comments'],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            active: false,
            comment: this.old.comment,
            error: {
                comment: this.errors.comment,
            }
        };
    },
}
</script>