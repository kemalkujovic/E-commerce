function validateForm() {
  const name = document.getElementById("name").value;
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
  let errors = {};
  if (name.length < 3) {
    errors.name = "Ime mora imati vise od 2 karaktera.";
  }
  if (lastName.length < 3) {
    errors.prezime = "Prezime mora imati vise od 2 karaktera.";
  }
  if (lozinka.length < 6) {
    errors.passowrd = "Lozinka mora imati najmanje 6 karaktera";
  }
  const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!email.match(emailRegex)) {
    errors.email = "Unesite ispravnu E-mail adresu.";
  }

  if (Object.keys(errors).length > 0) {
    if (errors.name) {
      nameError.textContent = errors.name;
    }
    if (errors.prezime) {
      lastNameError.textContent = errors.prezime;
    }
    if (errors.passowrd) {
      passwordError.textContent = errors.passowrd;
    }
    if (errors.email) {
      emailError.textContent = errors.email;
    }
    return false;
  }
  return true;
}
