const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('message');

window.history.replaceState({}, document.title, window.location.pathname);//move back to the original url
const error = document.getElementById("errormessage");

if (message!=null) error.style.display = ""