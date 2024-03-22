<template>
    <div class="container">
        <h1>Blog Posts</h1>
        <!-- Select para elegir usuario -->
        <select v-model="selectedUser" @change="filterPosts">
            <option value="">Seleccionar usuario</option>
            <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
        </select>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Titulo</label>
                        <input type="text" v-model="selectedPost.title" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="">Body</label>
                        <input type="text" v-model="selectedPost.body" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-warning" @click="updatePost">Edit</button>
                        <button class="btn btn-success" @click="createPost">
                            Dar de Alta
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end">
                <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample" @click="clearFields">
                    Dar de Alta
                </button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <td>{{ post.id }}</td>
                    <td>
                        <b>{{ post.title }}</b>
                    </td>
                    <td>{{ post.body }}</td>
                    <td>
                        <button class="btn btn-warning" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                            @click="selectPost(post)">
                            Edit
                        </button>

                        <button class="btn btn-danger" @click="deletePost(post.id)">
                            Delete
                        </button>
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="
                            console.log('ID del post seleccionado:', selectedPost.id);
                        fetchComments(post.id);
                        ">
                            View comments
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li v-for="coment in comments" :key="coment.id">
                            {{ coment.body }}
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import { ref, onMounted } from "vue";

const posts = ref([]);
const selectedPost = ref({ id: null, title: "", body: "" });
const users = ref([]);
const selectedUser = ref(null);
const comments = ref([]);

// Función para cargar los posts
const fetchPosts = async () => {
    try {
        const response = await fetch("https://jsonplaceholder.typicode.com/posts");
        if (!response.ok) {
            throw new Error("Failed to fetch posts");
        }
        posts.value = await response.json();
    } catch (error) {
        console.error(error);
    }
};

// Función para cargar los usuarios
const fetchUsers = async () => {
    try {
        const response = await fetch("https://jsonplaceholder.typicode.com/users");
        if (!response.ok) {
            throw new Error("Failed to fetch users");
        }
        users.value = await response.json();
    } catch (error) {
        console.error(error);
    }
};

// Función para seleccionar un post
const selectPost = (post) => {
    selectedPost.value = { ...post };
};

// Función para eliminar un post
const deletePost = (postId) => {
    const index = posts.value.findIndex((post) => post.id === postId);
    if (index !== -1) {
        posts.value.splice(index, 1);
        console.log("Post eliminado:", postId);
    } else {
        console.error("No se encontró el post con el ID:", postId);
    }
};

// Función para obtener los comentarios de un post
const fetchComments = async (postId) => {
    console.log("Fetch comments for post ID:", postId);
    // Lógica para obtener los comentarios del post
};

// Función para filtrar los posts por usuario seleccionado
const filterPosts = () => {
    if (selectedUser.value) {
        const userId = selectedUser.value;
        // Filtrar los posts por el ID del usuario seleccionado
        filteredPosts.value = posts.value.filter((post) => post.userId === userId);
    } else {
        // Si no se ha seleccionado ningún usuario, mostrar todos los posts
        filteredPosts.value = posts.value;
    }
};

// Ejecutar la carga de posts y usuarios al montar el componente
onMounted(() => {
    fetchPosts();
    fetchUsers();
});

// Variable reactiva para almacenar los posts filtrados
const filteredPosts = ref([]);

</script>