<template>
  <div>
    <div class="text-right py-10">
      <button type="button" class="bg-blue-500 text-white rounded px-6 py-2" @click.prevent="showForm=true" v-show="!showForm">
        Ajouter un post
      </button>
    </div>
    <form-post @cancel="showForm=false"
               @saved="showForm=false;refresh()"
               v-show="showForm"></form-post>
    <index ref="index"></index>

  </div>
</template>

<script>
import Index from './Page/Index';
import FormPost from './Page/Form';

export default {
  name: "Blog",

  components: {
    Index, FormPost
  },

  data() {
    return {
      showForm: false,

      page: 'index'
    };
  },

  methods: {
    refresh() {
      this.$refs.index.fetch();
    }
  }
}
</script>
