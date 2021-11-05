<template>
  <div>
    <table class="w-full">
      <thead>
      <tr class="bg-gray-100">
        <th>ID</th>
        <th>Titre</th>
        <th>En ligne ?</th>
        <th>&nbsp;</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="post in posts">
        <td v-text="post.id"></td>
        <td v-text="post.title"></td>
        <td v-if="post.published">Oui</td>
        <td v-else>Oui</td>
        <td class="text-right">
          <button type="button" class="bg-gray-100 text-black px-6 py-2 rounded" @click.prevent="show(post)">Voir
          </button>
          <button type="button" class="bg-red-500 text-white px-6 py-2 rounded" @click.prevent="remove(post)">
            Supprimer
          </button>
          <button type="button" class="bg-green-500 text-white px-6 py-2 rounded" @click.prevent="edit(post)">Editer
          </button>
        </td>
      </tr>
      </tbody>
    </table>
    <div class="fixed w-1/3 top-0 mt-5 bg-white border border-black p-10" v-if="current">
      <h1 v-text="current.title" class="text-xl bold mb-5"></h1>
      <div v-html="current.content"></div>
      <div class="text-center">
        <button type="button" class="bg-purple-500 text-white px-6 py-2 rounded" @click.prevent="current=null">Fermer
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Index",

  data() {
    return {
      current: null,
      posts: []
    };
  },

  mounted() {
    this.fetch();
  },

  methods: {
    fetch() {
      axios.get('/api/posts')
        .then(({data}) => {
          this.posts = data;
        })
    },
    remove(post) {
      if(confirm('Sûr ?')) {
        axios.delete(`/api/posts/${post.id}`)
            .then(this.fetch);
      }
    },
    edit(post) {

    },
    show(post) {
      axios.get(`/api/posts/${post.id}`)
        .then(({data})=>this.current=data);
    }
  }
}
</script>
