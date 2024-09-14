<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class=" mt-2 p-4">
                    <h1 class="h1 text-center">Contact List</h1>

                    <table class="table table-bordered row-border w-100" id="contactTable" >
                        <thead class="table-primary">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import $ from 'jquery';
import moment from 'moment';
import DataTable from 'datatables.net-dt';
import { ref, onMounted } from 'vue';

var dataSource = ref([]);
var table = ref();

onMounted(()=>{
    table = $('#contactTable').DataTable({
        initComplete: function () {
            let api = this.api();
            console.log(api);

            api.on('click', 'tbody td', function(){
                api.search(this.innerHTML).draw();
            });
        },
        processing: true,
        serverSide: true,
        ajax:{
            url:'http://localhost:8000/api/contact-list',
            dataSource: 'data'
        },
        order: [1,'asc'],
        columns:[
            { 
                data: "name",
                name: 'name',
                width: '15%'
            },
            { 
                data: "email",
                name: 'email',
                width: '10%'
            },
            { 
                data: "phone", 
                className: "dt-body-right",
                width: '15%',
                name: 'phone' 
            },
            { 
                data: "created_at",
                name: 'created_at',
                width: '15%',
                render: function(data){
                    return moment(data).format('DD/MM/YYYY')
                }
            },
            { 
                data: "actions",
                name: 'actions', 
                width: '15%',
                render: function (params) {
                    var str ='';
                     str += '<button class="btn btn-primary">Edit</button>';
                     str += '<button class="btn btn-danger">Delete</button>';
                    return str;
                } },
        ]
    });
})

</script>
<style>
[type=button]{
         background-color: #0d6efd;
}
</style>