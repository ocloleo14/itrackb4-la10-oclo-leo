# ITRACKB4 - Laboratory Activity 11

## Book Collection

This project is a simple Laravel application about books. It allows users to view, add, edit, update, and delete books. It also includes book details, a featured book, and filters for book genres and authors.

## Features

- View all books.
- View individual book details.
- Add a new book.
- Edit and update existing books.
- Delete books with a confirmation message.
- Filter books by genre and author.
- View a featured book.

## Routes

- `GET /books` - displays all books.
- `GET /books/create` - displays the form for adding a book.
- `POST /books` - validates and saves a new book.
- `GET /books/{book}` - displays the details of a book.
- `GET /books/{book}/edit` - displays the edit form.
- `PUT /books/{book}` - validates and updates a book.
- `DELETE /books/{book}` - deletes a book.
- `/books/featured` - displays the featured book.

## Questions

### 1. Route Model Binding

Route Model Binding needs the route parameter name to match the model variable name and the controller method to type-hint the corresponding model. If only one of these is correct, Laravel cannot properly perform implicit model binding, and the expected Book model may not be resolved.

### 2. Why does clicking Delete as a link open the detail page instead of deleting the book?

An ordinary link sends a GET request, which matches the route for showing a book's details. The destroy route requires a DELETE request, so a form with `@csrf` and `@method('DELETE')` is needed to delete the record.

### 3. What happens if the second argument of `old()` is omitted, or if only the second argument is used?

The second argument of `old()` provides the existing book value when there is no previously submitted input. If it is omitted, the edit form may appear blank when first opened. If only the second argument is used without `old()`, previously entered values will not be restored after validation fails.

## How to Run

1. Open the project folder in the terminal.
2. Run `php artisan serve`.
3. Open the local Laravel URL in a browser.
4. Visit `/books` to view the book collection.

## Author

Rosalio Oclo