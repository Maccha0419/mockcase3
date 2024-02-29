<template>
    <div class="top__content">
        <div class="top__header">
            <div class="top__header-button">
                <button v-if="!liked" type="button" class="button_on">おすすめ</button>
                <button v-else type="button" class="button_off" @click="b(liked)">おすすめ</button>
            </div>
            <div class="top__header-button">
                <button v-if="!liked" type="button" class="button_off" @click="a(liked)">マイリスト</button>
                <button v-else type="button" class="button_on">マイリスト</button>
            </div>
        </div>
        <div class="top__inner">
            <div class="top__inner-card" v-for="item in data_items" v-bind:key="item.id">
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
