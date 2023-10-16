<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2 p-4">
                    <h1 class="h1 text-center">Contact List</h1>

                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(items, index) in contactList">
                                <td>{{items.name}}</td>
                                <td>{{items.email}}</td>
                                <td>{{items.phone}}</td>
                                <td>{{items.message}}</td>
                                <td>
                                   <router-link :to="{path: '/contact-edit/' + items.id}" class="btn btn-primary">Edit</router-link>
                                   <!-- <router-link :to="{path: '/contact-delete/' + items.id}" class="btn btn-danger">Delete</router-link> -->
                                   <button class="btn btn-danger" @click="deleteContact(items.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios  from 'axios';
import Swal from 'sweetalert2';
const host = import.meta.env.VITE_PUSHER_HOST;
const port = import.meta.env.VITE_PUSHER_PORT;
const api = import.meta.env.VITE_PUSHER_API_PREFIX;

export default {
    data() {
        return {
            contactList: []
        }
    },
    mounted() {
        console.log('mounted')
        this.getContactList();
    },
    methods: {
        getContactList()
        {
            console.log('method called')
            axios.get(host + ':' + port + "/" + api + "/contact-list").then((res)=>{
                
                let status = res.data.status;
                if(status == 200){
                    this.contactList = res.data.data
                }
            }).catch((err)=>{
                console.log(err)
            })
        },
        deleteContact(contactId)
        {
            console.log(contactId);
            Swal.fire({
                title: 'Are you sure you want to delete?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                denyButtonText: `Don't delete`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    //axios request
                    axios.delete(host + ':' + port + "/" + api + "/contact-delete/" + contactId).then((res)=>{
                        
                        let status = res.data.status;
                        if(status == 200){
                            this.getContactList();
                            Swal.fire('Saved!', '', 'success')
                        }
                    }).catch((err)=>{
                        console.log(err);
                        Swal.fire('Something went wrong', '', 'info')
                        console.log(err)
                    })
                    
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
                })
        }
    },
}
</script>