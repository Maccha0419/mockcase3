<template>
    <form class="form" action="/mypage/profile" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="user_id" v-model="userId">
        <div class="form__upper">
            <img v-if="!user_img" :src="'../storage/img/no-image.jpg'" alt="">
            <img :src="user_img" class="form__image" enctype="multipart/form-data" type="hidden">
            <label class="">画像を編集する
                <input class="form__image-edit" type="file" name="user_img" ref="preview" @change="upload()" style="display:none">
            </label>
            <div class="error-log" >
                <p class="error" v-for="value in error.user_url">{{ value }}</p>
            </div>
        </div>
        <div class="form__bottom">
            <div class="form__group">
                <div class="form__group-content">
                    <div class="form__input--text">
                        <label for="name">ユーザー名</label>
                        <input type="name" name="name" id="name" v-model="name">
                    </div>
                    <div class="error-log">
                        <p class="error" v-for="value in error.name">{{ value }}</p>
                    </div>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <label for="postcode">郵便番号</label>
                        <input type="postcode" name="postcode" id="postcode"  v-model="postcode">
                    </div>
                    <div class="error-log">
                        <p class="error" v-for="value in error.postcode">{{ value }}</p>
                    </div>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <label for="address">住所</label>
                        <input type="address" name="address" id="address" v-model="address">
                    </div>
                    <div class="error-log">
                        <p class="error" v-for="value in error.address">{{ value }}</p>
                    </div>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <label for="building">建物名</label>
                        <input type="building" name="building" id="building" v-model="building">
                    </div>
                    <div class="error-log">
                        <p class="error" v-for="value in error.building">{{ value }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">更新する</button>
        </div>
    </form>
</template>

<script>
export default {
    props: ['old', 'errors'],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            name: this.old.name,
            user_img: this.old.user_img,
            postcode: this.old.postcode,
            address: this.old.address,
            building: this.old.building,
            error: {
                name: this.errors.name,
                user_img: this.errors.user_img,
                postcode: this.errors.postcode,
                address: this.errors.address,
                building: this.errors.building,
            },
        };
    },
    methods: {
        upload() {
            const file = this.$refs.preview.files[0];
            this.user_img = window.URL.createObjectURL(file);
        },
    }
}
</script>
