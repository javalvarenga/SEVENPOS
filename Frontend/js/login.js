import { API_URL } from "../utils/constants";

const loginForm = document.querySelector('#loginForm');
const loginButton = document.querySelector('#loginButton');
const registerButton = document.querySelector('#registerButton');

loginForm.addEventListener('submit', event => {
    event.preventDefault();
    const username = document.querySelector('#username').value;
    const password = document.querySelector('#password').value;

    console.log('log',username, password);

    fetch(API_URL + 'login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            username,
            password
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '/';
            } else {
                alert('Email o contraseña incorrectos');
            }
        })
        .catch(error => console.error('Error:', error));
});



