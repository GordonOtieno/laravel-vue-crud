import {ref} from 'vue'
import axios from 'axios';
import { useRouter } from 'vue-router'
export default function useTasks(){
    const tasks= ref([]);
    const task = ref([]);
    const errors = ref([])
    const router = useRouter()


    axios.defaults.baseURL ="http://127.0.0.1:8000/api/v1/"

    const getTasks = async()=>{
      const response = await axios.get("tasks");
      tasks.value= response.data.data
    };

    const getTask = async(id)=>{
        const response = await axios.get("tasks/"+id);
        task.value= response.data.data;
      };

      const storeTask = async(data)=>{
        try{
            await axios.post('tasks',data)
            await router.push({name:"TaskIndex"});
        }catch(error){
            if(error.response.status=== 422){
                errors.value= error.response.data.errors
            }
        }

      }

      const updateTask = async(id)=>{
        try{
            await axios.put('tasks/'+id,task.value)
            await router.push({name:"TaskIndex"});
        }catch(error){
            if(error.response.status === 422){
                console.log(error);
                errors.value= error.response.data.errors
            }
        }
      };

      const destroyTask = async(id) => {
        if(!window.confirm("Are you sure to delete?")){
            return
        }
        await axios.delete('tasks/'+id)
        await getTasks();
       
      }


    return {
        task,
        tasks,
        getTask,
        getTasks,
        storeTask,
        updateTask,
        destroyTask,
        errors
    }
}