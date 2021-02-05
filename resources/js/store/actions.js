import MediaManagerService from './../services/media-manager-service';

export default {
  getFiles ({ commit, state }) {
    commit('lock');

    MediaManagerService.getFiles(state.directoryId)
      .then(function (data) {
        commit('setFiles', data.files);
      })
      .finally(function () {
        commit('unlock');
      });
  },
  loadFiles: ({commit}, dir) => {
    commit('setLoadingState');

    MediaManagerService.loadFiles(dir)
      .then(function (files) {
        commit('setDirectory', dir);
        commit('setFiles', files);
      })
      .finally(function () {
        commit('setDefaultState');
      });
  },
  renameFile: ({commit, state}, file) => {
    let newName = prompt('Новое имя', file.base_name);

    if ( ! newName || newName === file.base_name) {
      return;
    }

    let formData = new FormData();

    commit('setLoadingState');

    formData.append('old_name', file.name);
    formData.append('new_name', newName + (file.extension ? '.' + file.extension : ''));
    formData.append('directory', state.directory);

    MediaManagerService.renameFile(formData)
      .then(function (response) {
        file.base_name = newName;
        file.name = newName + (file.extension ? '.' + file.extension : '');
      })
      .finally(function () {
        commit('setDefaultState');
      });
  },
  deleteFile: function ({commit, state}, file) {
    if ( ! confirm('Подтвердите действие')) {
      return;
    }

    let formData = new FormData();

    commit('setLoadingState');

    formData.append('name', file.name);
    formData.append('directory', state.directory);

    MediaManagerService.deleteFile(formData)
      .then(function (response) {
        commit('removeFile', file.id);
      })
      .finally(function () {
        commit('setDefaultState');
      });
  },
  createFolder: function ({dispatch, commit, state}) {
    let folderName = prompt("Введите название папки", 'Новая папка');

    commit('setLoadingState');

    if (folderName) {
      let folderData = {
        name: folderName,
        directory: state.directory
      };

      MediaManagerService.createFolder(folderData)
        .then(function (response) {
          dispatch('loadFiles', state.directory);
        })
        .finally(function () {
          commit('setDefaultState');
        });
    }
  }
}