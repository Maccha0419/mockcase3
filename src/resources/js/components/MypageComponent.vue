<template>
    <div class="top__content">
        <div class="top__header">
            <div class="top__header-recommendation">
                <button v-if="!liked" type="button" class="recommendation_on">出品した商品赤</button>
                <button v-else type="button" class="recommendation_off" @click="a(liked)">出品した商品黒</button>
            </div>
            <div class="top__header-mylist">
                <button v-if="!liked" type="button" class="mylist_on" @click="b(liked)">購入した商品黒</button>
                <button v-else type="button" class="mylist_off">購入した商品赤</button>
            </div>
        </div>
        <div class="top__inner" v-for="item in items" v-bind:key="item.id">
            <a v-bind:href="`item/${item.id}`">
                <input class="item__card-img" name="img_url" type="image" :src="'../storage/img/item/' + item.img_url" alt="商品">
            </a>
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
