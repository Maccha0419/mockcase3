<template>
    <div class="top__content">
        <div class="top__header">
            <div class="top__header-button">
                <button v-if="!liked" type="button" class="button_on">出品した商品</button>
                <button v-else type="button" class="button_off" @click="a(liked)">出品した商品</button>
            </div>
            <div class="top__header-button">
                <button v-if="!liked" type="button" class="button_off" @click="b(liked)">購入した商品</button>
                <button v-else type="button" class="button_on">購入した商品</button>
            </div>
        </div>
        <div class="top__inner">
            <div class="top__inner-card" v-for="item in items" v-bind:key="item.id">
                <a v-bind:href="`item/${item.id}`">
                    <input class="item__card-img" name="img_url" type="image" :src="'../storage/img/item/' + item.img_url" alt="商品">
                </a>
            </div>
            <div class="dummy"></div>
            <div class="dummy"></div>
            <div class="dummy"></div>
            <div class="dummy"></div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['userId', 'myItems', 'soldItems'],
    data() {
        return {
            liked: false,
            items: this.myItems,
        };
    },
    methods: {
        a(liked) {
            this.liked = false;
            this.items = this.myItems;
        },
        b(liked) {
            this.liked = true;
            this.items = this.soldItems;
        },
    }
}
</script>
