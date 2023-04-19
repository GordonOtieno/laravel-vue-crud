import {ref} from 'vue'
import axios from 'axios';
import { useRouter } from 'vue-router'

export default function useStatus(){
    const statuses= ref([]);
    const router = useRouter()


    axios.defaults.baseURL ="http://127.0.0.1:8000/api/v1/"

    const getStatuses = async()=>{
      const response = await axios.get("status");
      statuses.value= response.data.data
    };

      const storeStatus = async(data)=>{
        try{
            await axios.post('status',data)
            await router.push({name:"TaskIndex"});
        }catch(error){
            if(error.response.status=== 422){
                errors.value= error.response.data.errors
            }
        }

      }

      const updateStatus = async(id)=>{
        try{
            await axios.put('status/'+id,task.value)
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
        statuses,
        getStatuses
          }
}