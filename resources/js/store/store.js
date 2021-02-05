import mutations from './mutations';
import actions from './actions';

export default {
  state: {
    locked: false,
    directoryId: '',
    directoryName: '',
    files: []
  },
  mutations,
  actions
}