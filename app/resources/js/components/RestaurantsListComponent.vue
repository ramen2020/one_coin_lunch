<template>
  <div>
    <h2 class="border-bottom col-lg-12 my-3">新着投稿一覧</h2>
    <div class="row">
        <restaurant-component v-for="restaurant in restaurants" :key="restaurant.index"
          :restaurant=restaurant :user-id=userId :category-list=categoryList></restaurant-component>
    </div>
    <infinite-loading class="mt-5" spinner="waveDots" @infinite="infiniteHandler">
      <span slot="no-more"> これ以上投稿はございません </span>
      <span slot="no-results">投稿はございませんでした。</span>
    </infinite-loading>
  </div>
</template>

<script>
export default {
  props: ['userId'],
  data() {
    return {
        page:1,
        restaurants: [],
        categoryList: [],
    };
  },
  methods: {
    async infiniteHandler($state) {
        const response = await axios.get('/api/restaurants/new?page=${this.page}',{
            params: {
                page: this.page,
                per_page: 1,
            }
          }).then(({data}) => {
            this.categoryList.push(data.catogory_list)

            setTimeout(() => {
              if (this.page <= data.restaurants.data.length) {
                console.log(data.restaurants)
                  this.page += 1
                  this.restaurants.push(...data.restaurants.data)
                  $state.loaded()
              } else {
                  $state.complete()
              }
            }, 800)
          }).catch((err) => {
            $state.complete()
          });
    },
  }
};

</script>