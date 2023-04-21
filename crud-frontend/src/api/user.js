import {ref} from 'vue'
import axios from 'axios';
import { useRouter } from 'vue-router'

export default function useUser(){
    const token = ref([]);
    const errors = ref([])
    const router = useRouter()

    axios.defaults.baseURL ="http://127.0.0.1:8000/api/v1/auth/"

      const loginUser = async(data)=>{
        try{
            await axios.post('login',data)
            await router.push({name:"TaskIndex"});
        }catch(error){
            if(error.response.status=== 422){
                errors.value= error.response.data.errors
            }
        }

      }

      const registerUser = async(data)=>{
        try{
            await axios.post('register',data)
            await router.push({name:"TaskIndex"});
        }catch(error){
            if(error.response.status=== 422){
                errors.value= error.response.data.errors
            }
        }

      }


    return {
        token,
        loginUser,
        registerUser,
        errors
    }
}
