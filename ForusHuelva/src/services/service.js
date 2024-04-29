import axios from 'axios'

const api = axios.create({
    baseURL: 'http://localhost:8000/api'
    //baseURL: 'https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/forushuelva/laravel/public/api'


})

export default api ;