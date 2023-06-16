const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('message');

const error = document.getElementById("errormessage");

if (message!=null) error.style.display = "block"
window.history.replaceState({}, document.title, window.location.pathname);//move back to the original url


const form = document.getElementById('login');
const email = document.getElementById("email"); 
const password = document.getElementById("pass");

//Check if there are empty fields before submit
form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (email.value == "" || password.value == "") {
        error.innerHTML = "There are empty fields!!"
        error.style.display = 'block'
    }
    else
        form.submit();
})
