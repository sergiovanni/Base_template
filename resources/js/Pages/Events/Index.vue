<template>

  <div v-show="currentTab==='resume'">
    <div class="">
      <div class="bg-white rounded shadow w-full h-full">
        <!-- <form @submit.prevent="submit">
          <div class="px-4 py-5 bg-white sm:p-6" style="display: -webkit-box;">
            <div class="w-full grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-1">
                <label class="block text-sm font-medium text-gray-700" for="name">Patient ID:</label>
                <input readonly v-model="form.patient_id" ref="patient_id" name="name" id="name"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  type="text" />
                <div v-if="errors.patient_id" class="text-red-700 mt-2 text-sm">{{ errors.patient_id }}</div>
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700" for="name">Record position:</label>
                <input v-model="form.record_position" ref="record_position" name="record_position" id="record_position"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  type="number" />
                <div v-if="errors.record_position" class="text-red-700 mt-2 text-sm">{{ errors.record_position}}</div>
              </div>


              <div class="col-span-6 sm:col-span-3">
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <Multiselect v-model="form.category" :options="categories_options" track-by="id" label="name" />
                <div v-if="errors.category_id" class="text-red-700 mt-2 text-sm">{{ errors.category_id }}</div>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label class="block text-sm font-medium text-gray-700" for="name">Reported verbatim:</label>
                <input readonly v-model="form.reported_verbatim" name="name" id="name"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  type="text" />
                <div v-if="errors.reported_verbatim" class="text-red-700 mt-2 text-sm">{{ errors.reported_verbatim }}
                </div>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label class="block text-sm font-medium text-gray-700" for="name">Indication:</label>
                <input v-model="form.indication" name="name" id="name"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                  type="text" />
                <div v-if="errors.indication" class="text-red-700 mt-2 text-sm">{{ errors.indication }}</div>
              </div>

            </div>
          </div>
        </form> -->
      </div>
      <div class="flex rounded shadow bg-white mt-4">

        <div class="w-1/2 h-full">
          <!-- <form @submit.prevent="submit">

            <div class="px-4 py-5 bg-white sm:p-6" style="display: -webkit-box;">

              <div class="w-full grid grid-cols-6 gap-6">

                <div class="col-span-12 sm:col-span-6">
                  <label class="block text-sm font-medium text-gray-700" for="name">Verbatim:</label>
                  <input v-model="form.name" name="name" id="name"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    type="text" />
                  <div v-if="errors.name" class="text-red-700 mt-2 text-sm">{{ errors.name }}</div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label class="block text-sm font-medium text-gray-700" for="name">LLT Name:</label>
                  <div class="w-full grid grid-cols-12 gap-2">
                    <div class="col-span-1 sm:col-span-1">
                      <button
                        class="mr-3 inline-flex items-center mt-1 w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        @click="openFullScreenModal()" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round">
                          <circle cx="11" cy="11" r="8"></circle>
                          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                      </button>
                    </div>
                    <div class="col-span-11 sm:col-span-11">
                      <input readonly :value="show_code_on_input===false ? llt_name : llt_name+' ('+form.llt_code+')'"
                        name="llt_name" id="llt_name"
                        class="mt-1 inline-flex focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        type="text" />
                    </div>
                  </div>
                  <div v-if="errors.llt_name" class="text-red-700 mt-2 text-sm">{{ errors.llt_name }}</div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label class="block text-sm font-medium text-gray-700" for="pt_name">PT Name:</label>
                  <input readonly :value="show_code_on_input===false ? pt_name : pt_name+' ('+form.pt_code+')'"
                    name="pt_name" id="pt_name"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    type="text" />
                  <div v-if="errors.pt_name" class="text-red-700 mt-2 text-sm">{{ errors.pt_name }}</div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label class="block text-sm font-medium text-gray-700" for="hlt_name">HLT Name:</label>
                  <input readonly :value="show_code_on_input===false ? hlt_name : hlt_name+' ('+form.hlt_code+')'"
                    name="hlt_name" id="hlt_name"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    type="text" />
                  <div v-if="errors.hlt_name" class="text-red-700 mt-2 text-sm">{{ errors.hlt_name }}</div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label class="block text-sm font-medium text-gray-700" for="hlgt_name">HLGT Name:</label>
                  <input readonly :value="show_code_on_input===false ? hlgt_name : hlgt_name+' ('+form.hlgt_code+')'"
                    name="hlgt_name" id="hlgt_name"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    type="text" />
                  <div v-if="errors.hlgt_name" class="text-red-700 mt-2 text-sm">{{ errors.hlgt_name }}</div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label class="block text-sm font-medium text-gray-700" for="soc_name">Soc Name:</label>
                  <input readonly :value="show_code_on_input===false ? soc_name : soc_name+' ('+form.soc_code+')'"
                    name="soc_name" id="soc_name"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    type="text" />
                  <div v-if="errors.soc_name" class="text-red-700 mt-2 text-sm">{{ errors.soc_name }}</div>
                </div>

              </div>
            </div>

          </form> -->
        </div>

        <div class="w-1/2 h-full">
          <!-- <form @submit.prevent="submit">

            <div class="px-4 py-5 bg-white sm:p-6" style="display: -webkit-box;">

              <div class="w-full grid grid-cols-6 gap-6">

                <div class="col-span-12 sm:col-span-6">
                  <label class="block text-sm font-medium text-gray-700">Status</label>
                  <Multiselect v-model="form.status" :options="options" class="w-full" />
                  <div v-if="errors.status" class="text-red-700 mt-2 text-sm">{{ errors.status }}</div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <input type="text" hidden>
                </div>

                <div class="col-span-12 sm:col-span-6 mt-16">
                  <label class=" block text-sm font-medium text-gray-700" for="event_date">Outcome date:</label>
                  <vue-flat-pickr v-model="form.outcome_date" :config="outcome_date_config"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    name="first_registration" />
                  <div v-if="errors.outcome_date" class="text-red-700 mt-2 text-sm">{{ errors.outcome_date }}</div>
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label class="block text-sm font-medium text-gray-700" for="remark">Remark:</label>
                  <textarea v-model="form.remark" name="remark" id="remark" rows="5"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                    placeholder=""></textarea>
                  <div v-if="errors.remark" class="text-red-700 mt-2 text-sm">{{ errors.remark }}</div>
                </div>


                <div class="col-span-AZ sm:col-span-6 mt-5">
                  <div class="flex items-start mt-3">
                    <div class="flex items-center h-5">
                      <input id="exact_match" v-model="form.exact_match" name="exact_match" value="1" type="checkbox"
                        class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                      <label for="exact_match" class="font-medium text-gray-700">Exact Match</label>
                    </div>
                  </div>
                  // <label class="block text-sm font-medium text-gray-700" for="brand"></label>
                  //<input v-model="form.exact_match" ref="price" name="price" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" type="checkbox"/> -->
                  <!-- <div v-if="errors.exact_match" class="text-red-700 mt-2 text-sm">{{ errors.exact_match }}</div>
                </div>

              </div>
            </div>

          </form> --> -->
        </div>

      </div>
      <div class="w-full rounded shadow px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center">
        <loading-button @click="submit()" :loading="sending"
          class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          type="submit">Save</loading-button>
      </div>
    </div>
    <div class="ml-5 w-100 overflow-y-scroll mt-20" style="height:500px">
      <div class="pb-2 mb-4">
        <div class="shadow-md w-10 h-10 p-2 rounded-full bg-cyan-800 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6"
            viewBox="0 0 16 16">
            <path
              d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
          </svg>
        </div>
      </div>
      <!-- <div class="flex mb-4" v-for="activity in activities.data" :key="activity.id">
        <div class="shadow-md w-10 h-10 p-2 rounded-full bg-white text-cyan-800">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="h-6 w-6"
            viewBox="0 0 16 16">
            <path
              d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
            <path fill-rule="evenodd"
              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
          </svg>
        </div>
        <div class="ml-4">
          <b> {{ activity.author }} </b> {{ activity.event }} <b>{{ verbatim.name }}</b> {{ formatDate(new
          Date(activity.created_at)) }} <br>
          <b class="capitalize"> name : </b> Old value: {{ activity.changes.old ? activity.changes.old.name : " null "}} -> New value : {{ activity.changes.attributes ? activity.changes.attributes.name : 'null' }} <br>
          <b class="capitalize"> status : </b> Old value: {{ activity.changes.old ? activity.changes.old.status : " null" }} -> New value : {{ activity.changes.attributes ? activity.changes.attributes.status : 'null' }} <br>
          <b class="capitalize"> llt name : </b> Old value: {{ activity.changes.old ? activity.changes.old.llt_name : " null " }} -> New value : {{ activity.changes.attributes ? activity.changes.attributes.llt_name : 'null'}} <br>
          <b class="capitalize"> pt name : </b> Old value: {{ activity.changes.old ? activity.changes.old.pt_name : " null " }} -> New value : {{ activity.changes.attributes ? activity.changes.attributes.pt_name : 'null' }} <br>
          <b class="capitalize"> soc name : </b> Old value: {{ activity.changes.old ? activity.changes.old.soc_name : "null " }} -> New value : {{ activity.changes.attributes ? activity.changes.attributes.soc_name : 'null'}} <br>
          <b class="capitalize"> Patient ID : </b> Old value: {{ activity.changes.old ? (activity.changes.old.patient_id ? activity.changes.old.patient_id : 'null' ) : " null " }} -> New value : {{ activity.changes.attributes ?
          (activity.changes.attributes.patient_id ? activity.changes.attributes.patient_id : 'null' ) : 'null'}} <br>
          <b class="capitalize"> hl t : </b> Old value: {{ activity.changes.old ? (activity.changes.old.hl_t ?
          activity.changes.old.hl_t : 'null' ) : " null " }} -> New value : {{ activity.changes.attributes ?
          (activity.changes.attributes.hl_t ? activity.changes.attributes.hl_t : 'null' ) : 'null'}} <br>
          <b class="capitalize"> hl gt : </b> Old value: {{ activity.changes.old ? (activity.changes.old.hl_gt ?
          activity.changes.old.hl_gt : 'null' ) : " null " }} -> New value : {{ activity.changes.attributes ?
          (activity.changes.attributes.hl_gt ? activity.changes.attributes.hl_gt : 'null' ) : 'null'}} <br>
          <b class="capitalize"> study : </b> Old value: {{ activity.changes.old ? activity.changes.old.study.name : " null " }} -> New value : {{ activity.changes.attributes ? activity.changes.attributes.study.name : 'null'}}
          <br>
        </div> 
      </div>-->
    </div>
  </div>


  <div class="hidden sm:block">
    <div class="border-b border-gray-200">
      <nav class="-mb-px flex" aria-label="Tabs">
        <a href="javascript:;" @click="chooseTab('resume')"
          :class="currentTab == 'resume' ? 'flex-1 border-blue-500 text-blue-600 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm' : 'flex-1 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm'">
          <svg xmlns="http://www.w3.org/2000/svg"
            :class="currentTab == 'resume' ? 'text-blue-500 -ml-0.5 mr-2 h-5 w-5' : 'text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5'"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
          </svg>
          <span> Verbatim___ </span>
        </a>
        <a href="javascript:;" @click="chooseTab('queries')"
          :class="currentTab == 'queries' ? 'flex-1 border-blue-500 text-blue-600 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm' : 'flex-1 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm'">
          <svg xmlns="http://www.w3.org/2000/svg"
            :class="currentTab == 'queries' ? 'text-blue-500 -ml-0.5 mr-2 h-6 w-6' : 'text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-6 w-6'"
            fill="none" viewBox="0 0 16 16" stroke="currentColor">
            <path
              d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
            <path
              d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
          </svg>
          <div class="flex space-x-2">
            <span> Queries </span>
            <!-- <div v-if="verbatim.queries.length > 0" class="self-center inline-block rounded-full h-3 w-3 bg-green-400">
            </div> -->
          </div>
        </a>
        <a href="javascript:;" @click="chooseTab('files')"
          :class="currentTab == 'files' ? 'flex-1 border-blue-500 text-blue-600 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm' : 'flex-1 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm'">
          <!-- Heroicon name: solid/office-building -->
          <svg xmlns="http://www.w3.org/2000/svg"
            :class="currentTab == 'files' ? 'text-blue-500 -ml-0.5 mr-2 h-5 w-5' : 'text-gray-400 group-hover:text-gray-500 -ml-0.5 mr-2 h-5 w-5'"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
          </svg>
          <span>Files</span>
        </a>
        <a href="javascript:;" @click="chooseTab('suggest')"
          :class="currentTab == 'suggest' ? 'flex-1 border-blue-500 text-blue-600 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm' : 'flex-1 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 group inline-flex items-center py-4 px-1 border-b-2 font-medium text-sm'">
          <!-- Heroicon name: solid/office-building -->
          <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" preserveAspectRatio="xMidYMid meet"
            viewBox="0 0 24 24">
            <g fill="none" stroke="currentColor" stroke-width="1.5">
              <path
                d="M3 3.6a.6.6 0 0 1 .6-.6h16.8a.6.6 0 0 1 .6.6v13.8a.6.6 0 0 1-.6.6h-4.14a.6.6 0 0 0-.438.189l-3.385 3.597a.6.6 0 0 1-.874 0l-3.385-3.597A.6.6 0 0 0 7.74 18H3.6a.6.6 0 0 1-.6-.6V3.6Z" />
              <path stroke-linecap="round" stroke-linejoin="round"
                d="m12 7l1.425 2.575L16 11l-2.575 1.425L12 15l-1.425-2.575L8 11l2.575-1.425L12 7Z" />
            </g>
          </svg>
          <span>Verbatims_suggest</span>
        </a>
      </nav>
    </div>
  </div>
