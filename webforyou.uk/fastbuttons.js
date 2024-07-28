const f1but=document.querySelector('#fast1');
const f2but=document.querySelector('#fast2');
const f3but=document.querySelector('#fast3');

const f1target=document.querySelector('.pricelist');
const f2target=document.querySelector('.opinions');
const f3target=document.querySelector('.websites');

f1but.addEventListener('click', () => {
  f1target.scrollIntoView({ behavior: 'smooth' });
});
f2but.addEventListener('click', () => {
  f2target.scrollIntoView({ behavior: 'smooth' });
});
f3but.addEventListener('click', () => {
  f3target.scrollIntoView({ behavior: 'smooth' });
});