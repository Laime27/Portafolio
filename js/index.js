
let menu = document.getElementById('menu');
let header = document.getElementById('header');

menu.addEventListener('click', () => {
  header.classList.toggle('header--show');
  if (header.classList.contains('header--show')) {
    header.style.left = '0';
  } else {
    header.style.left = '-300px';
  }
});


window.addEventListener('resize', () => {
  if (window.innerWidth > 1180) {
    header.style.left = '0';
  } else{header.style.left = '-300px';}
});
