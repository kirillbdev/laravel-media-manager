import i18n from './../lang/dialog';

export default {
  props: [
    'file',
    'index'
  ],
  i18n: i18n,
  methods: {
    ...IdeaUI.mapActions('media-manager', [
      'renameFile',
      'deleteFile'
    ]),
    rename () {
      let newName = prompt(this.$t('prompt_new_name'), this.file.base_name);

      if ( ! newName || newName === this.file.base_name) {
        return;
      }

      this.renameFile({
        oldName: this.file.name,
        newName: newName + (this.file.extension ? '.' + this.file.extension : ''),
        fileIndex: this.index
      });
    },
    remove () {
      if ( ! confirm(this.$t('confirm_delete'))) {
        return;
      }

      this.deleteFile({
        name: this.file.name,
        fileIndex: this.index
      });
    }
  }
}