function validateForm() {
  const ime = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const lozinka = document.getElementById("password").value;
  const lastName = document.getElementById("lastName").value;

  const nameError = document.getElementById("nameError");
  const emailError = document.getElementById("emailError");
  const passwordError = document.getElementById("passwordError");
  const lastNameError = document.getElementById("lastNameError");
  nameError.textContent = "";
  emailError.textContent = "";
  passwordError.textContent = "";
  lastNameError.textContent = "";

  // Provjera da li ime vise od 2 karaktera.
  if (ime.length < 3) {
    nameError.textContent = "Ime mora imati vise od 2 karaktera.";
    return false;
  }
  if (lastName.length < 3) {
    lastNameError.textContent = "Prezime mora imati vise od 2 karaktera.";
    return false;
  }
  if (lozinka.length < 6) {
    passwordError.textContent = "Lozinka mora imati najmanje 6 karaktera.";
    return false;
  }
  // Provjera  e-mail adrese
  const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!email.match(emailRegex)) {
    emailError.textContent = "Unesite ispravnu E-mail adresu.";
    return false;
  }

  return true;
}
