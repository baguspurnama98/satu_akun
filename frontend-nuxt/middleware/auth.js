export default function ({ store, redirect, route }) {
    // console.log(route)

    // perhatikan baik baik logicnya, lebih baik list ini yg di exclude dari autentikasi, atau list ini yg perlu di autentikasi?
    let list_of_not_allowed_name_route = [
        'users',
        'admin',
        'create',
        'checkout'
    ]

    let regexRoute = new RegExp(list_of_not_allowed_name_route.join('|'))

    // console.log(store.state.auth.token)

    if (!store.state.auth.token && regexRoute.test(route.path)) {
        return redirect('/account/login');
    }
}