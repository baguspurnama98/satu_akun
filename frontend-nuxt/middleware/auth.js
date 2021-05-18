import axios from 'axios'

export default function ({ store, redirect, route }) {
    // perhatikan baik baik logicnya, lebih baik list ini yg di exclude dari autentikasi, atau list ini yg perlu di autentikasi?
    let list_of_not_allowed_name_route = [
        'users',
        'admin',
        'create',
        'profile',
        'checkout',
    ]

    const regexRoute = new RegExp(list_of_not_allowed_name_route.join('|'))
    const admin = new RegExp('admin')
    const checkout = new RegExp('checkout')

    
    // ini yg belum login
    if (!store.state.auth.token && regexRoute.test(route.path)) {
        return redirect('/account/login')
    }

    let role = store.state.user ? store.state.user.role : null
    // jika lewat login, tapi bukan admin
    if (role != 'a' && admin.test(route.path)) {
        return redirect('/restricted')
    }

    // jika lewat checkout, tapi bukan user
    if (role != 'u' && checkout.test(route.path)) {
        return redirect('/restricted')
    }

    if (!store.state.auth.token) {
        /**
         * jika belum login, request credential ke tab lain, ini akan di handle sama line 70
         */
        window.localStorage.setItem('REQUEST_CREDENTIAL', Date.now().toString())
        window.localStorage.removeItem('REQUEST_CREDENTIAL')
    }



    /**
     * this concept reminder for apri
     * register event to know if on others tab had already login
     * or logout
     * check also on store/auth
     */
    window.onstorage = (event) => {
        
        if (event.key === 'SHARING_CREDENTIAL' && event.newValue) {
            if (!store.state.auth.token) {
                console.log(event.newValue)
                axios({
                    method: 'get',
                    url: 'https://service.patungin.com/api/v1/profile',
                    headers: { 'Authorization': 'Bearer ' + event.newValue }
                }).then(async (res) => {
                    if (res.status === 200) {
                        const token = event.newValue;
                        await store.dispatch("auth/setAxiosToken", { token })
                        await store.dispatch("getUserProfile", res.data.user)
                        window.location.reload();
                    }
                }).catch((err) => console.log(err));
            }
        }


        if (event.key === 'REQUEST_CREDENTIAL' && event.newValue) {
            /**
             * di handle sama yg punya token, nge fire SHARING CREDENTIAL
             */
            if (store.state.auth.token) {
                window.localStorage.setItem('SHARING_CREDENTIAL', store.state.auth.token)
                window.localStorage.removeItem('SHARING_CREDENTIALS')
            }
        }

        
        // Logout, hanya yg token nya masih ada
        if (event.key === 'CREDENTIALS_FLUSH' && event.newValue) {
            if (store.state.auth.token) {
                store.dispatch('auth/logout')
                store.dispatch('delUserProfile')
            }
        }
    };
}
