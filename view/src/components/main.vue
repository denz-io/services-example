<template>
  <div class="main">
    <h1>
      Microservice Demo
    </h1>
    <button  v-if="!showAddForm && !showEditForm" class="button-green" v-on:click="showAddForm = true; showEditForm = false">
      Add User
    </button>
    <div class="edit-form" v-if="showAddForm">
      <div>
        first name:
        <input name="firstname" v-model="firstname"/>
      </div>
      <div>
        last name:
        <input name="lastname" v-model="lastname"/>
      </div>
      <div>
        school:
        <input name="school" v-model="school"/>
      </div>
      <div>
        task:
        <textarea name="task" v-model="task"></textarea>
      </div>
      <button class="button-green" v-on:click="add()">
          Add a user 
      </button>
      <button class="button-green" v-on:click="showAddForm = false">
          cancel
      </button>
    </div>
    <div class="edit-form" v-if="showEditForm">
      <div>
        first name:
        <input name="firstname" :value="toEdit.firstname" @input="handleOnChange"/>
      </div>
      <div>
        last name:
        <input name="lastname" :value="toEdit.lastname" @input="handleOnChange"/>
      </div>
      <div>
        school:
        <input name="school" :value="toEdit.school" @input="handleOnChange"/>
      </div>
      <div>
        task:
        <textarea name="task"  :value="toEdit.task" @input="handleOnChange"></textarea>
      </div>
      <button class="button-green" v-on:click="update()">
          Update
      </button>
      <button class="button-green" v-on:click="showEditForm = false">
          cancel
      </button>
    </div>
    <div class="content-container"  v-if="!showEditForm">
      <table>
        <thead>
          <tr>
            <td>
              First Name
            </td>
            <td>
              Last Name 
            </td>
            <td>
              School
            </td>
            <td>
              Tasks
            </td>
            <td>
              Actions
            </td>
          </tr>
        </thead>
        <tbody v-for="user in users" :key="user.id">
          <tr> 
            <td>
                {{user.firstname}}
            </td>
            <td>
                {{user.lastname}}
            </td>
            <td>
                {{user.school}}
            </td>
            <td>
                {{user.task}}
            </td>
            <td>
              <button class="button-green" v-on:click="showEditForm = true; showAddForm = false; toEdit = user">
                Edit
              </button>
              <button class="button-red" v-on:click="deletes()">
                Delete  
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>

import Users from '../actions/user.js'

export default {
  name: 'Main',
  data: function () {
    return {
      showEditForm: false,
      showAddForm: false,
      users: [],
      toEdit: {},
      firstname: '',
      lastname: '',
      task: '',
      school: '',
    }
  },
  mounted () {
    Users.get().then(res => {
        this.users = res.data;
    });
  },
  computed: {
    msg: {
      set: function(val) {
        this.a = val
      },
      get: function() {
         return this.a
      }
    }
  },
  methods: {
      add: function() {
        const { firstname, lastname, task, school } = this;
        let newUser = {
          firstname, lastname, task, school
        }
        Users.add(newUser);
        this.users.push(newUser);
        this.showEditForm = false;
      },
      update: function() {
        let udpatedUsers = this.users.map(res => {
            if (this.toEdit.id == res.id)  {
                return this.toEdit;
            }
            return res;
        })
        Users.update(this.toEdit);
        this.users = udpatedUsers 
        this.showEditForm = false;
      },
      handleOnChange: function(event) {
        this.toEdit[event.target.name] = event.target.value 
      },
      deletes: function() {
        console.log('delete');
      },
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    .content-container {
        width: 1200px;
        margin: auto;
        margin-top: 100px;
    }
    table {
        width: 1200px;
    }
    table, td, td {
        border: 2px solid;
        background: #ffffff;
    }
    button {
        margin: 0px 10px;
        color: white;
        border: none;
        background: none;
        padding: 5px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
    .button-green {
        background: green;
    }
    .button-red {
        background: red;
    }
    .edit-form > div {
        padding: 10px;
    }
</style>
