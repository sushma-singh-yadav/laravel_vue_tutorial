<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class=" mt-2 p-4">
                    <h1 class="h1 text-center">Contact Add Form</h1>

                    <p>
                        <button id="addRow" class="btn btn-info mr-3" @click="addDatatableRow">Add Row</button>
                        <button id="submitForm" class="btn btn-primary" @click="submitDatatableRow">Submit Form</button>
                    </p>

                    <table class="table table-bordered row-border w-100" id="contactTable" >
                        <thead class="table-primary">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Created</th>
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
import { ref, onMounted,reactive,watch } from 'vue';

var dataSource = ref();
var table = ref();

onMounted(()=>{
   table = $('#contactTable').DataTable({
      ordering:false
    });
});

function addDatatableRow()
{
    let dataCount = table.rows().count();
    table.row.add([
        '<input name="contactForm[' + dataCount + '][name]" class="form-control" type="text" placeholder="Name"/>',
        '<input name="contactForm[' + dataCount + '][email]" class="form-control" type="email" placeholder="Email"/>',
        '<input name="contactForm[' + dataCount + '][phone]" class="form-control" type="tel" placeholder="Phone"/>',
        '<input name="contactForm[' + dataCount + '][created_at]" class="form-control" type="date"/>',
    ]).draw(false);
}

function submitDatatableRow()
{
    var formFields = table.$('input').serialize();
    console.log(formFields);
    axios.post('http://localhost:8000/api/contact-add', formFields).then((res)=>{
        console.log(response);
    }).catch((err)=>{
        console.log(err);
    })
}
</script>
<style>
[type=button]{
         background-color: #0d6efd;
}
.mr-3{
    margin-right:10px;
}
</style>