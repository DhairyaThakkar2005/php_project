const form = document.getElementById("loginForm");

form.onsubmit = function(event) {
    const userId = document.getElementById("userId").value;
    const password = document.getElementById("password").value;

    // Prevent the default form submission
    event.preventDefault();

    // Check if either field is empty
    if (!userId && !password) {
        alert("Please enter both User Id and Password.");
    } else if (!userId) {
        alert("Please enter User Id.");
    } else if (!password) {
        alert("Please enter Password.");
    } else {
        alert(`Login Done Successfully`);
    }
};
