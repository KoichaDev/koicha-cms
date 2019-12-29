const getID = (id) => document.getElementById(id);
const getSelector = (selector) => document.querySelector(selector);

const username = getID('username').value;
const password = getID('password').value;
const url = window.location.pathname;

/* const checkLogin = () => {
    getID('login-btn').addEventListener('click', (e) => {
            if (username === '' || password === '') {
                e.preventDefault();
                getSelector('.error-msg-login-widget').innerHTML = '<p">Enter the username and password</p">';
            }

            if (username === '') {
                e.preventDefault();
                getSelector('.error-msg-login-widget').innerHTML = '<p">Enter a username</p">';
            }

            if (password == '') {
                e.preventDefault()
                getSelector('.error-msg-login-widget').innerHTML = '<p">Enter a password</p">';
            }
    });
} */

if(url === '/') {
    // checkLogin();
}

if (url === '/index.php') {
    //getSelector('.error-msg-login-widget').innerHTML = '<p">You entered wrong username or password</p">';
    // checkLogin();
}