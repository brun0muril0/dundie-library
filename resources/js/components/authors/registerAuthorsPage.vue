<template>
    <div class="py-10 mx-auto max-w-6xl px-6 flex flex-col items-center">
        <h1 class="text-2xl font-bold lg:text-4xl pb-10">Cadastrar autor(a)</h1>
        <form @submit.prevent="createAuthor" class="bg-white p-6 rounded-md w-screen max-w-xs sm:max-w-md md:max-w-2xl">
          <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
              <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                      <input v-model="form.name" type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o nome do(a) autor(a)" />
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="surname" class="block text-sm font-medium leading-6 text-gray-900">Sobrenome</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                      <input v-model="form.surname" type="text" name="surname" id="surname" autocomplete="surname" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o sobrenome do(a) autor(a)" />
                    </div>
                  </div>
                </div>

                <div class="sm:col-span-4">
                  <label for="birthday" class="block text-sm font-medium leading-6 text-gray-900">Ano de nascimento</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                      <input v-model="form.birthday" type="date" name="birthday" id="birthday" autocomplete="birthday" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"/>
                    </div>
                  </div>
                </div>
                
                <div class="sm:col-span-4">
                  <label for="country" class="block text-sm font-medium leading-6 text-gray-900">País de nascimento</label>
                  <div class="mt-2">
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-bg-blue-500 sm:max-w-md">
                      <input v-model="form.country" type="text" name="country" id="country" autocomplete="country" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Insira o país de nascimento do(a) autor(a)" />
                    </div>
                  </div>
                </div>

                <div class="col-span-full">
                  <label for="biography" class="block text-sm font-medium leading-6 text-gray-900">Biografia</label>
                  <div class="mt-2">
                    <textarea v-model="form.biography" id="biography" name="biography" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-bg-blue-500 sm:text-sm sm:leading-6 pl-1" placeholder="Insira a biografia do(a) autor(a)" />
                  </div>
                </div>
      
              </div>
            </div>
          </div>
      
          <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900" @click="clearForm">Cancel</button>
            <button type="submit" class="rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-bg-blue-500">Cadastrar</button>
          </div>
        </form>
    </div>
</template>
  
<script>
import { PhotoIcon, UserCircleIcon } from '@heroicons/vue/24/solid';
import axios from 'axios';

export default {
  data(){
    return {
      form: {
        name: '',
        surname: '',
        birthday: '',
        country: '',
        biography: ''
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
        name: '',
        surname: '',
        birthday: '',
        country: '',
        biography: ''
      };
    },

    createAuthor() {
      axios.post('/api/author', this.form)
        .then(function (response){
          this.clearForm();
        })
        .catch(function (error) {
          
        });
    }
  },

}
</script>