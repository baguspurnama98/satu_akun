export default function ({ store, redirect, route }) {
    // console.log(route)

    // perhatikan baik baik logicnya, lebih baik list ini yg di exclude dari autentikasi, atau list ini yg perlu di autentikasi?
    let list_of_not_allowed_name_route = [
        'users',
        'admin',
        'create',
        'checkout'
    ]

    const regexRoute = new RegExp(list_of_not_allowed_name_route.join('|'))
    const admin = new RegExp('admin')


    // console.log(store.state.auth.token)
    

    // ini yg belum login
    if (!store.state.auth.token && regexRoute.test(route.path)) {
        return redirect('/account/login');
    }

    // jika lewat login, tapi bukan admin
    let role = store.state.user ? store.state.user.role : null;
    if (role != "a" && admin.test(route.path)) {
        return redirect('/restricted');
    }
}