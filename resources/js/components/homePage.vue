<template>
  <div class="py-10 px-6 mx-auto max-w-6xl">
    <!-- Coleção de livros -->
    <h1 class="text-2xl font-bold lg:text-4xl">Confira a nossa coleção de livros!</h1>
    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      <article v-for="(book, index) in books" :key="index" class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
        <a href="#">
          <div class="relative flex items-center overflow-hidden rounded-xl">
            <img :src="book.cover" alt="Capa do livro" />
          </div>
          <div class="mt-1 p-2">
            <h2 class="text-slate-700 font-bold">{{ book.title }}</h2>
            <p class="mt-1 text-sm text-slate-400">{{ book.gender }}</p>
            <div class="mt-3 flex justify-between items-center">
              <p class="text-sm font-semi-bold text-blue-500">{{ book.author.name }}</p>
              <button class="text-sm  px-2 py-1 space-x-1 sm:space-x-1.5 rounded-lg bg-blue-500 text-white duration-100 hover:bg-blue-600" @click="openBookModal(book)">Saiba mais</button>
            </div>
          </div>
        </a>
      </article>
    </div>

    <!-- Coleção de autores -->
    <h1 class="text-2xl font-bold lg:text-4xl">Confira nossos grandes autores literários!</h1>
    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      <article v-for="(author, index) in authors" :key="index" class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
        <a href="#">
          <div class="mt-1 p-2">
            <h2 class="text-slate-700 font-bold">{{ author.name }} {{ author.surname }}</h2>
            <div class="mt-3 flex justify-between items-center gap-2">
              <p class="text-sm font-semi-bold text-blue-500">{{ author.country }}</p>
              <button class="text-sm  px-3 py-1 space-x-1 sm:space-x-1.5 rounded-lg bg-blue-500 text-white duration-100 hover:bg-blue-600" @click="openAuthorModal(author)">Saiba mais</button>
            </div>
          </div>
        </a>
      </article>
    </div>

    <!-- Modal com as informações do livro -->
    <TransitionRoot  :show="bookModal">
      <Dialog class="relative z-10" @close="bookModal = false">
        <TransitionChild enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </TransitionChild>
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <TransitionChild enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
              <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 py-4">
                  <div class="sm:flex sm:items-start">
                    <div class="mt-3 sm:mt-0 text-left">
                      <DialogTitle  class="text-base font-semibold leading-6 text-gray-900">{{ selectedItem.title }}</DialogTitle>
                      <div class="mt-2">
                        <p class="text-sm text-gray-900"><span class="font-semibold">Autor(a):</span> {{ selectedItem.author.name }}</p>
                        <p class="text-sm text-gray-900"><span class="font-semibold">Gênero:</span> {{ selectedItem.gender }}</p>
                        <p class="text-sm text-gray-900"><span class="font-semibold">Publicação:</span> {{ selectedItem.publication_year }}</p>
                        <p class="mt-2 text-sm text-gray-500 text-justify">{{ selectedItem.synopsis }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </DialogPanel>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>

    <!-- Modal com as informações do(a) autor(a) -->
    <TransitionRoot  :show="authorModal">
      <Dialog class="relative z-10" @close="authorModal = false">
        <TransitionChild enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </TransitionChild>
        <div class="fixed inset-0 z-10 overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <TransitionChild enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
              <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 py-4">
                  <div class="sm:flex sm:items-start">
                    <div class="mt-3 sm:mt-0 text-left">
                      <DialogTitle  class="text-base font-semibold leading-6 text-gray-900">{{ selectedItem.name }} {{ selectedItem.surname }}</DialogTitle>
                      <div class="mt-2">
                        <p class="text-sm text-gray-900"><span class="font-semibold">Local de nascimento:</span> {{ selectedItem.country }}</p>
                        <p class="text-sm text-gray-900"><span class="font-semibold">Data de nascimento:</span> {{ selectedItem.birthday }}</p>
                        <p class="mt-2 text-sm text-gray-500 text-justify">{{ selectedItem.biography }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </DialogPanel>
            </TransitionChild>
          </div>
        </div>
      </Dialog>
    </TransitionRoot>

  </div>
</template>

<script>

import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';

export default {
  props: [
    "authors",
    "books"
  ],
  
  data() {
    return {
      selectedItem: null,
      bookModal: false,
      authorModal: false,
    };
  },

  components: {
    Dialog,
    DialogPanel,
    TransitionRoot,
  },

  methods: {
    openBookModal(book) {
      this.selectedItem = book;
      this.bookModal = true;
    },
    openAuthorModal(author) {
      this.selectedItem = author;
      this.authorModal = true;
    },
  }
}
</script>