<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Form In Vue Js</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input
                                            class="form-control"
                                            name="name"
                                            v-model="name"
                                        />
                                        {{ name }}
                                    </div>
                                    <div class="form-group">
                                        <label>Textarea</label>
                                        <textarea
                                            class="form-control"
                                            name="textData"
                                            v-model="textData"
                                        />
                                        {{ textData }}
                                    </div>
                                    <div class="form-group">
                                        <label>Dropdown</label>
                                        <select
                                            class="form-control"
                                            name="dropdownVal"
                                            v-model="dropdownVal"
                                        >
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>

                                        {{ dropdownVal }}
                                    </div>

                                    <div class="form-group">
                                        <label>Textarea</label>
                                        <textarea
                                            class="form-control"
                                            name="textData"
                                            v-model="textData"
                                        />
                                        {{ textData }}
                                    </div>

                                    <div class="form-group">
                                        <label>Radio</label>
                                        <input
                                            type="radio"
                                            name="radioVal"
                                            v-model="radioVal"
                                            value="radio1"
                                        />
                                        {{ radioVal }}
                                   </div>
                                   <div class="form-group">
                                    <label>Radio</label>
                                    <input
                                        type="radio"
                                        name="radioVal"
                                        v-model="radioVal"
                                        value="radio2"
                                    />
                                    {{ radioVal }}
                               </div>

                               <div class="form-group">
                                <label>Checkbox</label>
                                <input
                                    type="checkbox"
                                    name="checkboxVal"
                                    v-model="checkboxVal"
                                    true-value="yes"
                                    false-value="no"
                                />
                                {{ checkboxVal }}
                           </div>
                           
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
            name: "",
            textData: "",
            dropdownVal: "",
            radioVal:'',
            checkboxVal:''
        };
    },
};
</script>
