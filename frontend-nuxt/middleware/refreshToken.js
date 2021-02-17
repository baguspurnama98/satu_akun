import cookies from 'js-cookie';

export default function ({ store, redirect }) {
    const token = cookies.get('x-access-token');

    if (!token) {
        store.dispatch('refreshToken')
            .catch(errors => {
                console.log(errors);
                store.dispatch('logout');
            });
    }
}