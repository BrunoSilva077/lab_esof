function closeCart(clickedElement) {
    clickedElement.parentElement.parentElement.classList.remove('active');
    clickedElement.parentElement.parentElement.style.position = 'fixed';
}

function openCart(clickedElement) {
    const carMenu = document.querySelector('.side-cart.cart')
    carMenu.classList.add('active')
    carMenu.style.position = 'absolute';
}

function openMenu(clickedElement){

    const windowWidth = window.innerWidth;

    const resolutionsToDisplayBlock = [
        { min: 320, max: 374 },
        { min: 375, max: 424 },
        { min: 425, max: 767 },
    ];
    const shouldDisplayBlock = resolutionsToDisplayBlock.some(resolution => {
        return windowWidth >= resolution.min && windowWidth <= resolution.max;
    });

    if(shouldDisplayBlock){
        openResponsiveMenu(clickedElement)
    }else{
        const Menu = document.querySelector('.side-cart.menu');
    Menu.classList.add('active')
    Menu.style.position = 'absolute';
    }
}

function openResponsiveMenu(clickedElement){
    const Menu = document.querySelector('.side-cart.responsive-menu');
    console.log("asdad",Menu);
    Menu.classList.add('active')
    Menu.style.position = 'absolute';
}