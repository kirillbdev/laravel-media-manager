export default {
  lock (state) {
    state.locked = true;
  },
  unlock (state) {
    state.locked = false;
  },
  setFiles (state, files) {
    state.files = files;
  },
  setState: function (state, newState) {
    state.state = newState;
  },
  setDefaultState: (state) => {
    state.state = 'default';
  },
    setLoadingState: (state) => {
  state.state = 'loading';
},
  setDirectory: function (state, dir) {
  state.directory = dir;
},

  removeFile: function (state, id) {
    state.files = state.files.filter((file) => file.id !== id);
  },
  changeDirectory: function (state, path) {
    state.directoryTree.push(path);
    state.directory = '/' + state.directoryTree.join('/');
  }
}