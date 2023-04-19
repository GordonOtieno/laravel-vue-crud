<script setup>
import {reactive} from 'vue';
import { onMounted } from 'vue';
import useTasks from '../../api/tasks';
import useStatus from '../../api/status';
const {storeTask, errors } = useTasks();
const { statuses, getStatuses } = useStatus();



const form = reactive({
    name:"",
    description:"",
    due_date:"",
    status_id:1,
})
onMounted(()=>getStatuses())
console.log(statuses)
</script>

<template>
  <div class="mt-12">
    <form class="max-w-l max-auto p-4 bg-white shadow-md rounded" @submit.prevent="storeTask(form)">
        <div class="space-y-6">
          <div class="mb-6">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Name</label>
          <input v-model="form.name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.name">
          <span class="text-sm text-red-500">{{ errors.name[0] }}</span>
          </div>  
        </div>
          <div class="mb-6">
          <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
          <input v-model="form.due_date" type="text" id="due_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.due_date">
          <span class="text-sm text-red-500">{{ errors.due_date[0] }}</span>
          </div>    
        </div>
          <div class="mb-6">
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
          <input v-model="form.description" type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.description">
          <span class="text-sm text-red-500">{{ errors.description[0] }}</span>
          </div> 
        </div>
          <div class="mb-6">
          <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User_id</label>
          <input type="text" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          </div>
        
        </div>
        <div class="mt-5">
          <button type="submit" class="px-4 py-2 bg-indigo-700 text-white rounded">Save</button>
        </div>

    </form>
  </div>
</template>
