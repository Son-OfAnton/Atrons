// Function to make the API request and display the results
function getUsers() {
  fetch("http://localhost/Atrons/backend/api/book/read.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.message) {
        // Handle case when no users found
        document.getElementById("userList").innerHTML = data.message;
      } else {
        // Iterate through each user and create a list item
        const userList = document.getElementById("userList");
        data.data.forEach((user) => {
          const listItem = document.createElement("li");
          listItem.textContent = `${user.first_name} ${user.last_name}`;
          userList.appendChild(listItem);
        });
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// Call the function to fetch and display users
getUsers();
