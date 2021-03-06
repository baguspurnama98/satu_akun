import Vue from 'vue';

// https://stackoverflow.com/a/59798720 referensi struktur
Vue.directive('click-outside', {
    stopProp(e) {
        e.stopPropagation();
    },
    bind: function (el, binding, vnode) {
        el.clickOutsideEvent = function (event) {
            // here I check that click was outside the el and his childrens
            if (!(el == event.target || el.contains(event.target))) {
                // https://stackoverflow.com/a/54047508 referensi fire event
                const event = new CustomEvent('clicked-outside', {
                    detail: { tag: vnode.tag }
                });
                // https://v3.vuejs.org/guide/component-custom-events.html#validate-emitted-events
                el.dispatchEvent(event);
            }
        };
        el.addEventListener('click', binding.def.stopProp);
        document.body.addEventListener('click', el.clickOutsideEvent)
    },
    unbind: function (el) {
        if(!el.clickOutsideEvent) return
        document.body.removeEventListener('click', el.clickOutsideEvent)
        delete el.clickOutsideEvent
    },
});
