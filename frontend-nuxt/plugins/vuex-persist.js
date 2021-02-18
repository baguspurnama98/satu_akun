import VuexPersistence from 'vuex-persist'

// https://www.npmjs.com/package/vuex-persist#examples
export default ({ store }) => {
  new VuexPersistence({
    /* your options */
    key: 'vuex', // The key to store the state on in the storage provider.
    storage: window.sessionStorage, // or window.sessionStorage or localForage 
  }).plugin(store);
}