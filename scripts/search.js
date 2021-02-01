'use strict';

const searchBtn = document.querySelector('.search-btn');
const inputSearch = document.querySelector('#productName');
const insertDataMsg = document.querySelector('.alert-danger');

const onlyNumbers = function (el) {
    return el.value.replace(/\D/g, ''); // REGEX FOR NON DIGIT VALUE
};


searchBtn.addEventListener('click', function (e) {
    e.preventDefault();

    if (!inputSearch.value) {
        inputSearch.classList.add('is-invalid');
        insertDataMsg.classList.remove('hidden');
        console.log('Empty!!');
    } else {
        console.log(e.target);
        document.querySelector('#searchProducts').submit();

    }

});

inputSearch.addEventListener('keydown', function () {
    // console.log(e);
    inputSearch.classList.remove('is-invalid');
    insertDataMsg.classList.add('hidden');

});

// ONLY ACCEPTS NUMBERS
document.querySelectorAll('.price').forEach(el => el.addEventListener('keyup', function (e) {
    e.target.value = onlyNumbers(e.target);
    // console.log('Just checking');
})
);
