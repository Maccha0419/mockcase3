<template>
    <form class="form" action="/sell" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="csrf">
        <div class="form__group">
            <div class="form__group-content">
                <label for="item_img">商品画像</label>
                <div class="form__image-contents">
                    <label class="form__image-edit">
                        <img :src="item_img" class="form__image" type="" id="item_img">
                        <input class="form__image-select" type="file" name="item_img" ref="preview" @change="upload()" style="display:none">
                        <div v-if="!item_img" class="form__image-text">画像を編集する</div>
                    </label>
                </div>
                <div class="error-log" >
                    <p class="error" v-for="value in error.item_img">{{ value }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-name">
                <h2 class="form__group-title">商品の詳細</h2>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <label for="name">カテゴリー</label>
                    <input type="category" name="category" id="category" v-model="category">
                </div>
                <div class="error-log">
                    <p class="error" v-for="value in error.category">{{ value }}</p>
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <label for="condition">商品の状態</label>
                    <input type="condition" name="condition" id="condition"  v-model="condition">
                </div>
                <div class="error-log">
                    <p class="error" v-for="value in error.condition">{{ value }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-name">
                <h2 class="form__bottom-title">商品名と説明</h2>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <label for="item_name">商品名</label>
                    <input type="item_name" name="item_name" id="item_name" v-model="item_name">
                </div>
                <div class="error-log">
                    <p class="error" v-for="value in error.item_name">{{ value }}</p>
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <label for="brand">ブランド名</label>
                    <input type="brand" name="brand" id="brand" v-model="brand">
                </div>
                <div class="error-log">
                    <p class="error" v-for="value in error.brand">{{ value }}</p>
                </div>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <label for="description">商品の説明</label>
                    <textarea type="description" name="description" id="description" v-model="description" rows="5" cols="100"></textarea>
                </div>
                <div class="error-log">
                    <p class="error" v-for="value in error.description">{{ value }}</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-name">
                <h2 class="form__bottom-title">販売価格</h2>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <label for="price">販売価格</label>
                    <input type="price" name="price" id="price" v-model="price">
                </div>
                <div class="error-log">
                    <p class="error" v-for="value in error.price">{{ value }}</p>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">出品する</button>
        </div>
    </form>
</template>

<script>
export default {
    props: ['old', 'errors'],
    data() {
        return {
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            category: this.old.category,
            condition: this.old.condition,
            item_name: this.old.item_name,
            brand: this.old.brand,
            price: this.old.price,
            description: this.old.description,
            item_img: this.old.item_img,
            error: {
                category: this.errors.category,
                condition: this.errors.condition,
                item_name: this.errors.item_name,
                brand: this.errors.brand,
                price: this.errors.price,
                description: this.errors.description,
                item_img: this.errors.item_img,
            },
        };
    },
    methods: {
        upload() {
            const file = this.$refs.preview.files[0];
            this.item_img = window.URL.createObjectURL(file);
        },
    }
}
</script>
