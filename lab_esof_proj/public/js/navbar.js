var item = document.querySelector('grid-item item5');

var btnContainer = item.querySelector('ul-container');

console.log("123",item);
console.log("1235");

var btns = btnContainer.querySelectorAll('btn');

for (let i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click', function(){
        var current = document.querySelector('active');
        if (current) {
            current.classList.remove('active');
        }
        this.className += ' active';
    });
}