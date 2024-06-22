function validateForm() {
  // Validate CPF (allow both formats with or without dots)
  const cpfRegex = /^(?:\d{3}\.\d{3}\.\d{3}-\d{2})|(?:\d{11})$/;
  if (!cpfRegex.test(cpf.value)) {
    alert("O CPF é inválido. Digite no formato XXX.XXX.XXX-XX ou XXXXXXXXXXXXX");
    cpf.focus();
    cpf.style.border = "2px solid red";
    return false; 
  } else if (cpf.value.length !== 11) {
    alert("O CPF precisa ter 11 caracteres");
    cpf.focus();
    cpf.style.border = "2px solid red";
    return false; 
  } else {
    cpf.style.border = "";
  }

 
  if (creci.value.length < 2) {
    alert("O CRECI precisa ter no mínimo 2 caracteres");
    creci.focus();
    creci.style.border = "2px solid red";
    return false; 
  } else {
    creci.style.border = "";
  }

  if (nome.value.trim().length < 2) {
    alert("O Nome precisa ter no mínimo 2 caracteres (sem espaços extras)");
    nome.focus();
    nome.style.border = "2px solid red";
    return false; 
  } else {
    nome.style.border = "";
  }

  
  return true;
}
