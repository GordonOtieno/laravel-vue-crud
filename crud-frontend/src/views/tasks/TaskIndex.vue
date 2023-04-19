<script setup>
import useTasks from '../../api/tasks';
import { onMounted } from 'vue';

const { tasks, getTasks,destroyTask } = useTasks();
onMounted(()=>getTasks());
</script>

<template>
  <div class="mt-12">
    <div class="flex justify-end m-2 p-2">
      <RouterLink :to="{name: 'TaskCreate'}" class="px-4 py-2 bg-indigo-700 text-white rounded">
        New Task
    </RouterLink>
    </div>
      

    <div class="relative overflow-x-auto">
      <p class="font-bold mb-5">To-do List</p>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Task
                </th>
                <th scope="col" class="px-6 py-3">
                    Due Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>

        </thead>
        <tbody>
            <tr v-for="task in tasks" :key="task.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ task.id+1 }}
                </th>
                <td class="px-6 py-4">
                    {{ task.name }}
                </td>
                <td class="px-6 py-4">
                  {{ task.due_date }}
                </td>
                <td class="px-6 py-4">
                  {{ task.description }}
                </td>
                <td cla s="px-6 py-4">
                  <RouterLink :to="{ name:'TaskEdit', params: { id: task.id} }"
                  class="px-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded"
                  >
                Edit</RouterLink>
                <button @click="destroyTask(task.id)" class="px-4 py-2 bg-red-500 ms-3 hover:bg-red-700 text-white rounded">
                    Delete
                </button>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

  </div>
</template>
