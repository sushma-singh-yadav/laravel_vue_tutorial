<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Image Upload In Vue Js</div>

                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="col-md-12">
                              <Form enctype="multipart/form-data" @submit="handleSubmit()">
                                  <div class="Form-group">
                                      <label>Name</label>
                                      <Field type="text" name="inputName" class="form-control" v-model="inputName"/>
                                  </div>
                                  <div class="Form-group">
                                    <label>Image</label>
                                    <Field type="file" name="inputImage" class="form-control" @change='(e) => getImage(e)'/>
                                </div>
                                <div class="Form-group mt-3">
                                    <button type="submit" class="btn btn-info" name="submitBtn">Submit</button>
                                </div>
                              </Form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Form, Field } from "vee-validate";
import axios from "axios";

export default {
    components: { Form, Field },
    data() {
        return {
            inputName: '',
            inputImage: ''
        }
    },
    methods: {
        getImage(e)
        {
            this.inputImage = event.target.files[0];
            console.log(event.target.value);
        },
        handleSubmit()
        {
            axios.post("http://localhost:8001/api/image-upload",{
                inputName : this.inputName, 
                inputImage : this.inputImage 
            }, {
                headers: {
                    'Content-Type' : 'multipart/form-data'
                }
            }).then(res => {
                console.log(res);
            }).catch(err => {
                console.log(err);
            })
        }
    }
};
</script>
