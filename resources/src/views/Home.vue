<template>
  <div class="w-full h-full flex justify-center py-8">
    <div class="w-3/4">
      <div class="bg-white shadow rounded-lg">
        <div class="border-b border-gray-200 px-4 py-5 flex justify-between">
          <h1 class="text-3xl">Hello Builder</h1>
          <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none"
            @click="submit"
          >
            Submit
          </button>
        </div>
        <div class="px-4 py-5">
          <div class="w-1/4 flex border-b border-blue-500 py-2">
            <span class="font-semibold">Model</span>
            <input
              class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
              type="text"
              placeholder="Model Name"
              v-model="name"
            />
          </div>
          <div class="w-1/4 mt-4 flex border-b border-blue-500 py-2">
            <span class="font-semibold">Comment</span>
            <input
              class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
              type="text"
              placeholder="Table comment"
              v-model="comment"
            />
          </div>
        </div>
      </div>
      <TableComponent ref="fields" />
    </div>
  </div>
</template>

<script>
import TableComponent from "../components/TableComponent";
import {store} from '../api/scaffold'

export default {
  name: "index",
  data() {
    return {
      name: '',
      comment: ''
    }
  },
  components: {
    TableComponent
  },
  methods: {
    submit() {
      let fields = this.$refs['fields'].getFields()
      let name = this.name
      let comment = this.comment

      store({ name, comment, fields }).then((response) => {
          console.info(response)
        })
    }
  }
}
</script>
