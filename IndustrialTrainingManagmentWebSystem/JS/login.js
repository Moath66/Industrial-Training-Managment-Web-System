// Login functionality

// Function to handle login form submission
function handleLogin(event) {
  event.preventDefault(); // Prevent form submission

  // Get the username and password from the form
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Perform login validation
  if (username === 'admin' && password === 'admin123') {
    // Set session variables for logged-in user
    sessionStorage.setItem('isLoggedIn', 'true');
    sessionStorage.setItem('userLevel', 'admin');

    // Redirect to the admin page
    window.location.href = 'admin.html';
  } else if (username === 'coordinator' && password === 'coordinator123') {
    // Set session variables for logged-in user
    sessionStorage.setItem('isLoggedIn', 'true');
    sessionStorage.setItem('userLevel', 'coordinator');

    // Redirect to the coordinator page
    window.location.href = 'coordinator.html';
  } else if (username === 'student' && password === 'student123') {
    // Set session variables for logged-in user
    sessionStorage.setItem('isLoggedIn', 'true');
    sessionStorage.setItem('userLevel', 'student');

    // Redirect to the student page
    window.location.href = 'student.html';
  } else {
    // Show login error message
    document.getElementById('loginError').style.display = 'block';
  }
}

// Add event listener to login form submission
document.getElementById('loginForm').addEventListener('submit', handleLogin);
console.clear();

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

loginBtn.addEventListener('click', (e) => {
  let parent = e.target.parentNode.parentNode;
  Array.from(e.target.parentNode.parentNode.classList).find((element) => {
    if(element !== "slide-up") {
      parent.classList.add('slide-up')
    }else{
      signupBtn.parentNode.classList.add('slide-up')
      parent.classList.remove('slide-up')
    }
  });
});

signupBtn.addEventListener('click', (e) => {
  let parent = e.target.parentNode;
  Array.from(e.target.parentNode.classList).find((element) => {
    if(element !== "slide-up") {
      parent.classList.add('slide-up')
    }else{
      loginBtn.parentNode.parentNode.classList.add('slide-up')
      parent.classList.remove('slide-up')
    }
  });
});
