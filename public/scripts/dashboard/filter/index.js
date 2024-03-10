var filterElement = document.querySelector('.filter');
var notes = document.querySelectorAll('.notes .note');

filterElement.addEventListener('input', filterNotes);

function filterNotes() {
    var filterValue = filterElement.value.toLowerCase();

    if (filterValue !== '') {
        for (var note of notes) {

            var titleElement = note.querySelector('.description');
            var title = titleElement.textContent.toLowerCase();

            var filterText = filterValue;

            if (!title.includes(filterText)) {
                note.style.display = "none";
            } else {
                note.style.display = "block";
            }
        }
    } else {
        for (var note of notes) {
            note.style.display = "block";
        }
    }
}
