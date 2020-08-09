<template>
  <div class="mt-4">
      <div  v-for="rdv in allCreneau.data" :key="rdv.id">
          <div class="card p-2 " >
              <div class="card-header bg-info text-uppercase text-center text-light">
                  <h4>Numéro: <span class="badge badge-info">{{rdv.phone}}</span></h4>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-6">Date:</div>
                      <div class="col-md-6"> {{rdv.date_rdv}}</div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">Heure:</div>
                      <div class="col-md-6"> {{rdv.heure_rdv}}</div>
                  </div>
              </div>
              <div class="mt-4">
                  <div class="row">
                      <div class="col-md-6  pt-2 pb-2 pl-3">
                          <button class="btn btn-success btn-block">Valider</button>
                      </div>
                      <div class="col-md-6 pt-2 pb-2 pl-3">
                          <button class="btn btn-danger btn-block">Annuler</button>
                      </div>
                  </div>
              </div>
          </div>
          <hr>

      </div>
      <pagination :data="allCreneau" @pagination-change-page="getResults" class="mt-5"></pagination>
  </div>
</template>

<script>
    export default {
        mounted() {
            this.getResults();
        },
        data:function(){
            return{
                allCreneau:{},
            }
        },

        methods:{
                getResults(page = 1) {
                    axios.get('http://prisederendezvous.local/api/creneau?page=' + page)
                        .then(response=> this.allCreneau=response.data)
                        .catch(error =>console.log(error));
                }
        }
    }
</script>

<style scoped>

</style>
