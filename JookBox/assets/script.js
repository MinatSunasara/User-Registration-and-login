const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const signUpForm = document.getElementById("signUpForm");
	
// signUpForm.addEventListener("submit", logSubmit);

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// function logSubmit(event) {
// 	console.log("Sign up func called")
// 	event.preventDefault();
// }


