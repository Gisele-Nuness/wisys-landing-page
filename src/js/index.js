const botaoMostrarMais = document.querySelector('.btn-mostrar-projetos')
const projetosInativos = document.querySelectorAll('.projeto:not(.ativo)')

botaoMostrarMais.addEventListener('click', () => {
    mostrarMaisProjetos();
    esconderBotao();
})

function esconderBotao() {
    botaoMostrarMais.classList.add('remover')
}

function mostrarMaisProjetos() {
    projetosInativos.forEach((projeto) => {
        projeto.classList.add('ativo')
    })
}

const typedText = document.querySelector(".typed-text");
const cursor = document.querySelector(".cursor");
const text = 'Wisys, a sabedoria por trás de cada sistema!';
let i = 0;

function type() {
  if (i < text.length) {
    typedText.textContent += text.charAt(i);
    i++;
    setTimeout(type, 60);
  }
}
window.addEventListener('DOMContentLoaded', type);


window.addEventListener("scroll", function () {
  const navbar = document.getElementById("navbar");

  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});
