<template>
    <div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th></th>
                    <th>NAME OF EXAMINEE</th>
                    <th>CAMPUS ELIGIBILITY</th>
                    <th>SCHOOL</th>
                    <th>DIVISION</th>
                </tr>
            </thead>
            <tbody v-for="passer in passers.data" :key="passer.id">
                    <PasserRow v-bind:passer="passer"/>                                
            </tbody>
        </table>
        
    </div>
</template>

<script>
import PasserRow from '@/components/PasserRow.vue'
export default {
    name:"Passers",
    components:{
        PasserRow,
    },
    props:["passers"],
    methods:{
       
    }
    
}

</script>

<style >

.table {
    text-align: left;
    width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
}
.table-dark {
    color: #f8fafc;
    background-color: #212529;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}
.table-dark td, .table-dark th, .table-dark thead th {
    border-color: #32383e;
}
.table td, .table th {
    padding: .75rem;
    
    border-top: 1px solid #32383e;
}
table {
    border-collapse: collapse;
}
</style>
