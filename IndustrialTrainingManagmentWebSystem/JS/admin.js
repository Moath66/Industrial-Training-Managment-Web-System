
//**********************************************************************************NAVBAR********************************************************************//

// Function to add a new user
function addUser(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  const userLevel = document.getElementById('userLevel').value;

  // Perform validation and database operations
  // Add your logic here to add a new user to the database

  // Clear the form after adding the user
  document.getElementById('username').value = '';
  document.getElementById('password').value = '';
  document.getElementById('userLevel').selectedIndex = 0;
}

// Function to edit user information
function editUser(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input values
  const userId = document.getElementById('userId').value;
  const newUsername = document.getElementById('newUsername').value;
  const newPassword = document.getElementById('newPassword').value;
  const newUserLevel = document.getElementById('newUserLevel').value;

  // Perform validation and database operations
  // Add your logic here to edit user information in the database

  // Clear the form after editing the user
  document.getElementById('userId').value = '';
  document.getElementById('newUsername').value = '';
  document.getElementById('newPassword').value = '';
  document.getElementById('newUserLevel').selectedIndex = 0;
}

// Function to delete a user
function deleteUser(event) {
  event.preventDefault(); // Prevent form submission

  // Get the input value
  const userIdToDelete = document.getElementById('userIdToDelete').value;

  // Perform validation and database operations
  // Add your logic here to delete a user from the database

  // Clear the form after deleting the user
  document.getElementById('userIdToDelete').value = '';
}

// Add event listeners to the forms
document.getElementById('addUserForm').addEventListener('submit', addUser);
document.getElementById('editUserForm').addEventListener('submit', editUser);
document.getElementById('deleteUserForm').addEventListener('submit', deleteUser);
//**********************************************************************************sidebar********************************************************************//





