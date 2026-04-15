const qualityReturn = document.getElementById('qualityReturn');
const damagedField = document.getElementById('damaged-note');
const requeired = document.querySelector('textarea');

        qualityReturn.addEventListener('change', () => {
            if (qualityReturn.options[qualityReturn.selectedIndex].text === 'Damaged') {
                damagedField.classList.remove('hidden');
                requeired.setAttribute('required');
            } else {
                damagedField.classList.add('hidden');
                requeired.removeAttribute('required');
            }
        });