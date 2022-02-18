<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Category List</h5>
                        <router-link :to="{name: 'create-category'}" class="btn btn-primary">Create Category</router-link>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 100px">ID</th>
                                    <th>NAME</th>
                                    <th>SLUG</th>
                                    <th style="width: 170px">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(category, index) in categories" :key="category.id">
                                    <td style="width: 100px">{{ category.id }}</td>
                                    <td>{{ category.name }}</td>
                                    <td>{{ category.slug }}</td>
                                    <td style="width: 170px">
                                        <router-link :to="{name: 'edit-category', params: {slug: category.slug}}" class="btn btn-sm btn-primary">Edit</router-link>
                                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                categories: []
            }
        },
        methods: {
            loadCategories(){
                axios.get('/api/category').then(response => {
                    this.categories = response.data;
                })
            }
        },
        mounted() {
            this.loadCategories();
        }
    }
</script>
