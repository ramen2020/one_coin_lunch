<template>
<div  class="col-lg-4 mt-2 px-1">
  <v-card class="mx-auto col-lg-8" max-width="344">
    <div>
      <img v-if=restaurant.image_name class="restaurant-img mb-5" alt="ワンコインランチの画像" :src="restaurant.image_name">
      <img v-else class="restaurant-img mb-5" alt="ワンコインランチの画像" :src=this.noImage>
    </div>
    <v-card-title>
      <a v-bind:href="`/restaurant/show/${restaurant.id}`">{{ restaurant.store_name }}</a>
    </v-card-title>
    <v-card-subtitle>{{ restaurant.low_budget }}円~{{ restaurant.high_budget }}円</v-card-subtitle>
    <v-card-text class="text--primary">
      <div>{{ restaurant.address }}</div>
      <div class="text-right">
        <a v-bind:href="`/user/profile/${restaurant.user.id}`">{{ restaurant.user.name }}</a>
      </div>
      <div class="pt-5">
        <v-btn v-if=restaurant.category_id_1 color="warning" class="ma-1" v-bind:href="`/category/search/${restaurant.category_id_1 }`">
            {{ categoryList[0][ restaurant.category_id_1 ] }}
        </v-btn>
        <v-btn v-if=restaurant.category_id_2 color="warning" class="ma-1"
          v-bind:href="`/category/search/${restaurant.category_id_2 }`">
            {{ categoryList[0][ restaurant.category_id_2 ] }}
        </v-btn>
        <v-btn v-if=restaurant.category_id_3 color="warning" class="ma-1"
          v-bind:href="`/category/search/${restaurant.category_id_3 }`">
            {{ categoryList[0][ restaurant.category_id_3 ] }}
        </v-btn>
        <v-btn v-if=restaurant.category_id_4 color="warning" class="ma-1"
          v-bind:href="`/category/search/${restaurant.category_id_4 }`">
            {{ categoryList[0][ restaurant.category_id_4 ] }}
        </v-btn>
        <v-btn v-if=restaurant.category_id_5 color="warning" class="ma-1"
          v-bind:href="`/category/search/${restaurant.category_id_5 }`">
            {{ categoryList[0][ restaurant.category_id_5 ] }}
        </v-btn>
      </div>
      <div class="pl-9">
          <div v-if="userId">
            <div v-if="restaurant.is_favorite">
              <favorite-component :user-id="userId" :restaurant-id="restaurant.id" :favorite-id="restaurant.favorite_id_by_auth" :favorite-count="restaurant.favorites.length"></favorite-component>
            </div>
            <div v-else>
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
      <v-spacer></v-spacer>
    </v-card-text>
  </v-card>
</div>
</template>

<script>
export default {
  props: {
    restaurant: {
      type: Object,
    },
    userId: {
      type: [String, Number],
    },
    categoryList: {
      type: Array,
    },
  },
  data() {
    return {
      noImage: "https://one-coin-lunch-images.s3-ap-northeast-1.amazonaws.com/icon/others/no_image.jpg"
    };
  },
}
</script>
