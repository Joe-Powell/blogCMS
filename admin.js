console.log('working')

function validateForm(e) {
    // e.preventDefault();
    console.log('clicked')
    let title = document.getElementById('title');
    let upload1 = document.getElementById('upload1');
    let upload2 = document.getElementById('upload2');
    let readmore = document.getElementById('readmore');
    let msg = document.getElementById('msg');




    if (upload2.value == '' || readmore.value == '' || title.value == '') {
        e.preventDefault();
        msg.innerHTML = 'Please fill out all fields of the form'


    }




}

const submitForm = document.querySelector('.submitForm');

submitForm.addEventListener('click', validateForm)