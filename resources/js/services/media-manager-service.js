import axios from 'axios';

import Storage from './storage';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

export default {
  async getFiles (pathId) {
    return new Promise((resolve, reject) => {
      const files = Storage.filter(item => item.parent_id === pathId);

      resolve({
        success: true,
        data: files
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