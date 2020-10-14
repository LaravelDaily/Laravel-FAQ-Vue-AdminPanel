import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import TagsIndex from './cruds/Tags'
import TagsSingle from './cruds/Tags/single'
import CategoriesIndex from './cruds/Categories'
import CategoriesSingle from './cruds/Categories/single'
import QuestionsIndex from './cruds/Questions'
import QuestionsSingle from './cruds/Questions/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    TagsIndex,
    TagsSingle,
    CategoriesIndex,
    CategoriesSingle,
    QuestionsIndex,
    QuestionsSingle
  },
  strict: debug
})
