const submit = document.querySelector("input[type='submit']")

const form = document.querySelector('form');
const fields = document.querySelectorAll("input");
const textArea = document.querySelector("textarea");

let params = new URLSearchParams(window.location.search);
let data = {}
params.forEach((value, key) => {
    data[key] = value;
})

//Check wether there is data or not
if (data['isbn']) {
    fields.forEach((field) => {
        if (field.type === "text") {
            field.value = data[field.name];
        } else if (field.type === "radio" && field.value === data["category"]) {
            field.checked = true;
            field.name = "category";
        } else if (field.type === "radio") {
            field.name = "category";
        }

        if (field.id == 'isbn') field.setAttribute('readonly', 'readonly');
    })
    textArea.value = data["description"];
    form.setAttribute('action', 'http://localhost/Atrons/backend/api/book/edit.php');
}

submit.addEventListener('click', (e) => {
    e.preventDefault();
    filled =  0
    fields.forEach((field) => {
        value = field.value.trim();

        if(field.id == 'isbn' || field.id == 'price' || field.id == 'num_copies') {
            //if it is not numeric don't count it
            if(isNaN(Number(value))) {
                filled -= 1;
                field.classList.add("error");
            }
        }
        
        if(field.type == 'radio') {
            if (field.checked) filled += 1;
        }
        else if(field.type !== "submit" && field.type !== "reset" && field.type !== "file") {
            console.log(value)
            if(value != '') {
                filled += 1;
            } else {
                field.classList.add("error");
            }
        }

        field.addEventListener("keyup", (e) => {
            e.target.classList.remove("error");
        }, true)
    })

    if (textArea.value.trim() !== '' & filled == 6) {
        form.submit();
    }
    
})