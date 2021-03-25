import mutations from './mutations';
import actions from './actions';

export default {
  state: {
    locked: false,
    directoryId: 0,
    directoryName: '',
    files: []
  },
  mutations,
  actions
}