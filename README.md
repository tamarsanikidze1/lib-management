# Library Management System

This is a Library Management System built with Laravel. The system allows administrators to manage books and authors in a library. The system supports viewing, adding, editing, and deleting books and authors. Additionally, it supports searching and filtering books by title and author.

## Features

-   View the list of books available in the library.
-   Add new books with multiple authors.
-   Edit book details.
-   Delete books.
-   View the list of authors.
-   Prevent duplicate authors.
-   Search and filter books by title and author.
-   Books can have statuses: Available or Checked Out.

### Viewing Books

Navigate to the `/books` route to see the list of all books available in the library. You can search and filter books by their title and author.

### Adding a Book

Navigate to the `/books/create` route to add a new book. Fill in the required fields including title, year of publication, status, and select one or multiple authors.

### Editing a Book

Navigate to the `/books/{id}/edit` route to edit the details of a book.

### Deleting a Book

Navigate to the `/books` route, and use the delete button next to a book to remove it from the library. Authors associated with other books will not be deleted.

### Viewing Authors

Navigate to the `/authors` route to see the list of all authors. You can see the books associated with each author.

### Adding an Author

Navigate to the `/authors/create` route to add a new author. The system prevents adding duplicate authors by validating the uniqueness of the author's name.

## Database Design

### Bridge Table

I use a bridge (pivot) table to manage the many-to-many relationship between books and authors. This allows a book to have multiple authors and an author to write multiple books.

The `author_book` table has two columns: `author_id` and `book_id`, which store the associations between authors and books.

### Removing Duplicates

To prevent duplicate authors, I have added a unique constraint on the `name` column in the `authors` table. This is enforced both at the database level and in the `AuthorController` using validation logic.

### Code Explanation

-   **Routes**: Defined in `routes/web.php`. I use resource controllers for both books and authors.
-   **Controllers**:
    -   `BookController`: Handles displaying, creating, editing, and deleting books. Includes search and filter functionality.
    -   `AuthorController`: Handles displaying and creating authors. Prevents duplicate entries.
-   **Views**: Blade templates are used for the frontend.
    -   `books/index.blade.php`: Displays the list of books with search functionality.
    -   `books/create.blade.php`: Form for adding a new book with multiple authors.
    -   `authors/index.blade.php`: Displays the list of authors.
    -   `authors/create.blade.php`: Form for adding a new author.
