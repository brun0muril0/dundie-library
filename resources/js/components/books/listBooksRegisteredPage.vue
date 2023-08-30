<template>
    <div class="py-10 px-6 mx-auto max-w-6xl">
        <h1 class="text-2xl font-bold lg:text-4xl">Confira nossa lista completa de livros!</h1>
        <p class="mt-1 text-sm text-slate-400">Na lista abaixo poderá ser visualizada as informações do livro, edita-lo ou exclui-lo</p>
        <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <article v-for="(book, index) in books" :key="index" class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                <div class="relative flex items-center overflow-hidden rounded-xl cursor-pointer" @click="openBookModal(book)">
                    <img :src="book.cover" alt="Capa do livro"/>
                </div>
                <div class="mt-1 p-2">
                    <h2 class="text-slate-700 font-bold">{{ book.title }}</h2>
                    <p class="mt-1 text-sm text-slate-400">{{ book.gender }}</p>
                    <div class="flex justify-between mt-3">
                        <button class="text-sm px-4 py-1.5 bg-white space-x-1.5 rounded-lg text-blue-500 border-solid border border-blue-500  duration-100" @click="openDeleteModal">Excluir</button>
                        <button class="text-sm px-4 py-1.5 bg-blue-500 space-x-1.5 rounded-lg text-white duration-100 hover:bg-blue-600" @click="openEditModal(book)">Editar</button>
                    </div>
                </div>
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
                                <p class="text-sm text-gray-900"><span class="font-semibold">Autor(a):</span> {{ selectedItem.author }}</p>
                                <p class="text-sm text-gray-900"><span class="font-semibold">Gênero:</span> {{ selectedItem.gender }}</p>
                                <p class="text-sm text-gray-900"><span class="font-semibold">Publicação:</span> {{ selectedItem.publication }}</p>
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

        <!-- Modal de confirmação de exclusão -->
        <TransitionRoot :show="deleteModal">
            <Dialog class="relative z-10" @close="deleteModal = false">
                <TransitionChild enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
                </TransitionChild>

                <div class="fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <TransitionChild enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <DialogTitle class="text-lg font-semibold leading-6 text-gray-900">Excluir livro</DialogTitle>
                                <div class="mt-2">
                                <p class="text-sm text-gray-500">Você tem certeza que deseja excluir o livro? Todos os registros serão completamente apagados.</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Excluir</button>
                            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" @click="deleteModal = false">Cancelar</button>
                        </div>
                        </DialogPanel>
                    </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Modal de edição de livro -->
        <TransitionRoot :show="editModal">
            <Dialog class="relative z-10" @close="editModal = false">
            <TransitionChild enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <TransitionChild enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <DialogPanel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 w-full sm:mx-4 sm:mt-0 text-left">
                                    <DialogTitle class="text-lg font-semibold leading-6 text-gray-900">Editar informações</DialogTitle>
                                    <div class="grid grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-12 pt-4">
                                        <div class="sm:col-span-full">
                                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                                            <div class="mt-2">
                                                <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                                                    <input v-model="selectedItem.title" type="text" name="title" id="title" autocomplete="title" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o título do livro" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-full">
                                            <label for="author" class="block text-sm font-medium leading-6 text-gray-900">Autor(a)</label>
                                            <div class="mt-2">
                                                <select v-model="selectedItem.author" id="author" name="author" autocomplete="author-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-bg-blue-500 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option>Autor 1</option>
                                                <option>Autor 2</option>
                                                <option>Autor 3</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="sm:col-span-full">
                                        <label for="gender" class="block text-sm font-medium leading-6 text-gray-900">Gênero</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                                            <input v-model="selectedItem.gender" type="text" name="gender" id="gender" autocomplete="gender" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o gênero do livro" />
                                            </div>
                                        </div>
                                        </div>


                                        <div class="col-span-full">
                                        <label for="synopsis" class="block text-sm font-medium leading-6 text-gray-900">Sinopse</label>
                                        <div class="mt-2">
                                            <textarea v-model="selectedItem.synopsis" id="synopsis" name="synopsis" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-bg-blue-500 sm:text-sm sm:leading-6 pl-1" placeholder="Insira a sinopse do livro" />
                                        </div>
                                        </div>
                            
                                        <div class="col-span-full">
                                        <label for="capa-livro" class="block text-sm font-medium leading-6 text-gray-900">Capa do livro</label>
                                        <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                            <div class="text-center">
                                            <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-bg-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-bg-blue-500 focus-within:ring-offset-2 hover:text-bg-blue-600">
                                                <span>Escolher arquivo</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                                                </label>
                                                <p class="pl-1">ou arraste e solte aqui</p>
                                            </div>
                                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, JPEG abaixo de 10MB</p>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="sm:col-span-4">
                                        <label for="publication" class="block text-sm font-medium leading-6 text-gray-900">Ano de publicação</label>
                                        <div class="mt-2">
                                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                                            <input v-model="selectedItem.publication" type="date" name="publication" id="publication" autocomplete="publication" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"/>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" class="inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:hover:bg-blue-600 sm:ml-3 sm:w-auto">Salvar</button>
                            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" @click="editModal = false">cancelar</button>
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
  data() {
    return {
      books: [
        {
          title: 'Dom Quixot',
          author: 'Carlos Barbosa',
          gender: 'Drama', 
          synopsis: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate.',
          cover: 'images/capa_livro.jpg',
          publication: '11/11/2011'
        },
        {
          title: 'O Grande Gatsby',
          author: 'Autor 2',
          gender: 'Drama', 
          synopsis: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate.',
          cover: 'images/capa_livro.jpg',
          publication: '11/11/2011'
        },
        {
          title: 'Cem Anos de Solidão',
          author: 'Autor 3',
          gender: 'Drama', 
          synopsis: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tristique eu dui at molestie. Integer diam justo, viverra vitae lectus in, venenatis tristique sapien. Curabitur lobortis dolor tellus, eget vulputate.',
          cover: 'images/capa_livro.jpg',
          publication: '11/11/2011'
        },
        
      ],
      selectedItem: null,
      bookModal: false,
      deleteModal: false,
      editModal: false,
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

    openDeleteModal() {
      this.deleteModal = true;
    },

    openEditModal(book) {
      this.selectedItem = book;
      this.editModal = true;
    },
  }
}
</script>