</template>





<script>
// import AppLayout from '@/Layouts/AppLayout'
// import Pagination from '@/Shared/Pagination'
// import throttle from 'lodash/throttle'
// import pickBy from 'lodash/pickBy'
// import ConfirmationDialog from '@/Shared/ConfirmationDialog'
// import LoadingButton from '@/Shared/LoadingButton'
// import FullScreenModal from '@/Shared/FullScreenModal'


import AppLayout from '../../Layouts/AppLayout.vue'
import Pagination from '../../Shared/Pagination.vue'
import throttle from 'lodash/throttle'
import pickBy from 'lodash/pickBy'
import ConfirmationDialog from '../../Shared/ConfirmationDialog.vue'
import LoadingButton from '../../Shared/LoadingButton.vue'
import FullScreenModal from '../../Shared/FullScreenModal.vue'


export default {
  created() {
    //console.log(this.filters)
    //console.log(this.people)
    //console.log(this.total_person)

  },
  // components: {
  //   Pagination,
  //   ConfirmationDialog,
  //   LoadingButton,
  //   FullScreenModal
  // },
  layout: AppLayout,
  // props: {
  //   events: Object,
  //   filters: Object,
  // },
  data() {
    return {
      // sending: false,
      // form: {
      //   search: this.filters.search,
      // },
      // message: null,
      // title: null,
      // show: {
      //   default: true
      // },
      // closeable: {
      //   default: true
      // },
      // showModal: false,
      // itemDeleteId: null,
      chooseTab(tag) {
        this.currentTab = tag;
      },
      currentTab: 'resume',
      showQueryModal: {
        default: true
      },
    }

  },
  // methods: {

  //   destroy(id) {
  //     this.showModal = true
  //     this.show.default = true
  //     this.itemDeleteId = id
  //     this.sms_person_id = null
  //     this.mail_person_id = null
  //     this.title = 'Confirmation de suppression'
  //     this.message = 'Êtes-vous sûr de vouloir supprimer cette personne?'
  //   },
  //   cancel() {
  //     this.showModal = false
  //     this.itemDeleteId = null
  //   },
  //   confirm() {
  //     if (this.itemDeleteId) {
  //       this.showModal = false
  //       this.$inertia.delete(this.route('events.destroy', this.itemDeleteId));
  //     }
  //   },


  // },
  // watch: {
  //   form: {
  //     handler: throttle(function () {
  //       let query = pickBy(this.form)
  //       this.$inertia.get(this.route('events.index', Object.keys(query).length ? query : { remember: 'forget' }), {}, { preserveState: true })
  //     }, 150),
  //     deep: true,
  //   },
  // },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css">

</style>









