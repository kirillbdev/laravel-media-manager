import { defineStore } from 'pinia'
import getters from './getters';
import actions from './actions';

export const useStore = defineStore({
  state: () => {
    return {
      counter: 0,
      files: [],
      isLocked: true,
    }
  },
  getters,
  actions,
});

export function mutate(key, value) {
  const store = useStore();

  if (typeof store[key] === 'undefined') {
    throw new Error(`Invalid store key "${key}" for mutate`);
  }

  store[key] = value;
}
