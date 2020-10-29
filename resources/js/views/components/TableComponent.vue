<template>
  <div class="mt-8 shadow overflow-hidden border-b border-gray-200 rounded-lg">
    <table class="w-full">
      <thead class="border-t border-b">
      <tr>
        <th
          v-for="(item, key) in thead"
          :key="key"
          class="px-4 py-3 bg-gray-50 text-center text-md leading-4 font-medium text-gray-500 uppercase tracking-wider"
        >
          {{item}}
        </th>
        <th class="px-4 py-3 bg-gray-50 text-center text-md leading-4 font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
          <button class="focus:outline-none inline-block align-middle" @click="addField">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-plus-square cursor-pointer text-green-500"
              >
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
              </svg>
            </button>
        </th>
      </tr>
      </thead>
      <tbody class="bg-white">
        <tr v-for="(field, i) in fields" :key="i">
          <td class="pl-4 pr-2 py-4 whitespace-no-wrap">
            <div class="relative rounded-md shadow-sm">
              <input class="form-input block w-full px-2" placeholder="Field Name" v-model="field.column">
            </div>
          </td>
          <td class="pr-2 py-4 whitespace-no-wrap">
            <div class="relative rounded-md shadow-sm">
              <select class="form-select block w-full" v-model="field.type">
                <option v-for="(item, key) in type" :key="key">{{item}}</option>
              </select>
            </div>
          </td>
          <td class="pr-2 py-4 whitespace-no-wrap">
            <div class="text-center">
              <input
                type="checkbox"
                class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out cursor-pointer"
                v-model="field.nullable"
              >
            </div>
          </td>
          <td class="pr-2 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
            <div class="relative rounded-md shadow-sm">
              <select class="form-select block w-full" v-model="field.key">
                <option v-for="item in keys" :key="item.value" :value="item.value">{{item.label}}</option>
              </select>
            </div>
          </td>
          <td class="pr-2 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
            <div class="relative rounded-md shadow-sm">
              <input class="form-input block w-full px-2" placeholder="Default" v-model="field.default">
            </div>
          </td>
          <td class="pr-2 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
            <div class="relative rounded-md shadow-sm">
              <input class="form-input block w-full px-2" placeholder="Comment" v-model="field.comment">
            </div>
          </td>
          <td class="py-4 whitespace-no-wrap leading-5 text-center">
            <button class="focus:outline-none inline-block align-middle" @click="deleteField(i)">
              <svg xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="feather feather-trash-2 stroke-current stroke-1 text-red-600 cursor-pointer"
              >
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
              </svg>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  export default {
    name: "TableComponent",
    data() {
      return {
        thead: [
          'Field Name', 'Type', 'Nullable', 'Key', 'Default', 'Comment'
        ],
        type: [
          'string', 'integer', 'text', 'unsignedMediumInteger'
        ],
        keys: [
          {
            'label': 'Null',
            'value': '',
          },
          {
            'label': 'Unique',
            'value': 'unique',
          },
          {
            'label': 'Index',
            'value': 'index',
          }
        ],
        fields: []
      }
    },
    created () {
      this.addField()
    },
    methods: {
      addField () {
        let field = {
          'column': '',
          'type': 'string',
          'nullable': false,
          'key': '',
          'default': '',
          'comment': ''
        }
        this.fields.push(field)
      },
      deleteField (key) {
        this.fields.splice(key, 1)
      },
      getFields() {
        return this.fields
      }
    }
  }
</script>

<style scoped>

</style>
