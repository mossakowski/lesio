(function () {

    'use strict';

    const arrayEvents = ['click', 'keyup'];
    
    function addAnimation() {
        
        var patrickAnimate = document.getElementsByClassName('patrick');
        var naszMistrzImg = document.getElementById('nasz-mistrz');

        for (let i = 0; i < patrickAnimate.length; i++) {
            console.log(i);
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
        for (let i = 0; i < setLocalizationOnu.length; i++) {
            for (let j = 0; j < arrayEvents.length; j++) {
                setLocalizationOnu[i].addEventListener(arrayEvents[j], function () {
                    let getCardPon = document.getElementById('getCardPon').elements;
                    let card_number = getCardPon[0].value;
                    let pon_number = getCardPon[1].value;
                    let commend = 'show onu all-status epon-olt_0/' + card_number + '/' + pon_number;
                    let btn = document.getElementById('button-search-free-space');
                    btn.setAttribute('data-clipboard-text', commend);

                });
            }
        }
    }
    
    function removeOnu() {
        var btn = document.getElementById('button-remove-onu');
        var form = document.getElementById('deleteOnu').elements;
        for(let i=0; i < arrayEvents.length; i++) {
            form[0].addEventListener(arrayEvents[i], function() {
               let onuId = form[0].value;
                let commend = 'no onu ' + onuId;
                btn.setAttribute('data-clipboard-text',commend);
            });
        }
        
    }

    addAnimation();
    updateOltPon();
    removeOnu();
})();
