<template>
  <div class="d-flex">
    <button class="border-none" @click="storeOrDeleteFavorite()">
      <v-btn v-if="isFavorite" class="ma-3 border-none" text icon color="deep-orange lighten-2">
        <span class="mt-2">いいねなう</span>
        <v-icon class="ml-2">mdi-thumb-up</v-icon>
      </v-btn>
      <v-btn v-else class="ma-3 border-none" text icon color="lighten-2">
        <span class="mt-2">いいねする</span>
        <v-icon class="ml-2">mdi-thumb-up</v-icon>
      </v-btn>
    </button>
    <p class="mt-5 ml-9">{{ setFavoriteCount }}</p>
  </div>
</template>

<script>
export default {
  props: ['favoriteCount', 'restaurantId', 'userId', 'favoriteId'],

  data() {
    if (!this.favoriteId) {
      var isFavorite = false;
    } else {
      var isFavorite = true;
    }

    return {
      setFavoriteCount: this.favoriteCount,
      setFavoriteId: this.favoriteId,
      isFavorite: isFavorite
    };
  },
  methods: {
    async storeOrDeleteFavorite() {
      if (!this.setFavoriteId) {
        const favoriteData = new FormData()
        favoriteData.append('restaurantId', this.restaurantId)
        const response = await axios.post(`/favorites`, favoriteData)
          .then(response => {
            this.setFavoriteCount = response.data.favorite_count;
            this.setFavoriteId = response.data.favorite_id;
            this.isFavorite = true;
          });
      } else {
        const response = await axios.delete(`/favorites/${this.setFavoriteId}`, {
          data: {
            restaurantId: this.restaurantId
          }
        })
        .then(response => {
          this.setFavoriteCount = response.data.favorite_count;
          this.setFavoriteId = response.data.favorite_id;
          this.isFavorite = false;
        });
      }
    }
  }
};
</script>
