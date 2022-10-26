
export default {
  async loadFiles() {
    this.isLocked = true;
    setTimeout(() => {
      this.files = [
        {
          id: 0,
          hash: 'file_1',
          name: 'wcus-pro-setup-1.jpg',
          extension: 'jpg',
          parent_id: 0,
          isDir: true,
        },
        {
          id: 1,
          hash: 'file_1',
          name: 'wcus-pro-setup-1.jpg',
          extension: 'jpg',
          parent_id: 0
        },
        {
          id: 2,
          hash: 'file_2',
          name: 'wcus-pro-setup-2.jpg',
          extension: 'jpg',
          parent_id: 0
        },
        {
          id: 3,
          hash: 'file_3',
          name: 'wcus-pro-setup-3.jpg',
          extension: 'jpg',
          parent_id: 0
        },
      ];
      this.isLocked = false;
    }, 1000);
  }
}
