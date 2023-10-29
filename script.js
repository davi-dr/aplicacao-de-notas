const content = document.querySelector(".content");
const btnNew = document.querySelector(".addNote-content");
const modal = document.getElementById("myModal");
const modalContent = modal.querySelector(".modal-content");
const inputColor = modal.querySelector("#color");
const closeBtn = modal.querySelector("#closeModal");

const colors = [
  "#845EC2",
  "#008F7A",
  "#008E9B",
  "#FFC75F",
  "#FF8066",
  "#BA3CAF",
];
const randomColor = () => colors[Math.floor(Math.random() * colors.length)];

btnNew.onclick = () => {
  formModal();
};

function formModal() {
  const currentColor = randomColor();
  modal.style.display = "block";
  modalContent.style.backgroundColor = currentColor;
  inputColor.value = currentColor;
}

function buscarNota(id, description, color) {
  const textarea = modal.querySelector("textarea");
  const inputId = modal.querySelector("#notaId");
  const inputColor = modal.querySelector("#color");
  const content = modal.querySelector(".modal-content");
  modal.style.display = "block";
  content.style.backgroundColor = color;
  textarea.value = description;
  inputId.value = id;
  inputColor.value = color;
}

// Quando o usuário clica no elemento de fechar, fecha o modal
closeBtn.onclick = function () {
  modal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
