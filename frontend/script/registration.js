const form = document.getElementById("registration-form");
const firstNameInput = document.getElementById("first-name");
const lastNameInput = document.getElementById("last-name");
const emailInput = document.getElementById("email");
const phoneInput = document.getElementById("phone");
const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");
const genderInputs = document.getElementsByName("gender");

form.addEventListener("submit", function (event) {
  event.preventDefault();

  clearErrorMessages();

  if (!validateFirstName(firstNameInput.value)) {
    displayErrorMessage(firstNameInput, "Please enter a valid first name.");
    return;
  }

  if (!validateLastName(lastNameInput.value)) {
    displayErrorMessage(lastNameInput, "Please enter a valid last name.");
    return;
  }

  if (!validateEmail(emailInput.value)) {
    displayErrorMessage(emailInput, "Please enter a valid email address.");
    return;
  }

  if (!validatePhone(phoneInput.value)) {
    displayErrorMessage(phoneInput, "Please enter a valid phone number.");
    return;
  }

  if (!validatePassword(passwordInput.value)) {
    displayErrorMessage(passwordInput, "Please enter a valid password.");
    return;
  }

  if (
    !validateConfirmPassword(passwordInput.value, confirmPasswordInput.value)
  ) {
    displayErrorMessage(confirmPasswordInput, "Passwords do not match.");
    return;
  }

  if (!validateGender()) {
    const genderTitle = document.getElementsByClassName("gender-title")[0];
    displayErrorMessage(genderTitle, "Please select a gender.");
    return;
  }

  //   form.submit();
  registerUser();
});

function validateFirstName(firstName) {
  return firstName.length > 0 && !containsNumber(firstName);
}

function validateLastName(lastName) {
  return lastName.length > 0 && !containsNumber(lastName);
}

function validateEmail(email) {
  // Regular expression for email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function validatePhone(phone) {
  // Regular expression for phone number validation
  const phoneRegex = /^[0-9]{10}$/;
  return phoneRegex.test(phone);
}

function validatePassword(password) {
  return password.length >= 8;
}

function validateConfirmPassword(password, confirmPassword) {
  return password === confirmPassword;
}

function validateGender() {
  for (let i = 0; i < genderInputs.length; i++) {
    if (genderInputs[i].checked) {
      return true;
    }
  }
  return false;
}

function containsNumber(str) {
  return /\d/.test(str);
}

function displayErrorMessage(element, message) {
  const errorMessageElement = document.createElement("div");
  errorMessageElement.classList.add("error-message");
  errorMessageElement.innerText = message;

  element.insertAdjacentElement("afterend", errorMessageElement);

  // Scroll to the error message
  errorMessageElement.scrollIntoView({ behavior: "smooth" });

  element.classList.add("error");
}

function clearErrorMessages() {
  const errorMessages = document.getElementsByClassName("error-message");
  while (errorMessages.length > 0) {
    errorMessages[0].remove();
  }

  const errorInputs = document.getElementsByClassName("error");
  while (errorInputs.length > 0) {
    errorInputs[0].classList.remove("error");
  }
}

function registerUser() {
  var apiUrl = "http://localhost/Atrons/backend/api/user/register_user.php";

  var firstName = document.getElementById("first-name").value;
  var lastName = document.getElementById("last-name").value;
  var email = document.getElementById("email").value;
  var phone = document.getElementById("phone").value;
  var password = document.getElementById("password").value;

  //   var genderRadios = document.getElementsByName("gender");
  var selectedGender = "";
  var male = document.getElementById("dot-1");
  var female = document.getElementById("dot-2");
  if (male.checked) {
    selectedGender = "Male";
  } else {
    selectedGender = "Female";
  }

  //   for (var i = 0; i < genderRadios.length; i++) {
  //     if (genderRadios[i].checked) {
  //       selectedGender = genderRadios[i].value;
  //       break;
  //     }
  //   }

  var requestData = {
    firstName: firstName,
    lastName: lastName,
    email: email,
    phone: phone,
    password: password,
    gender: selectedGender,
  };

  var xhr = new XMLHttpRequest();
  xhr.open("POST", apiUrl, true);
  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        console.log(response.message); // Output the response message
      } else {
        console.error("Error:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(requestData));
}
