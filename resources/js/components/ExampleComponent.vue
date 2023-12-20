<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">
                        Example Component
                        <span class="float-right">
                            <button
                                class="btn btn-primary d-inline float-right"
                                @click="addFields"
                            >
                                Add
                            </button>
                        </span>
                    </div>

                    <div class="card-body">
                        <div v-for="(value, index) in productData" key="index">
                            <div class="row">
                                <div class="col-md-4 mt-2">
                                    <div class="form-group">
                                        <input
                                            class="form-control"
                                            placeholder="Enter Product"
                                            type="text"
                                            v-model="value.product"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-group">
                                        <input
                                            class="form-control"
                                            placeholder="Enter Amount"
                                            type="number"
                                            v-model="value.amount"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <div class="form-group">
                                        <button
                                            class="btn btn-danger d-inline"
                                            @click="removeFields(index)"
                                        >
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-2" @click="saveProduct">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            productData: [
                {
                    product: "",
                    amount: 0,
                },
            ],
        };
    },
    mounted() {},
    methods: {
        addFields() {
            this.productData.push({
                product: "",
                amount: 0,
            });
        },
        removeFields(index) {
            if (this.productData.length > 1) {
                this.productData.splice(index, 1);
            }
        },
        saveProduct() {
            axios
                .post(
                    "http://localhost:8001/api/product-save",
                    this.productData
                )
                .then((res) => {
                    console.log(res);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
