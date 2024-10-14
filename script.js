document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const booksContainer = document.getElementById('books');

    // Fetch books from the server (vulnerable to SQL injection)
    fetch('get_books.php')
        .then(response => response.json())
        .then(books => displayBooks(books));

    searchInput.addEventListener('input', function() {
        const query = searchInput.value;
        fetch(`get_books.php?search=${query}`)
            .then(response => response.json())
            .then(books => displayBooks(books));
    });

    function displayBooks(books) {
        booksContainer.innerHTML = '';
        books.forEach(book => {
            const bookDiv = document.createElement('div');
            bookDiv.className = 'book';
            // XSS vulnerability when rendering book title
            bookDiv.innerHTML = `<h3>${book.title}</h3><p>by ${book.author}</p>
                <button onclick="window.location.href='book_details.php?id=${book.id}'">View Details</button>`;
            booksContainer.appendChild(bookDiv);
        });
    }
});
