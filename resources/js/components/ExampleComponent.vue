<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Form In Vue Js</div>

                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <form @submit.prevent="handleSubmit">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" v-model="form.name"  required/>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" v-model="form.email"  required/>
                                    </div>

                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="phone" v-model="form.phone" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" name="message" v-model="form.message" required ></textarea>
                                    </div>
                                   
                                    <button class="btn btn-primary mt-2">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
           form:{
               name:'',
               email:'',
               phone:'',
               message:''
           }
        };
    },
    methods: {
        handleSubmit()
        {
            console.log(this.form);
        }
    }
};
</script>
