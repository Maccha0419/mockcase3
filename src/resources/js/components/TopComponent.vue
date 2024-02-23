<template>
    <div class="top__content">
        <div class="top__header">
            <div class="top__header-recommendation">
                <button v-if="!liked" type="button" class="recommendation_on">おすすめ赤</button>
                <button v-else type="button" class="recommendation_off" @click="b(liked)">おすすめ黒</button>
            </div>
            <div class="top__header-mylist">
                <button v-if="!liked" type="button" class="mylist_on" @click="a(liked)">マイリスト黒</button>
                <button v-else type="button" class="mylist_off">マイリスト赤</button>
            </div>
        </div>
        <div class="top__inner" v-for="item in data_items" v-bind:key="item.id">
            <a v-bind:href="`item/${item.id}`">
                <input class="item__card-img" name="img_url" type="image" v-bind:src="item.img_url" alt="商品">
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: ['userId','items'],
    data() {
        return {
            liked: false,
            data_items: this.items,
        };
    },
    methods: {
        a(liked) {
            let url = `/api/item/mylist`
            axios.post(url, {
                user_id: this.userId,
            })
                .then(response => {
                    this.liked = true;
                    this.data_items = response.data;
                })
                .catch(error => {
                    alert(error)
                });
        },
        b(liked) {
            let url = `/api/item/recommendation`
            axios.post(url, {
                user_id: this.userId,
            })
                .then(response => {
                    this.liked = false;
                    this.data_items = response.data;
                })
                .catch(error => {
                    alert(error)
                });
        },
    }
}
</script>
