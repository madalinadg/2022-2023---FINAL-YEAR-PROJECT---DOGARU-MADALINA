const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');

allDropdown.forEach(item=> {
    const a = item.parentElement.querySelector('a:first-child');
    a.addEventListener('click', function (e) {
        e.preventDefault();

        if(!this.classList.contains('active')) {
            allDropdown.forEach(i=> {
                const aLink = i.parentElement.querySelector('a:first-child');

                aLink.classList.remove('active');
                i.classList.remove('show');
            })
        }

        this.classList.toggle('active');
        item.classList.toggle('show');
    })
})


//textarea

document.addEventListener("DOMContentLoaded", function() {
  // Identificatorul unic al fiecărei pagini
  const pageId = document.body.id;

  // Elementele specifice paginii curente
  const customText = document.getElementById(`custom-text-${pageId}`);
  const saveButton = document.querySelector(`#${pageId} .save-button`);
  const deleteButton = document.querySelector(`#${pageId} .delete-button`);
  const savedText = document.querySelector(`#${pageId} .saved-text`);

  // Verifică dacă există text salvat în memoria locală și îl afișează
  if (localStorage.getItem(`savedText-${pageId}`)) {
    savedText.textContent = localStorage.getItem(`savedText-${pageId}`);
  }

  // Ascultă evenimentul de click pe butonul "Salvează"
  saveButton.addEventListener("click", function() {
    const text = customText.value;
    savedText.textContent = text;
    localStorage.setItem(`savedText-${pageId}`, text);
  });

  // Ascultă evenimentul de click pe butonul "Șterge"
  deleteButton.addEventListener("click", function() {
    savedText.textContent = "";
    localStorage.removeItem(`savedText-${pageId}`);
  });
});

//pdf

  