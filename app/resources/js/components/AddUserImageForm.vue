<template>
  <v-row justify="center">
    <p v-if="image === ''" class="mr-5">プロフィール画像はまだありません</p>
    <img v-else class="avatar-img mb-5" alt="" v-bind:src='image'>
    <v-dialog v-model="dialog" max-width="500">
      <v-card>
        <form class="form" @submit.prevent="submit">
        <v-card-title class="headline">画像編集</v-card-title>
        <v-card-text>
          <p v-if="errMsg" class="required">{{ errMsg }}</p>
            <label class="image-form-btn mt-5">
              ＋写真を選択
              <input type="file" style="display:none;" name="userImage" accept="image/*" v-on:change="onFileChange">
            </label>
          <div v-if="addImage">
            <img class="mt-5 avatar-img-preview" v-bind:src="addImage">
          </div>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn type="submit" color="secondary" dark>変更する</v-btn>
          <v-btn text @click="dialog = false">やめる</v-btn>
        </v-card-actions>
        </form>
      </v-card>
    </v-dialog>
    <v-btn class="ma-4" color="primary" @click.stop="dialog = true">
      画像編集
    </v-btn>
  </v-row>
</template>

<script>
export default {
  props: {
    id: {
      type: [String, Number],
    },
    image: {
      type: String,
    }
  },
  data () {
    return {
      dialog: false,
      addImage: null,
      userImage: null,
      errMsg: null,
    }
  },
  methods: {
    onFileChange(e) {
      const files = e.target.files;
      if(files.length > 0) {
        const file = files[0]
        const reader = new FileReader()
        reader.onload = (e) => {
            this.addImage = e.target.result
        };
        reader.readAsDataURL(file);
      }
      this.userImage = event.target.files[0]
    },
    async submit () {
      const formData = new FormData()
      formData.append('file', this.userImage)
      formData.append('userId', this.id)
      const response = await axios.post('/api/user/image', formData)
        .then(response =>{
          this.image = response.data
          this.userImage = null,
          this.addImage = null
          this.dialog = false
        })
        .catch(err => {
          this.errMsg = "※ エラーです。容量の小さい画像など、違う画像を投稿してください。"
        });
    }
  }
}
</script>
