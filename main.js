(function () {

    'use strict';

    function addAnimation() {

        var patrickAnimate = document.getElementsByClassName('patrick');
        var naszMistrzImg = document.getElementById('nasz-mistrz');

        for (let i = 0; i < patrickAnimate.length; i++) {
            patrickAnimate[i].addEventListener('click', function () {
                naszMistrzImg.classList.add('shake');
                setTimeout(function () {
                    naszMistrzImg.classList.remove('shake');
                }, 1000);
            });
        }
    }

    function updateOltPon() {

        console.log(getCardPon);
        var setLocalizationOnu = document.getElementsByClassName('setLocalizationOnu');
        var tab = ['click', 'keyup'];
        for (let i = 0; i < setLocalizationOnu.length; i++) {
            for (let j = 0; j < tab.length; j++) {
                setLocalizationOnu[i].addEventListener(tab[j], function () {
                    let getCardPon = document.getElementById('getCardPon').elements;
                    let card_number = getCardPon[0].value;
                    let pon_number = getCardPon[1].value;
                    var commend = 'show onu all-status epon-olt_0/' + card_number + '/' + pon_number;
                    var btn = document.getElementById('button-search-free-space');
                    btn.setAttribute('data-clipboard-text', commend);

                });
            }
        }

    }

    addAnimation();
    updateOltPon();
})();
