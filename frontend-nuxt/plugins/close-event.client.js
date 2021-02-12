import Vue from 'vue';

// https://stackoverflow.com/a/59798720 referensi struktur
Vue.directive('click-outside', {
    bind: function (el, binding, vnode) {
        el.clickOutsideEvent = function (event) {
            // here I check that click was outside the el and his childrens
            if (!(el == event.target || el.contains(event.target))) {
                console.log('emitting event')
                // https://stackoverflow.com/a/54047508 referensi fire event
                const event = new CustomEvent('clicked-outside', {});
                el.dispatchEvent(event);
            }
        };
        document.body.addEventListener('click', el.clickOutsideEvent)
    },
    unbind: function (el) {
        document.body.removeEventListener('click', el.clickOutsideEvent)
    },
});
