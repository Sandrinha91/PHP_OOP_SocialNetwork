const boxOne = document.querySelector('.click1');
const boxTwo = document.querySelector('.click2');

const login = document.querySelector('.login');
const register = document.querySelector('.register');

const close = document.querySelector('.x');
const close1 = document.querySelector('.x1');


// opening login
boxOne.addEventListener( 'click', () =>{
    if(login.style.display = 'block')
    {
        register.style.display = 'none';

    }
});

// closing login
close.addEventListener( 'click', () =>{
    login.style.display = 'none';
});

// opening register
boxTwo.addEventListener( 'click', () =>{
    if(register.style.display = 'block')
    {
        login.style.display = 'none';
    }
});

// closing register
close1.addEventListener( 'click', () =>{
    register.style.display = 'none';
});

if (login.style.display = 'block') {
    login.style.display = 'none';
    register.style.display = 'none';
}


