<template>
  <div>
    <h2 class="border-bottom col-lg-12 my-3">新着投稿一覧</h2>
    <div class="row">
      <div v-for="restaurant in restaurants" :key="restaurant.index" class="col-lg-4 mt-2">
        <div class="card h-100">
          <a href="/">
            <img class="card-img-top" :src="restaurant.image_name"
              alt="ワンコインランチの画像">
          </a>
          <div class="card-body">
            <h4>
              <a v-bind:href="`/restaurant/show/${restaurant.id}`">{{ restaurant.store_name }}</a>
            </h4>
            <div>
              {{ restaurant.high_budget }}円~{{ restaurant.low_budget }}円
            </div>
            <p>
              {{ restaurant.address }}
            </p>
            <div class="text-right">
              <a v-bind:href="`/user/profile/${restaurant.user.id}`">{{ restaurant.user.name }}</a>
            </div>
            <v-btn v-if=restaurant.category_id_1 color="primary" class="m-1"
              v-bind:href="`/category/search/${restaurant.category_id_1 }`">
                {{ categoryList[0][ restaurant.category_id_1 ] }}
            </v-btn>
            <v-btn v-if=restaurant.category_id_2 color="primary" class="m-1"
              v-bind:href="`/category/search/${restaurant.category_id_2 }`">
                {{ categoryList[0][ restaurant.category_id_2 ] }}
            </v-btn>
            <v-btn v-if=restaurant.category_id_3 color="primary" class="m-1"
              v-bind:href="`/category/search/${restaurant.category_id_3 }`">
                {{ categoryList[0][ restaurant.category_id_3 ] }}
            </v-btn>
            <v-btn v-if=restaurant.category_id_4 color="primary" class="m-1"
              v-bind:href="`/category/search/${restaurant.category_id_4 }`">
                {{ categoryList[0][ restaurant.category_id_4 ] }}
            </v-btn>
            <v-btn v-if=restaurant.category_id_5 color="primary" class="m-1"
              v-bind:href="`/category/search/${restaurant.category_id_5 }`">
                {{ categoryList[0][ restaurant.category_id_5 ] }}
            </v-btn>
            <div v-if="userId" class="d-flex justify-content-end mt-3">
              <div v-if="restaurant.is_favorite">
                <favorite-component :user-id="userId" :restaurant-id="restaurant.id" :favorite-id="restaurant.favorite_id_by_auth" :favorite-count="restaurant.favorites.length"></favorite-component>
              </div>
              <div v-else class="d-flex justify-content-end mt-3">
                <favorite-component :user-id="userId" :restaurant-id="restaurant.id" :favorite-count="restaurant.favorites.length"></favorite-component>
              </div>
            </div>
            <div v-else>
              <div class="d-flex justify-content-end mt-3">
                <v-icon color="red" class="material-icons mr-2">
                  favorite
                </v-icon>{{ restaurant.favorites.length }}
              </div>
            </div>
          </div>
        </div>
      </div>
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