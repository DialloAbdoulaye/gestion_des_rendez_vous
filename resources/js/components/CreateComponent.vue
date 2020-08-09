<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header bg-info text-center text-light text-uppercase"><h3>Prise de rendez vous</h3></div>

                    <div class="card-body">
                            <div class="alert alert-danger" v-if="errors.length">
                                <b>SVP corrigé ses erreurs:</b>
                                <ul>
                                    <li v-for="error in errors">{{error}}</li>
                                </ul>
                            </div>
                            <form
                                class="form-group">
                                <div class="row text-center">
                                <div class="col-md-4">
                                    <p>Numero</p>
                                    <input type="tel" class="form-control" v-model="phone" placeholder="08090709">
                                </div>
                                <div class="col-md-4">
                                    <p>Date</p>
                                    <input type="date" class="form-control" v-model="date_rdv">
                                </div>
                                <div class="col-md-4">
                                    <p>Heure</p>
                                    <select name="heure" id="" class="form-control" v-model="heure_rdv">
                                        <option value="08H00" selected="selected">08h00</option>
                                        <option value="10H00">10h00</option>
                                        <option value="13H00">13h00</option>
                                        <option value="15H00">15h00</option>
                                    </select>
                                </div>
                                </div>
                                <div class="mt-4 text-center">
                                    <button type="submit"  @click="addCreneau" class="btn btn-outline-success" >{{isLoading?"Traitement ...":"Prendre ce rendez vous"}}</button>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

        },
        methods:{
            addCreneau(){
                this.isLoading =true,
                axios.post("http://prisederendezvous.local/api/creneau",{
                    phone:this.phone,
                    date_rdv:this.date_rdv,
                    heure_rdv:this.heure_rdv
                }).then(response=> this.isLoading=false)
                    .catch(error =>console.log(error));
                this.resetForm()
            },

            resetForm(){
                    this.phone ='',
                    this.date_rdv='',
                    this.heure_rdv=''
            },

            checkForm: function(e){
                if(this.phone && this.heure_rdv && date_rdv){
                    return true
                }

                this.errors = [];

                if(!this.phone){
                    this.errors.push('Vous devez entrez votre numbero');
                    console.log("ddddddddddddddddddddddddd");
                }
                if(!this.heure_rdv){
                    this.errors.push('Vous devez choisir une heure de rdv ');
                }
                if(!this.date_rdv){
                    this.errors.push('Vous devez choisir une date ');
                }

                if (!this.errors.length) {
                    return true;
                }
                e.preventDefault();
            },




        },

        data(){
            return {
                phone:"",
                date_rdv: "",
                heure_rdv:"",
                isLoading : false,
                errors: [],
                isActive:false,
            }

        },

        computed:{
            isDisable() {
                    this.phone.length > 0
            },
        }
    }
</script>
