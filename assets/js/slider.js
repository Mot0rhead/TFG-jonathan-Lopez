(function(){
    
    const sliders = [...document.querySelectorAll('.testimony__body')];
    const buttonNext = document.getElementsByClassName('testimony__arrow')[1];
    const buttonBefore = document.getElementsByClassName('testimony__arrow')[0];
    let value;   

    buttonNext.addEventListener('click', ()=>{
        changePosition(1);
    });
debugger;
    buttonBefore.addEventListener('click', ()=>{
        changePosition(-1);
    });

    const changePosition = (add)=>{
        const currentTestimony = document.querySelector('.testimony__body--show').dataset.id;
        value = Number(currentTestimony);
        value+= add;


        sliders[Number(currentTestimony)-1].classList.remove('testimony__body--show');
        if(value === sliders.length+1 || value === 0){
            value = value === 0 ? sliders.length  : 1;
        }

        sliders[value-1].classList.add('testimony__body--show');

    }

})();