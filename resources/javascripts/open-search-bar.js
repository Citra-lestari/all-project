document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('Search')
  const dropdown = document.getElementById('Item')
  const items = document.querySelectorAll('.item-option')
  const qualityInput = document.getElementById('QualityInput')
  const manageIdInput = document.getElementById('manage_id')

  searchInput.addEventListener('focus', () => {
    dropdown.classList.remove('hidden')
  })

  searchInput.addEventListener('input', () => {
    const value = searchInput.value.toLowerCase()
    items.forEach(item => {
      item.style.display = item.textContent.toLowerCase().includes(value)
        ? 'flex'
        : 'none'
    })
  })

  items.forEach(item => {
    item.addEventListener('click', () => {
      searchInput.value = item.dataset.name
      qualityInput.value = item.dataset.quality
      manageIdInput.value = item.dataset.id
      dropdown.classList.add('hidden')
    })
  })

  document.addEventListener('click', e => {
    if (!searchInput.contains(e.target) && !dropdown.contains(e.target)) {
      dropdown.classList.add('hidden')
    }
  })
})
