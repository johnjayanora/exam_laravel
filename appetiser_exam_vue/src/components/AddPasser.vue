<template>
<div class="modal-mask">
      <div class="modal-wrapper">
        <div class="modal-container">

          <div class="modal-header">
            <slot name="header">
              <h5 class="modal-title">Add Examinee</h5>
            </slot>
          </div>
            <form @submit="adddExaminee">
                <div class="modal-body">                
                    <slot name="body">
                        <p>Examinee Name</p>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" v-model="first_name" class="form-control" name="first_name" placeholder="First name" required>
                            </div>
                            <div class="col">
                                <input type="text" v-model="last_name" class="form-control" placeholder="Last name" name="last_name" required>
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label for="campus_eligibility">Campus Eligibility</label>
                            <input class="form-control" type="text" v-model="campus_eligibility" name="campus_eligibility" id="campus_eligibility" required>
                        </div>
                        <div class="form-group">
                            <label for="school">School</label>
                            <input class="form-control" type="text" v-model="school" name="school" id="school" required>
                        </div>
                        <div class="form-group">
                            <label for="division">Division</label>
                            <input class="form-control" type="text" v-model="division" name="division" id="division" required>
                        </div>
                    </slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                        <button type="button" class="btn btn-secondary" @click="closeModal">Close</button>        
                        <input type="submit" class="btn btn-primary" value="submit">
                    </slot>
                </div>
            </form>
        </div>
      </div>
    </div>
</template>
<script>
export default {
    name:"AddPasser",
    data(){
        return{
            first_name:'',
            last_name:'',
            school:'',
            division:'',
            campus_eligibility:''
        }
    },
    methods:{
        closeModal(){
            this.first_name = ''
            this.last_name = ''
            this.school = ''
            this.campus_eligibility = ''
            this.division = ''
            this.$emit('close-modal')
        },
        adddExaminee(e){
            e.preventDefault()
            const newExaminee ={
                first_name: this.first_name,
                last_name: this.last_name,
                school: this.school,
                campus_eligibility: this.campus_eligibility,
                division: this.division
            }
            
            this.$emit('add-examinee',newExaminee)
        }
    }
}


</script>
<style>
.modal-mask {    
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: top;  
}

.modal-container {

  margin-top:50px !important ;
  width: 30%;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;  
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

</style>
