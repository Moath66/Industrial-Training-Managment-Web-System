// Common functions for multiple pages

// Function to retrieve user level from session storage
function getUserLevel() {
  return sessionStorage.getItem('userLevel');
}

// Function to check if a user is logged in
function isLoggedIn() {
  return sessionStorage.getItem('isLoggedIn') === 'true';
}

// Function to redirect the user to the login page if not logged in
function redirectToLogin() {
  if (!isLoggedIn()) {
    window.location.href = 'login.html';
  }
}

// Function to log out the user
function logoutUser() {
  sessionStorage.clear();
  window.location.href = 'login.html';
}

// Function to display an alert message
function showAlert(message) {
  alert(message);
}

// Example usage of common functions
function exampleUsage() {
  const userLevel = getUserLevel();
  if (userLevel === 'admin') {
    console.log('User is an admin');
  } else if (userLevel === 'coordinator') {
    console.log('User is a coordinator');
  } else if (userLevel === 'student') {
    console.log('User is a student');
  }

  if (isLoggedIn()) {
    console.log('User is logged in');
  } else {
    console.log('User is not logged in');
  }

  redirectToLogin();

  logoutUser();

  showAlert('This is an example alert message');
}

// Run example usage function
exampleUsage();
