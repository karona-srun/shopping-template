export function login(credential) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/login', credential)
            .then(result => {
                res(result.data);
            })
            .catch(err => {
                rej("Wrong email or password");
            })
    })
}

export function register(credential) {
    return new Promise((res, rej) => {
        axios.post('/api/auth/register', credential)
            .then(result => {
                res(result.data);
            })
            .catch(err => {
                rej("Wrong email or password");
            })
    })
}

export function logout(){
    return new Promise((res, rej) => {
        const config = {
            headers: { 
                'Content-type': 'multipart/form-data,application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('access_token')
            }
        }
        axios.post('/api/auth/logout', config)
            .then(result => {
                res(result.data);
            })
            .catch(err => {
                rej("Wrong email or password");
            })
    })
}

export function currentUser() {
    const user = localStorage.getItem('user');

    if (!user) {
        return null;
    }

    return JSON.parse(user);
}
