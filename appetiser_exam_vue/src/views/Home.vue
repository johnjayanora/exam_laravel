<template>
  <div>
    <Search v-on:search-passers="searchPassers" v-on:show-form="showForm" />
    <AddPasser :hidden="hidden" v-on:close-modal="closeForm" v-on:add-examinee="addExaminee"/>
    <Passers v-bind:passers="passers"/>
    <pagination :data="passers" @pagination-change-page="getResults"></pagination>
    
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios'
import Passers from '@/components/Passers.vue'
import Search from '@/components/Search.vue'
import AddPasser from '@/components/AddPasser.vue'

export default {
  name: 'home',
  components: {
    Passers,
    Search,
    AddPasser
    
  },
  data(){
    return{
      passers:{},
      search_bool:false,
      search_val:'',
      hidden:true,
      test_var:'asdfasdf'
    }
  },
  methods:{
    getResults(page) {
      var url = 'http://localhost/appetiser_exam_laravel/public/api/nce-2018-passers?page=' + page;
      if(this.search_bool){
        url = 'http://localhost/appetiser_exam_laravel/public/api/nce-2018-passers/search/' + this.search_val +'?page=' + page;
      }
			axios.get(url)
				.then(response => {
					this.passers = response.data
        })
        .catch(err => console.log(err));
    },
    searchPassers(search_val){
      if(search_val == '' || search_val == ' '){
        this.$router.go()
        this.search_bool = false
        return false
      }
      axios.get('http://localhost/appetiser_exam_laravel/public/api/nce-2018-passers/search/' + search_val)
        .then(response => {
          this.passers = response.data
          this.search_bool = true
          this.search_val = search_val
        })
        .catch(err => console.log(err));
    },
    showForm(){
      this.hidden =false
    },
    closeForm(){
      this.hidden =true
    },
    addExaminee(newExaminee){
      const {first_name,last_name,school,campus_eligibility,division} = newExaminee;
      let payload = {    
          examinee:{
              first_name:first_name,
              last_name:last_name,
              school:school,
              campus_eligibility:campus_eligibility,
              division:division
          }   
      };
      var self = this

      axios.post('http://localhost/appetiser_exam_laravel/public/api/nce-2018-passers/add', payload, {headers: {'Content-Type': 'application/x-www-form-urlencoded','Accept': 'application/json'}})
      .then(response => {
          alert(response.data.msg)
          self.closeForm()
        })
      .catch(error => console.log(error));
    }
  },
  created(){
    axios.get('http://localhost/appetiser_exam_laravel/public/api/nce-2018-passers')
      .then(response => {
          this.passers = response.data
          this.search_bool = false
          this.search_val = ''
        })
      .catch(err => console.log(err));
  },

  
  
}
</script>

<style>
.add-passer{
  visibility: hidden;
}
</style>
