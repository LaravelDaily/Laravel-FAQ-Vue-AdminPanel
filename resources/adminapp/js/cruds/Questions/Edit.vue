<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">Edit Question</h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.category_id !== null,
                      'is-focused': activeField == 'category'
                    }"
                  >
                    <label class="bmd-label-floating">Category</label>
                    <v-select
                      name="category"
                      label="name"
                      :key="'category-field'"
                      :value="entry.category_id"
                      :options="lists.category"
                      :reduce="entry => entry.id"
                      @input="updateCategory"
                      @search.focus="focusField('category')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.tags.length !== 0,
                      'is-focused': activeField == 'tags'
                    }"
                  >
                    <label class="bmd-label-floating">Tags</label>
                    <v-select
                      name="tags"
                      label="name"
                      :key="'tags-field'"
                      :value="entry.tags"
                      :options="lists.tags"
                      :closeOnSelect="false"
                      multiple
                      @input="updateTags"
                      @search.focus="focusField('tags')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.title,
                      'is-focused': activeField == 'title'
                    }"
                  >
                    <label class="bmd-label-floating required">Title</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.title"
                      @input="updateTitle"
                      @focus="focusField('title')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.answer,
                      'is-focused': activeField == 'answer'
                    }"
                  >
                    <label class="bmd-label-floating">Answer</label>
                    <textarea
                      class="form-control"
                      rows="5"
                      :value="entry.answer"
                      @input="updateAnswer"
                      @focus="focusField('answer')"
                      @blur="clearFocus"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                Save
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('QuestionsSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('QuestionsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setCategory',
      'setTags',
      'setTitle',
      'setAnswer'
    ]),
    updateCategory(value) {
      this.setCategory(value)
    },
    updateTags(value) {
      this.setTags(value)
    },
    updateTitle(e) {
      this.setTitle(e.target.value)
    },
    updateAnswer(e) {
      this.setAnswer(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'questions.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
