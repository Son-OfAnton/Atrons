$(document).ready(function () {
  // Function to make the API request and display the results
  function getUsers() {
    $.ajax({
      url: "http://localhost/Atrons/backend/api/user/read.php",
      method: "GET",
      dataType: "json",
      success: function (data) {
        if (data.message) {
          // Handle case when no users found
          $("#userList").text(data.message);
        } else {
          // Iterate through each user and create a list item
          const userList = $("#userList");
          $.each(data.data, function (index, user) {
            const listItem = $("<li>").text(
              user.first_name + " " + user.last_name
            );
            userList.append(listItem);
          });
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", error);
      },
    });
  }

  // Call the function to fetch and display users
  getUsers();
});
