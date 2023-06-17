const submit = document.querySelector("input[type='submit']")

const form = document.querySelector('form');
const fields = document.querySelectorAll("input");
const textArea = document.querySelector("textarea");

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