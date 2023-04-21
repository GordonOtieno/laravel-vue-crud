<template>
    <div class="mt-12">
      <form class="max-w-l max-auto p-4 bg-white shadow-md rounded" @submit.prevent="registerUser">
        <div class="space-y-6">
          <div class="mb-6">
            <label for="email_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
            <input v-model="email_address" type="email" id="email_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
          <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input v-model="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
        </div>
        <div class="mt-5">
          <button type="submit" class="px-4 py-2 bg-indigo-700 text-white rounded">Register</button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        email_address: '',
        password: '',
      }
    },
    methods: {
      async registerUser() {
        const data ={
                email_address: this.email_address,
                password: this.password,
            }
            console.log(data);
        try { 
          const response = await axios.post('http://127.0.0.1:8000/api/v1/auth/register', data);
          //localStorage.setItem('token', response.data.token);
          // Do something else with the token if needed
        } catch (error) {
          console.error(error);
          // Handle the error in some way
        }
      },
    },
  }
  </script>
  