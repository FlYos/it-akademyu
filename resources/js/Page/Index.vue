<template>
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
        <button type="button" class="bg-red-500 text-white px-6 py-2 rounded" @click.prevent="remove(post)">Supprimer</button>
        <button type="button" class="bg-green-500 text-white px-6 py-2 rounded" @click.prevent="edit(post)">Editer</button>
      </td>
    </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: "Index",

  data() {
    return {
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

    }
  }
}
</script>
