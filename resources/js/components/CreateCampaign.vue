<template>
  <span class="ml-auto">
    <button class="btn btn-link btn-sm ml-auto" @click.prevent="show">
      Add Campaign
    </button>
    <b-modal id="createCampaignModal" ref="createCampaignModal" title="Create new campaign" 
            no-close-on-esc no-close-on-backdrop centered size="lg"
    >
        <div class="row">
            <div class="col-md-12">
                <label for="name">Campaign title (will send as mail subject)</label>
                <input type="text" id="name" class="form-control">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <label for="template">Mail Template (will send as mail subject)</label>
                <vue-ckeditor
                        v-model="template"
                        :config="config"
                        name="opportunity summary"
                        id="template"
                />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label for="attachment">Attachment</label>
                <input type="file" id="attachment" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="date">Campaign date</label>
                <input type="date" id="date" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="time">Campaign time</label>
                <input type="time" id="time" class="form-control">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <label for="mailinglists">Select Mailing Lists</label>
                <multiselect v-model="mailingLists" :options="options" label="name" track-by="id" :multiple="true"></multiselect>
            </div>
        </div>

        <div slot="modal-footer">
            <button class="btn btn-danger pull-right mr-2" @click.prevent="close">Close</button>
            <button class="btn btn-success pull-right" @click="submit">Save Campaign</button>
        </div>
    </b-modal>
  </span>
</template>

<script>
import VueCkeditor from 'vue-ckeditor2';
import Multiselect from 'vue-multiselect';
export default {
  components: { VueCkeditor, Multiselect },
  props: ['mailings'],
  data () {
    return {
      template: '',
      config: {
        toolbar: [
            ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']
        ],
        height: 230,
      },
      mailingLists: null,
      options: this.mailings
    }
  },
  methods: {
    show() {
        this.$refs.createCampaignModal.show();
    },
    close() {
        this.$refs.createCampaignModal.hide();
    },
    submit() {
        console.log(this.mailingLists);
    }
  }
}
</script>