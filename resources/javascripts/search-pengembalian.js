document.addEventListener('DOMContentLoaded', () => {

  const searchInput = document.getElementById('Search');
  const dropdown = document.getElementById('Item');
  const items = document.querySelectorAll('.item-option');

  const studentName = document.getElementById('student-name');
  const studentNis = document.getElementById('student-nis');
  const productName = document.getElementById('product-name');
  const phoneNumber = document.getElementById('phone-number');
  const loanCreate = document.getElementById('loan-create');
  const qualityLoan = document.getElementById('quality-loan');
  const loanItemId = document.getElementById('loan-item-id');
    const qualityLoanId = document.getElementById('quality-loan-id');
  const detailSection = document.getElementById('detail-section');
    const qualityReturn = document.getElementById('quality-return');
    const damagedField = document.getElementById('damaged-note');


  // Show dropdown saat focus
  searchInput.addEventListener('focus', () => {
    dropdown.classList.remove('hidden');
  });

  // Filter search
  searchInput.addEventListener('input', () => {
    const value = searchInput.value.toLowerCase();

    items.forEach(item => {
      const text = item.textContent.toLowerCase();
      item.style.display = text.includes(value) ? 'flex' : 'none';
    });
  });

  // Saat item diklik
  items.forEach(item => {
    item.addEventListener('click', () => {

        searchInput.value = item.dataset.productName + ' - ' + item.dataset.nis + ' - ' + item.dataset.studentName;
        
        productName.value = item.dataset.productName;
        qualityLoan.value = item.dataset.quality;
        loanItemId.value = item.dataset.productId;
        qualityLoanId.value = item.dataset.qualityId;
        loanCreate.value = item.dataset.loanCreate;
        studentName.value = item.dataset.studentName;
        studentNis.value = item.dataset.nis;
        phoneNumber.value = item.dataset.phone;

      dropdown.classList.add('hidden');

        detailSection.classList.remove('hidden');
    });
  });


  // Klik di luar dropdown
    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target) && e.target !== searchInput) {
            dropdown.classList.add('hidden');
        }
    });

    // Tampilkan field note jika kualitas return "Damaged"
    qualityReturn.addEventListener('change', () => {
        if (qualityReturn.options[qualityReturn.selectedIndex].text === 'Damaged') {
            damagedField.classList.remove('hidden');
        } else {
            damagedField.classList.add('hidden');
        }
    });

});



