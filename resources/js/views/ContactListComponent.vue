<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class=" mt-2 p-4">
                    <h1 class="h1 text-center">Contact List</h1>

                    <table class="table table-bordered row-border w-100" id="contactTable" >
                        <thead class="table-primary">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
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
import axios from 'axios';
import DataTable from 'datatables.net-dt';
import { ref, onMounted } from 'vue';

var dataSource = ref([]);

function format(d) {
    console.log(d);
    // `d` is the original data object for the row
    return (
        '<div>' +
        '<p> <strong>Full name : </strong> '+ d.name +'</p>' +
        '<p> <strong>Email : </strong> '+ d.email +'</p>' +
        '<p> <strong>Phone : </strong> '+ d.phone +'</p>' +
        '<p> <strong>Message : </strong> '+ d.message +'</p>' +
        '</div>'
    );
}

onMounted(()=>{
    var table = $('#contactTable').DataTable({
        initComplete: function () {
            // Add event listener for opening and closing details
            table.on('click', 'td.dt-control', function (e) {
                let tr = e.target.closest('tr');
                let row = table.row(tr);
            
                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                }
                else {
                    // Open this row
                    row.child(format(row.data())).show();
                }
            });
        },
        processing: true,
        serverSide:true,
        ajax:{
            url:'http://localhost:8000/api/contact-list',
            dataSource: 'data'
        },
        rowId: 'id',
        stateSave:true,
        order:[1,'asc'],
        columns:[
            { 
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
                width: '5%'
            },
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
                data: "message",
                name: 'message',
                width: '40%',
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

    table.on('requestChild.div', function(e,row){
        row.child(format(row.data())).show();
    })
})

</script>
<style>

</style>