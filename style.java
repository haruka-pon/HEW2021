// ポップアップ
// btn=押した場所
//default＝id名
//item2=class名
const clickEvwent = document.getElementById('menu');
clickEvwent.addEventListener('click', ()=>{
    document.getElementById('default').classList.toggle('item2');
    });

$(function() {
    $('.hamburger').click(function() {
        $(this).toggleClass('active');
 
        if ($(this).hasClass('active')) {
            $('.globalMenuSp').addClass('active');
        } else {
            $('.globalMenuSp').removeClass('active');
        }
    });
});

// window.onload = function() {
//   Particles.init({
//     selector: '.background'
//   });
// };

// window.onload = function() {
//   Particles.init({
//     selector: '.background',
//     sizeVariations: 30,
//     color: [
//       '#0bd', 'rgba(0,187,221,.5)', 'rgba(0,187,221,.2)'
//     ]
//   });
// };