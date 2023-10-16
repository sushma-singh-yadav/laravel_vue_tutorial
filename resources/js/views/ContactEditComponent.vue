<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Edit Form In Vue Js</div>

                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <Form @submit="handleSubmitEvent" :validation-schema="schema" :initial-values="initialValues">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <Field type="text" class="form-control" name="name" />
                                        <ErrorMessage name="name" class="text-danger"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <Field type="email" class="form-control" name="email"   />
                                        <ErrorMessage name="email" class="text-danger"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <Field type="tel" class="form-control" name="phone"   />
                                        <ErrorMessage name="phone" class="text-danger"/>
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <Field as="textarea" class="form-control" name="message"   />
                                        <ErrorMessage name="message" class="text-danger"/>
                                    </div>
                                   
                                    <button class="btn btn-primary mt-2">
                                        Submit
                                    </button>
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
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import axios from 'axios';
const host = import.meta.env.VITE_PUSHER_HOST;
const port = import.meta.env.VITE_PUSHER_PORT;
const api = import.meta.env.VITE_PUSHER_API_PREFIX;

export default {
    components: { Form, Field, ErrorMessage },
    mounted() {
        console.log("Component mounted.");
        this.fetchContactDetails();
    },
    data() {
        const schema = yup.object({
            name: yup.string().required(),
            email:  yup.string().required().email(),
            phone:  yup.string().required(),
            message:  yup.string().required(),
        });
        return {
            schema,
            initialValues: {
                name: '',
                email: '',
                phone: '',
                message: ''
            }
        };
    },
    methods: {
        fetchContactDetails()
        {
            let contactId = this.$route.params.id;         
            axios.get(host + ':' + port + "/" + api + "/contact-edit/" + contactId).then((res)=>{
                
                let status = res.data.status;
                if(status == 200){
                    let result = res.data.data;
                    this.initialValues.name = result.name;
                    this.initialValues.email = result.email;
                    this.initialValues.phone = result.phone;
                    this.initialValues.message = result.message;
                }
            }).catch((err)=>{
                console.log(err)
            })
        },
        handleSubmitEvent(values, actions)
        {
            console.log(values);
            console.log(actions);
            //need to submit form

            let contactId = this.$route.params.id; 
            axios.post(host + ':' + port + "/" + api + "/contact-edit-save/" + contactId, values).then(res =>{
                console.log('res');
                console.log(res);

                this.$toast.success('Contact successfully updated');
                ///redirect
                this.$router.push({name:'contact-list'})
            }).catch(err => {
                console.log(err);
                let formErrors = err.response.data;
                let nameErr = (formErrors.hasOwnProperty('name')) ? formErrors.name[0] :'';
                let emailErr = (formErrors.hasOwnProperty('email')) ? formErrors.email[0] :'';
                let phoneErr = (formErrors.hasOwnProperty('phone')) ? formErrors.phone[0] :'';
                let messageErr = (formErrors.hasOwnProperty('message')) ? formErrors.message[0] :'';
                actions.setErrors({
                    name: nameErr,
                    email: emailErr,
                    phone: phoneErr,
                    message: messageErr,
                })
            })
        }
    }
}
</script>