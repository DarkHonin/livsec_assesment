<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Groceries
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <div v-if='user.token.length == 0'>
                                <li class="nav-item">
                                    <a class="nav-link" href="/login">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/register">Register</a>
                                </li>
                        </div>
                        <div v-else>
                            <li class="nav-item dropdown">
                                <a  id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{user.name}}
                                    </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" @click='logout'>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        {{ user }}
        <div v-if='user.token.length != 0'>
            <GroceriesComponent v-if='groceries.length == 0' />
            <GroceriesComponent v-else v-for='(g, k) in groceries' v-bind:key='k' v-bind:item='g'/>
        </div>


    </div>


</template>

<script>

var GroceriesComponent = require('./GroceriesComponent.vue')

export default {
    name: 'main-component',
    data() {
        return {
            user: {
                name : '',
                token : ''
            },
            groceries : []
        }
    },
    components: {

        GroceriesComponent
    },

    methods: {
        logout(e){
            console.log('logging out')
            fetch('/api/logout')
        },
        updateUser(){
            var rawUser = window.localStorage.getItem('user')
            if(rawUser == null || rawUser.empty) return

            this.user = JSON.parse(window.localStorage.getItem('user'))
        }
    },

    beforeMount() {
        this.updateUser()
    },
}
</script>

<style>

</style>