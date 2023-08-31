<template>
    <div class="py-10 px-6 mx-auto max-w-6xl">
        <h1 class="text-2xl font-bold lg:text-4xl">Confira nossos grandes autores literários!</h1>
        <p class="mt-1 text-sm text-slate-400">Na lista abaixo poderá ser visualizada as informações dos autores, edita-los ou exclui-los</p>
        <div class="grid grid-cols-2 gap-6 p-2 sm:p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 justify-items-center">
        <article v-for="(author, index) in authors" :key="index" class="rounded-xl bg-white w-40 sm:w-52 p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
            <div class="mt-1 p-2 ">
                <h2 class="text-sm sm:text-slate-700 font-bold" @click="openAuthorModal(author)">{{ author.name }} {{ author.surname }}</h2>
                <p class="mt-1 text-sm text-slate-400">{{ author.country }}</p>
                <div class="flex justify-between mt-3">
                        <button class="text-sm px-2 sm:px-4 py-1.5 bg-white space-x-1 sm:space-x-1.5 rounded-lg text-blue-500 border-solid border border-blue-500  duration-100" @click="openDeleteModal(author)">Excluir</button>
                        <button class="text-sm px-2 sm:px-4 py-1.5 bg-blue-500 space-x-1 sm:space-x-1.5 rounded-lg text-white duration-100 hover:bg-blue-600" @click="openEditModal(author)">Editar</button>
                    </div>
                </div>
        </article>
        </div>

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
                                <DialogTitle class="text-lg font-semibold leading-6 text-gray-900">Excluir autor(a)</DialogTitle>
                                <div class="mt-2">
                                <p class="text-sm text-gray-500">Você tem certeza que deseja excluir o(a) autor(a)? Todos os registros serão completamente apagados.</p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto" @click="deleteAuthor">Excluir</button>
                            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" @click="deleteModal = false">Cancelar</button>
                        </div>
                        </DialogPanel>
                    </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Modal de edição do autor -->
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
                                    <form @submit.prevent="updateAuthor">
                                        <div class="grid grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-12 pt-4">
                                            <div class="sm:col-span-full">
                                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                                                <div class="mt-2">
                                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                                                        <input v-model="selectedItem.name" type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o título do livro" required/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="sm:col-span-full">
                                                <label for="surname" class="block text-sm font-medium leading-6 text-gray-900">Sobrenome</label>
                                                <div class="mt-2">
                                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                                                        <input v-model="selectedItem.surname" type="text" name="surname" id="surname" autocomplete="surname" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o título do livro" required/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="sm:col-span-4">
                                                <label for="birthday" class="block text-sm font-medium leading-6 text-gray-900">Ano de nascimento</label>
                                                <div class="mt-2">
                                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                                                        <input v-model="selectedItem.birthday" type="date" name="birthday" id="birthday" autocomplete="birthday" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="sm:col-span-full">
                                                <label for="country" class="block text-sm font-medium leading-6 text-gray-900">País de nascimento</label>
                                                <div class="mt-2">
                                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                                                        <input v-model="selectedItem.country" type="text" name="country" id="country" autocomplete="country" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o gênero do livro" required/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-span-full">
                                                <label for="biography" class="block text-sm font-medium leading-6 text-gray-900">Sinopse</label>
                                                <div class="mt-2">
                                                    <textarea v-model="selectedItem.biography" id="biography" name="biography" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-bg-blue-500 sm:text-sm sm:leading-6 pl-1" placeholder="Insira a sinopse do livro" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                            <button type="submit" class="inline-flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:hover:bg-blue-600 sm:ml-3 sm:w-auto">Salvar</button>
                                            <button type="cancel" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" @click="editModal = false">cancelar</button>
                                        </div>
                                    </form>
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
import axios from 'axios';
import { useToast } from "vue-toastification";

export default {
    props: [
        "authors"
    ],

    data() {
        return {
            selectedItem: null,
            authorModal: false,
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
        // método responsável por abrir o modal de informações do autor
        openAuthorModal(author) {
            this.selectedItem = author;
            this.authorModal = true;
        },

        // método responsável por abrir o modal de exclusão do autor
        openDeleteModal(author) {
            this.selectedItem = author;
            this.deleteModal = true;
        },

        // método responsável por abrir o modal de edição do autor
        openEditModal(author) {
            this.selectedItem = author;
            this.editModal = true;
        },

        // método responsável por atualizar um autor
        async updateAuthor() {
            const authorId = this.selectedItem.id_author;

            try {
                await axios.put(`/api/author/${authorId}`, this.selectedItem);
                this.toast.success('Autor(a) atualizado com sucesso!', {
                    timeout: 3000
                });
                this.editModal = false;

            } catch (error) {
                this.toast.error('Erro ao atualizar autor(a)!',{
                    timeout:3000
                });
                console.error('Erro ao atualizar o autor:', error);

            }
                
        },

        // método responsável por excluir um autor
        async deleteAuthor() {
            const authorId = this.selectedItem.id_author;

            try {
                await axios.delete(`/api/author/${authorId}`);
                this.toast.success('Autor(a) excluído com sucesso!',{
                    timeout: 3000
                });

                setTimeout(() => {
                    window.location.reload();
                }, 3000);

            } catch (error) {
                this.toast.error('Erro ao excluir autor(a)!',{
                    timeout:3000
                });
                console.error('Erro ao excluir o autor:', error);

            }
            
        }
    },

    setup() {
      const toast = useToast();

      return { toast }
    },
}
</script>