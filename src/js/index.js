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

// Scroll links internos
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();

    const navbar = document.getElementById("navbar");
    const navbarHeight = navbar.offsetHeight; 
    const target = document.querySelector(this.getAttribute('href'));

    let extraOffset = -200;
    
    if (target.id === "faleconosco") {
      extraOffset = -520; 
    }

    const targetPosition = target.getBoundingClientRect().top + window.scrollY - navbarHeight - extraOffset;

    window.scrollTo({
      top: targetPosition,
      behavior: 'smooth'
    });
  });
});


const lista = document.querySelector(".lista-colaboradores");
const container = lista.parentElement;
const btnEsquerda = document.querySelector(".seta.esquerda");
const btnDireita = document.querySelector(".seta.direita");

let deslocamento = 0;
const larguraCard = lista.children[0].offsetWidth 
                  + parseInt(getComputedStyle(lista).gap || 0);

btnDireita.addEventListener("click", () => {
  const maxDeslocamento = -(lista.scrollWidth - container.clientWidth);


  if (deslocamento - larguraCard > maxDeslocamento) {
    deslocamento -= larguraCard;
  } else {

    deslocamento = maxDeslocamento;
  }

  lista.style.transform = `translateX(${deslocamento}px)`;
});

btnEsquerda.addEventListener("click", () => {
  if (deslocamento + larguraCard < 0) {
    deslocamento += larguraCard;
  } else {
    deslocamento = 0; 
  }

  lista.style.transform = `translateX(${deslocamento}px)`;
});


   document.getElementById("btnProjetos").addEventListener("click", function () {
    const projetos = document.querySelectorAll(".projetos .projeto");
    projetos.forEach(projeto => {
      projeto.classList.add("ativo"); // Mostra os projetos
    });

    this.style.display = "none"; // Esconde o botão
  });