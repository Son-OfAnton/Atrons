records = undefined;

const bookAttributes = ['ISBN', 'title', 'author', 'category', 'num_copies', 'price']
const userAttributes = ['email', 'first_name', 'last_name', 'gender', 'phone']

let currentAttribute = bookAttributes;
let currentTable = 'book';


const thead = document.getElementsByTagName('thead')[0];

function changeHeader(currentTable) {
    if (currentTable == 'book') {
        thead.innerHTML = "<th>ISBN</th><th>Title</th><th>Author</th><th>Category</th><th>Amount</th><th>Price</th>";
    } else {
        thead.innerHTML = "<th>Email</th><th>First Name</th><th>Second Name</th><th>Gender</th><th>Phone</th>";
    }
}

changeHeader(currentTable);

getData(currentTable);

async function getData(currentTable) {
    try {
        response = await fetch("http://localhost/Atrons/backend/api/"+currentTable+"/read.php");
        data = await response.json();
    
        if (data.message) console.error("Some thing went wrong!");
        
        else {
            records = data.data;
            populateTable(records, currentAttribute)
        }
    } catch(e) {
        console.log("Error" + e);
    }
    
}

function populateTable(Data, attributes) {
    table_body = document.getElementsByTagName('tbody')[0];
    table_body.replaceWith(document.createElement("tbody"));
    table_body = document.getElementsByTagName('tbody')[0];
    Data.forEach(book => {
        row = document.createElement('tr');
        attributes.forEach((attribute) => {
            cell = document.createElement('td');
            
            if (attribute=='ISBN' || attribute=='email')
            cell.setAttribute("onclick", "deleteRecord(event)")

            if (attribute == 'title') {
                let newUrl = encodeURI(book[attribute]); 
                console.log(newUrl);
                url = `http://localhost/Atrons/backend/api/book/read_single.php?title=${newUrl}`;
                book[attribute] = `<a href=${url}> ${book[attribute]} </a>`;
            }

            // cell.append(book[attribute]);
            cell.innerHTML = book[attribute];
            row.append(cell);
        })
        table_body.append(row)
    });
}

const searchbar = document.getElementById('search');

//search records by any thing
searchbar.addEventListener('keyup', (e) => {
    if (!records) return;
    filtered = []
    for (let i = 0; i < records.length; i++) {

        match = false
        for (j = 0; j < currentAttribute.length; j++) {
            key = String(records[i][currentAttribute[j]])
            key = key.toLowerCase()
            if (key.includes(e.target.value.trim().toLowerCase())) {
               match = true;
               break;
            }
        }
        if (match) filtered.push(records[i])
    }
    populateTable(filtered, currentAttribute)
});

//delete records permanently
function deleteRecord(event) {

    let recordId = event.target.innerHTML;
    let field = currentTable == 'book' ? 'isbn' : 'email';

    if (!confirm('Are you sure you want to delete this record?')) return;
    
    fetch("http://localhost/Atrons/backend/api/"+currentTable+"/delete.php?" + field + "=" + recordId)
    .then(() => location.reload(true));
    //Refresh the page after finishing the deletion.

}

function editRecord(event) {
    let recordId = event.target.innerHTML;
    let field = 'title';

    if (!confirm('Are you sure you want to delete this record?')) return;
    
    fetch("http://localhost/Atrons/backend/api/"+currentTable+"/edit.php?" + field + "=" + recordId)
    .then(() => location.reload(true));
}

const navs = document.querySelectorAll('ul');
const title = document.querySelector('h3');
navs.forEach(nav => {
    nav.addEventListener('click', (e) => {
        e.preventDefault();
        switch(e.target.id) {
            case 'user':
                currentTable = 'user'
                currentAttribute = userAttributes;
                getData(currentTable);
                break;
            default:
                currentTable = 'book'
                currentAttribute = bookAttributes;
                getData(currentTable);   
        }
        changeHeader(currentTable);
    })
})


