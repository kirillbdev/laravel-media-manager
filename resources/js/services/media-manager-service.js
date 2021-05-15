import axios from 'axios';

import Storage from './storage';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default {
  async getFiles (pathId) {
      const response = await axios.get('/media-manager/files');

      if (response.data.success) {
          return response.data.data;
      }
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
