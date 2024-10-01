document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const booksContainer = document.getElementById('books');

    // Sample book data
    const books = [
        { id: 1, title: '1984', author: 'George Orwell' },
        { id: 2, title: 'To Kill a Mockingbird', author: 'Harper Lee' },
        { id: 3, title: 'The Great Gatsby', author: 'F. Scott Fitzgerald' }
    ];

    function displayBooks(books) {
        booksContainer.innerHTML = '';
        books.forEach(book => {
            const bookDiv = document.createElement('div');
            bookDiv.className = 'book';
            bookDiv.innerHTML = `<h3>${book.title}</h3><p>by ${book.author}</p><button onclick="viewDetails(${book.id})">View Details</button>`;
            booksContainer.appendChild(bookDiv);
        });
    }

    function viewDetails(bookId) {
        alert(`Viewing details for book ID: ${bookId}`);
        // Here you would typically redirect to a details page
    }

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.toLowerCase();
        const filteredBooks = books.filter(book => book.title.toLowerCase().includes(query));
        displayBooks(filteredBooks);
    });

    displayBooks(books);
});
