<template>
    <div id="search-div" class="row justify-content-between d-flex align-items-center">
    <div class="col col-md-3">
        <button @click="$emit('show-form')" type="button" id="add-record" class="btn btn-sm btn-primary">Add Record</button>
    </div>
    <div class="col col-md-3  ">
        <div class="input-group ">            
                <input type="text" v-model="search_val" name="search_val" class="form-control" placeholder="search name,school,division ..etc" aria-label="search" aria-describedby="basic-addon2">
                <div class="input-group-append">                    
                    <input @click="searchPassers" type="submit" value="Search" class="btn btn-outline-secondary">
                </div>            
        </div>
    </div>    
</div>
</template>

<script>
export default {
    name:"Search",
    data(){
        return{
            search_val: ''
        }
    },
    methods:{
        searchPassers(e){
            e.preventDefault();
            this.$emit('search-passers',this.search_val);
        }
    }
}
</script>

<style scoped>
#search-div{
    padding: 15px;
}
</style>
