// Function to add a new user
function addUser(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  const username = document.getElementById('name').value;
  const password = document.getElementById('password').value;
  const userType = document.getElementById('userType').value;

  // Perform validation
  if (username === "") {
    alert("Please enter a User Name.");
    return;
  }
  if (password === "") {
    alert("Please enter a Password.");
    return;
  }
  if (userType === "" || userType === "Choose a User") {
    alert("Please select a User Type.");
    return;
  }

  // Add your logic here to add a new user to the database

  // Clear the form after adding the user
  document.getElementById('name').value = '';
  document.getElementById('password').value = '';
  document.getElementById('userType').selectedIndex = 0;
}

// Function to edit user information
function editUser(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  const userId = document.getElementById('userId').value;
  const newUsername = document.getElementById('newUsername').value;
  const newPassword = document.getElementById('newPassword').value;
  const newUserType = document.getElementById('newUserType').value;

  // Perform validation
  if (userId === "") {
    alert("Please enter a User ID.");
    return;
  }
  if (newUsername === "") {
    alert("Please enter a new User Name.");
    return;
  }
  if (newPassword === "") {
    alert("Please enter a new Password.");
    return;
  }
  if (newUserType === "" || newUserType === "Choose a User") {
    alert("Please select a new User Type.");
    return;
  }

  // Add your logic here to edit user information in the database

  // Clear the form after editing the user
  document.getElementById('userId').value = '';
  document.getElementById('newUsername').value = '';
  document.getElementById('newPassword').value = '';
  document.getElementById('newUserType').selectedIndex = 0;
}
