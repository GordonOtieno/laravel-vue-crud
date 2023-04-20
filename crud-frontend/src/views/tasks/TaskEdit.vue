<script setup>
import useTasks from '../../api/tasks';
import useStatus from '../../api/status';
import { onMounted } from 'vue';
const { statuses, getStatuses } = useStatus();

const {task,getTask, updateTask, errors} = useTasks();

const props = defineProps({
  id:{
    required:true,
    type:String
  }
})

onMounted(()=>{
  getTask(props.id)
  getStatuses()
  })
</script>

<template>
   <div class="mt-12">
    <form class="max-w-l max-auto p-4 bg-white shadow-md rounded" @submit.prevent="updateTask($route.params.id)">
        <div class="space-y-6">
          <div class="mb-6">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Name</label>
          <input v-model="task.name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.name">
          <span class="text-sm text-red-500">{{ errors.name[0] }}</span>
          </div>  
        </div>
          <div class="mb-6">
          <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Due Date</label>
          <input v-model="task.due_date" type="text" id="due_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.due_date">
          <span class="text-sm text-red-500">{{ errors.due_date[0] }}</span>
          </div>    
        </div>
          <div class="mb-6">
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
          <input v-model="task.description" type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <div v-if="errors.description">
          <span class="text-sm text-red-500">{{ errors.description[0] }}</span>
          </div> 
        </div>
        <div class="mb-6">
          <label for="status_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
          <select  v-model="task.status_id" id="status_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option v-for="status in statuses" :key="status.id" :value="status.id">{{ status.name }}</option>
          </select>
          </div>
        
        </div>
        <div class="mt-5">
          <button type="submit" class="px-4 py-2 bg-indigo-700 text-white rounded">Update</button>
        </div>

    </form>
  </div>
</template>
