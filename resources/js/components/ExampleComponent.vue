<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">Watchers In Vue Js</div>

                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="col-md-12" v-for="product in productList">
                                <div class="form-group">
                                    <input placeholder="Product" type="text" name="product" v-model="product.name" class="form-control"/>
                                </div>
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
            productList:[
                {
                    id : 1,
                    name: 'Product 1'
                },
                {
                    id : 2,
                    name: 'Product 2'
                }
            ]
        }
    },
    watch:{
        // productList(value, oldValue)
        // {
        //     console.log('watch executed')
        //     console.log('old ', oldValue)
        //     console.log('value ', value)
        // }
        productList: {
            handler: function (value, oldValue)
            {
                console.log('watch executed')
            console.log('old ', oldValue)
            console.log('value ', value)
            },
            deep:true
        }
    },
    methods: {
        
    }
};
</script>
