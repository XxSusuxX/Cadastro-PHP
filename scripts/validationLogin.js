const form = document.getElementById("form");
const email = document.getElementById("email");
const password = document.getElementById("password");
var sucess;
form.addEventListener("submit", (e) => {
  sucess = check();
  if (sucess == false) {
    e.preventDefault();
  }
});
function check() {
  //declarando os valores dos inputs
  const emailValue = email.value;
  const passwordValue = password.value;

  if (emailValue == "") {
    setErrorFor(email, "O email é obrigatório");
    var erro = false;
  } else {
  }
  if (passwordValue == "") {
    setErrorFor(password, "A senha é obrigatória");
    erro = false;
  }

  const formControls = form.querySelectorAll(".form-control");

  const formIsValid = [...formControls].every((formControl) => {
    return formControl.className === "form-control success";
  });

  if (erro == false) {
    return (sucess = false);
  }
}

function setSuccessFor(input) {
  const formControl = input.parentElement;
  //retorna o input pai

  //trocando o className do input
  formControl.className = "form-control success";
}

window.addEventListener("load", () => {
  // verifica se há um status de cadastro no armazenamento local
  const cadastroStatus = localStorage.getItem("cadastroStatus");

  if (cadastroStatus === "sucesso") {
    // exibe a mensagem de cadastro realizado com sucesso
    msgSucess.style.visibility = "visible";

    // remove o status de cadastro do armazenamento local
    localStorage.removeItem("cadastroStatus");
  }
});
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
