<template>
    <div class="py-10 mx-auto max-w-6xl px-6 flex flex-col items-center">
        <h1 class="text-2xl font-bold lg:text-4xl pb-10">Cadastre um novo livro</h1>
        <form @submit.prevent="createBook" class="bg-white p-6 rounded-md w-screen max-w-xs sm:max-w-md md:max-w-2xl">
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
              <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                  <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500">
                      <input v-model="form.title" type="text" name="title" id="title" autocomplete="title" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o título do livro" />
                    </div>
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Autor(a)</label>
                  <div class="mt-2">
                    <select v-model="form.author" id="author" name="author" autocomplete="author-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-bg-blue-500 sm:text-sm sm:leading-6">
                      <option v-for="author in authors" :key="author.id_author" :value="author.id_author">{{ author.name }}</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-span-full">
                  <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gênero</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500">
                      <input v-model="form.gender" type="text" name="gender" id="gender" autocomplete="gender" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o gênero do livro" />
                    </div>
                  </div>
                </div>


                <div class="col-span-full">
                  <label for="synopsis" class="block text-sm font-medium leading-6 text-gray-900">Sinopse</label>
                  <div class="mt-2">
                    <textarea v-model="form.synopsis" id="synopsis" name="synopsis" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-bg-blue-500 sm:text-sm sm:leading-6 pl-1" placeholder="Insira a sinopse do livro" />
                  </div>
                </div>
      
                <div class="col-span-full">
                  <label for="cover" class="block text-sm font-medium leading-6 text-gray-900">Link do armazenado da capa do livro</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500">
                      <input v-model="form.cover" type="url" name="cover" id="cover" autocomplete="cover" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o link da imagem" />
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="publication" class="block text-sm font-medium leading-6 text-gray-900">Ano de publicação</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                      <input v-model="form.publication" type="date" name="publication" id="publication" autocomplete="publication" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="cancel" class="text-sm font-semibold leading-6 text-gray-900" @click="clearForm">Cancel</button>
            <button type="submit" class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-bg-blue-500">Cadastrar</button>
          </div>
        </form>
    </div>
</template>
  
<script>
import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid';
import axios from 'axios';

export default {
  props: [
    "authors"
  ],

  data(){
    return {
      form: {
        title: '',
        author: '',
        gender: '',
        synopsis: '',
        cover: '',
        publication: ''
      }
    };
  },

  components: {
    PhotoIcon,
    UserCircleIcon,
  },

  methods: {
    clearForm() {
      this.form = {
        title: '',
        author: '',
        gender: '',
        synopsis: '',
        cover: '',
        publication: ''
      };
    },

    async createBook() {
      const bookData = this.form;

      console.log(bookData.author);
      try {
        await axios.post('/api/book', bookData);
        this.clearForm();
        window.location.reload();
        
      } catch (error) {
        console.error('Erro ao cadastrar o livro:', error);
      }
    }
  }
}
</script>