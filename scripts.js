const form = document.getElementById("form");
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const passwordConfirmation = document.getElementById("password-confirmation");
const emailRepet = document.querySelector(".emailRepet");
const button = document.querySelector(".button");
const msgSucess = document.querySelector(".msg-sucess");
var sucess;
form.addEventListener("submit", (e) => {
  var sucess = checkInputs();
  if (sucess == false) {
    e.preventDefault();
  } else {
    msgSucess.style.visibility = "visible";
  }
});

function checkInputs() {
  //declarando os valores dos inputs
  const usernameValue = username.value;
  const emailValue = email.value;
  const passwordValue = password.value;
  const passwordConfirmationValue = passwordConfirmation.value;

  if (usernameValue == "") {
    //se algum valor for vazio mensagem de erro
    setErrorFor(username, "O nome de usuário é obrigatório");
    //acionando function setErrorFor recebe um input e a mensagem para aparecer no input
  } else if (usernameValue.length > 30) {
    setErrorFor(username, "Nome de usuario não pode mais de 30 caracteres");
  } else {
    setSuccessFor(username);
  }

  if (emailValue == "") {
    setErrorFor(email, "O email é obrigatório");
  } else if (!checkEmail(emailValue)) {
    setErrorFor(email, "Por favor, insira um email válido.");
  } else if (emailValue.length > 140) {
    setErrorFor(email, "Email não pode mais de 140 caracteres");
  } else if (emailRepet) {
    setErrorFor(email, "Email já foi registrado");
  } else {
    setSuccessFor(email);
  }
  if (passwordValue == "") {
    setErrorFor(password, "A senha é obrigatória");
  } else if (passwordValue.length < 7) {
    setErrorFor(password, "A senha precisa ter no mínimo 7 caracteres");
  } else if (passwordValue.length > 30) {
    setErrorFor(password, "Senha não pode mais de 30 caracteres");
  } else {
    setSuccessFor(password);
  }
  if (passwordConfirmationValue == "") {
    setErrorFor(passwordConfirmation, "A confirmação de senha é obrigatória");
  } else if (passwordConfirmationValue != passwordValue) {
    setErrorFor(passwordConfirmation, "As senhas não são iguais");
  } else {
    setSuccessFor(passwordConfirmation);
  }

  const formControls = form.querySelectorAll(".form-control");

  const formIsValid = [...formControls].every((formControl) => {
    return formControl.className === "form-control success";
  });
  if (formIsValid) {
    return (sucess = true);
    msgSucess.style.display = "block";
  } else {
    return (sucess = false);
  }
}
//criar uma function q recebe algum input e uma  mensagem
function setErrorFor(input, message) {
  const formControl = input.parentElement;
  //retorna o input pai
  const small = formControl.querySelector("small");
  //declarando small(mensagem de erro)

  //adicionar mensagem de erro
  small.innerText = message;

  //adicionar clase de erro
  formControl.className = "form-control error";
}

function setSuccessFor(input) {
  const formControl = input.parentElement;
  //retorna o input pai

  //trocando o className do input
  formControl.className = "form-control success";
}

function checkEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}
