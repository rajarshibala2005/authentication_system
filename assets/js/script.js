
// DOM Elements
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');
const authForms = document.getElementById('auth-forms');
const loggedInView = document.getElementById('logged-in-view');
const userEmailElement = document.getElementById('user-email');
const logoutBtn = document.getElementById('logout-btn');
const tabs = document.querySelectorAll('.tab');
const forms = document.querySelectorAll('.form');
const toastContainer = document.getElementById('toast-container');

// Show toast notification
function showToast(message, type = 'info') {
  const toast = document.createElement('div');
  toast.className = `toast toast-${type}`;
  toast.textContent = message;
  
  toastContainer.appendChild(toast);
  
  // Automatically remove toast after 3 seconds
  setTimeout(() => {
    toast.style.animation = 'fadeOut 0.3s ease-out forwards';
    setTimeout(() => {
      toastContainer.removeChild(toast);
    }, 300);
  }, 3000);
}

// // Login form submission
// loginForm.addEventListener('submit', (e) => {
//   e.preventDefault();
//   const formData = new FormData(loginForm);
//   const email = formData.get('loginEmail');
  
//   // Here you would typically validate credentials with a backend
//   // For demo purposes, we'll just log in the user
  
//   // Update UI to logged in state
//   authForms.classList.remove('visible');
//   authForms.classList.add('hidden');
//   loggedInView.classList.remove('hidden');
//   loggedInView.classList.add('visible');
//   userEmailElement.textContent = email;
  
//   // Show success message
//   showToast('You have been logged in successfully', 'success');
  
//   // Reset form
//   loginForm.reset();
// });

// // Signup form submission
// signupForm.addEventListener('submit', (e) => {
//   e.preventDefault();
//   const formData = new FormData(signupForm);
//   const email = formData.get('signupEmail');
//   const password = formData.get('signupPassword');
//   const confirmPassword = formData.get('confirmPassword');
  
//   // Validate passwords match
//   if (password !== confirmPassword) {
//     showToast('Passwords do not match', 'error');
//     return;
//   }
  
//   // Here you would typically register the user with a backend
//   // For demo purposes, we'll just log in the user
  
//   // Update UI to logged in state
//   authForms.classList.remove('visible');
//   authForms.classList.add('hidden');
//   loggedInView.classList.remove('hidden');
//   loggedInView.classList.add('visible');
//   userEmailElement.textContent = email;
  
//   // Show success message
//   showToast('Account created successfully', 'success');
  
//   // Reset form
//   signupForm.reset();
// });

// // Logout functionality
// logoutBtn.addEventListener('click', () => {
//   // Update UI to logged out state
//   loggedInView.classList.remove('visible');
//   loggedInView.classList.add('hidden');
//   authForms.classList.remove('hidden');
//   authForms.classList.add('visible');
  
//   // Show success message
//   showToast('You have been logged out successfully', 'info');
// });