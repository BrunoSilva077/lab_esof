function closeCart(clickedElement) {
    clickedElement.parentElement.parentElement.classList.remove('active');
    clickedElement.parentElement.parentElement.style.position = 'fixed';
}

function openCart(clickedElement) {
    const carMenu = document.querySelector('.side-cart.cart')
    console.log(carMenu);
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
    Menu.classList.add('active')
    Menu.style.position = 'absolute';
}
function addProduct2(rowId) {
    // const quantidade = document.querySelector('.quantidade.menu.cart .numero');
    // console.log(quantidade);
    // const quantidadeValue = parseInt(quantidade.value);
    // quantidade.value = quantidadeValue + 1;
    // console.log(quantidade);
    // document.getElementById('quantity_cart'+rowId).value = quantidade.value;
    const quantidade = document.getElementById('quantity_' + rowId);
    // if (quantidade) {
        const quantidadeValue = parseInt(quantidade.value);
        quantidade.value = quantidadeValue + 1;

        // Modifique o ID para incluir o rowId
        const quantityCart = document.getElementById('quantity_cart_' + rowId);
        // if (quantityCart) {
            quantityCart.value = quantidade.value;
        // }
    // }
}

function removeProduct2(rowId) {
    // const quantidade = document.querySelector('.quantidade.menu.cart .numero'+rowId );
    // const quantidadeValue = parseInt(quantidade.value);
    // if (quantidadeValue > 1) {
    //     quantidade.value = quantidadeValue - 1;
    //     document.getElementById('quantity_cart'+rowId).value = quantidade.value;
    // }
        // Modifique o seletor para usar o ID diretamente
        const quantidade = document.getElementById('quantity_' + rowId);

        if (quantidade) {
            const quantidadeValue = parseInt(quantidade.value);
    
            if (quantidadeValue > 1) {
                quantidade.value = quantidadeValue - 1;
    
                // Modifique o ID para incluir o rowId
                const quantityCart = document.getElementById('quantity_cart_' + rowId);
                if (quantityCart) {
                    quantityCart.value = quantidade.value;
                }
            }
        }
}
