<template>
  <form action="" @submit.prevent="save" class="w-1/2 mx-auto mb-5">
    <div class="mb-2">
      <input type="text" class="border border-black focus:border-blue-300 w-full py-2 rounded" v-model="form.title" placeholder="Titre">
    </div>
    <div class="mb-2">
      <textarea cols="30" rows="10" class="border border-black focus:border-blue-300 w-full py-2 rounded" v-model="form.content" placeholder="Contenu"></textarea>
    </div>
    <div class="mb-2 flex items-center">
      <input type="checkbox" v-model="form.published" value="1">
      <span class="ml-2">En ligne ?</span>
    </div>
    <div class="flex justify-between">
      <button type="reset" @click.prevent="$emit('cancel')" class="bg-gray-100 text-black px-6 py-2 rounded">
        Annuler
      </button>
      <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">
        Enregister
      </button>
    </div>
  </form>
</template>

<script>
export default {
    name: "Form",

    props: {
      post: {
        required: false,
        type: Object,
        default: () => { return {} }
      }
    },

    components: {},

    data() {
        return {
          form : {
            title: '',
            content: '',
            published: false,
          }
        };
    },

    computed: {
      saveMethod() {
        return Object.keys(this.post).length>0 ? 'update' : 'create'
      }
    },

    methods: {
      save() {
        this[this.saveMethod]();
      },
      update() {

      },
      create() {
        axios.post('/api/posts', this.form)
          .then(() => this.$emit('saved'))
      }
    }
}
</script>
