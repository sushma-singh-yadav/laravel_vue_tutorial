<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class=" mt-2 p-4">
                    <h1 class="h1 text-center">Contact List</h1>
                    
                    <table class="table table-bordered row-border" id="contactTable" >
                        <thead class="table-primary">
                            <tr>
                            <th>Name</th>
                            <th class="emailStyle">Email</th>
                            <th class="phoneStyle dt-head-right">Phone</th>
                            <th class="messageStyle">Message</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                            <th>Name</th>
                            <th class="emailStyle">Email</th>
                            <th class="phoneStyle dt-head-right">Phone</th>
                            <th class="messageStyle">Message</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import $ from 'jquery';
import axios from 'axios';
import DataTable from 'datatables.net-dt';
import { ref, onMounted } from 'vue';

var dataSource = ref([]);

onMounted(()=>{
    var table = $('#contactTable').DataTable({
        initComplete: function () {
            this.api()
                .columns()
                .every(function () {
                    let column = this;
                    let title = column.footer().textContent; //title 
    
                    // Create input element
                    let input = document.createElement('input');
                    input.placeholder = title;
                    column.footer().replaceChildren(input);
    
                    // Event listener for user input
                    input.addEventListener('keyup', (event) => {
                        // if(event.keyCode == 13)
                        // {
                            console.log(column.search());
                            console.log('vslue',this.value);
                            if (column.search() !== this.value) {
                                column.search(input.value).draw();
                            }
                       // }
                    });
                });
        },
        processing: true,
        serverSide:true,
        order: [[1,'desc'],[0,'asc']],
        ajax:{
            url:'http://localhost:8000/api/contact-list',
            dataSource: 'data'
        },
        columns:[
            { 
                data: "name",
                name: 'name'
            },
            { 
                data: "email",
                name: 'email'
            },
            { 
                data: "phone", 
                className: "dt-body-right",
                name: 'phone' 
            },
            { 
                data: "message",
                name: 'message'  
            },
            { 
                data: "actions",
                name: 'actions', 
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
.theadBg{
    color: black;
}
.messageStyle{
    width:40%;
}
.emailStyle{
width: 15%;
}
</style>