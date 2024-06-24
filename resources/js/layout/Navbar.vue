<template>
    <div class="container-fluid bg-primary">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <nav class="navbar navbar-expand-lg navbar-dark ">
                        <a class="navbar-brand" href="#">Demo</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                          <ul class="navbar-nav">
                            <li class="nav-item" v-for="(menu,i) in menus" :key="i">      
                              <div class="dropdown" v-if="menu.submenu.length > 0">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{menu.menu_name}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li v-for="(submenu,j) in menu.submenu" :key="j">
                                      <router-link class="dropdown-item" :to="{name: submenu.submenu_name}">{{submenu.submenu_name}}</router-link>
                                    </li>
                                </ul>
                              </div>
                              <div class="dropdown" v-else>
                                <router-link class="nav-link" :to="{name: menu.menu_name}">{{menu.menu_name}}</router-link>
                              </div>
                            </li>
                              
                          </ul>
                        </div>
                      </nav>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    mounted() {
        console.log("Component mounted.");
        this.menuList();
    },
    data() {
        return {
            menus: []
        }
    },
    methods: {
        menuList()
        {
            axios.get('http://localhost:8000/api/menu-list').then((res)=>{
                console.log(res);
                this.menus = res.data.data;
            }).catch((err)=>{
                console.log(err);
            })
        }
    }
};
</script>
