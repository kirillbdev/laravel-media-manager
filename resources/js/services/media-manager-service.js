import axios from 'axios';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default {
  getFiles (dir) {
    return new Promise(function (resolve, reject) {
        axios.get('media-manager/files', {
          directory: dir
        })
          .then(function (response) {
            if (response.data.success) {
              resolve(response.data.data);
            }
            else {
              reject();
            }
          });
    });
  },
  renameFile: function (formData) {
    return new Promise(function (resolve, reject) {
        IdeaAjax.post('/admin/media-manager/rename', formData, {
          'Content-Type': 'multipart/form-data'
        })
        .success(function (response) {
            resolve();
        })
        .response(function () {
            reject();
        });
    })
  },
  deleteFile: function (formData) {
    return new Promise(function (resolve, reject) {
        IdeaAjax.post('/admin/media-manager/delete', formData, {
            'Content-Type': 'multipart/form-data'
        })
        .success(function (response) {
            if (response.isSuccess()) {
                resolve();
            }
        })
        .response(function () {
            reject();
        });
    })
  },
  createFolder: function (folderData) {
    return new Promise(function (resolve, reject) {
        IdeaAjax.post(PageData.adminUrl + 'media-manager/createDirectory', folderData)
        .success(function (response) {
            if (response.isSuccess()) {
                resolve();
            }
        })
        .response(function () {
            reject();
        });
    })
  }
}