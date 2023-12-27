<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Ref In Vue Js</div>

                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <form @submit="(e) => handleFormSubmit(e)">
                                <input type="text" class="form-control mb-2" ref="textField" @change="checkRequired()"/>
                                <input type="number" class="form-control mb-2" ref="numberField"/>
                                <button type="submit" class="form-control btn btn-primary" >Submit</button>
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
    data() {
        return {
            
        }
    },
    mounted() {
        console.log(this.$refs);
    },
    methods: {
        checkRequired()
        {
            console.log('before ' + this.$refs.numberField.required);
            this.$refs.numberField.required = true;
            this.$refs.numberField.style.border = "1px solid red";
            console.log('after ' + this.$refs.numberField.required);
        },
        handleFormSubmit(e)
        {
            e.preventDefault();
            
            console.log(this.$refs.textField.value);
            console.log(this.$refs.numberField.value);
        }
    }
};
</script>
