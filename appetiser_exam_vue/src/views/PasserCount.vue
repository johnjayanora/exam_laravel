<template>
    <div>
        <table class="table table-dark">
            <thead>
                <tr>
                    
                    <th>School</th>
                    <th># of Passers</th>                    
                </tr>
            </thead>
            <tbody v-for="(school,index) in schools.data" :key="index">
                  <PasserCountRow v-bind:school="school" />
            </tbody>
        </table>
        <pagination :data="schools" @pagination-change-page="getResults"></pagination>
    </div>
</template>

<script>
import axios from 'axios'
import PasserCountRow from '@/components/PasserCountRow.vue'

export default {
    name:"PasserCount",
    data(){
        return{
            schools:{}
        }
    },
    components:{
        PasserCountRow
    },
    methods:{
        getResults(page) {
            var url = 'http://localhost/appetiser_exam_laravel/public/api/nce-2018-passers/school-ranking?page=' + page;      
			axios.get(url)
				.then(response => {
					this.schools = response.data
            })
            .catch(err => console.log(err));
        }
    },
    created(){
        axios.get('http://localhost/appetiser_exam_laravel/public/api/nce-2018-passers/school-ranking')
      .then(response => {
          this.schools = response.data          
        })
      .catch(err => console.log(err));
    }
}
</script>
