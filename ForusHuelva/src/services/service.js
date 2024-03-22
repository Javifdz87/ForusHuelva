import axios from 'axios'

const api = axios.create({
    baseURL: 'https://daw2.ieslamarisma.net/proyectos/2024/javifernandez/agenciaseguros/laravel/public/api'

})

export default api ;