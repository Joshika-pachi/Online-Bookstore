# 📚 Online E-Bookstore

An online bookstore web application that allows users to browse books, view book details, create an account, add books to a shopping cart, and place orders.

The project is built using **PHP, MySQL, HTML, CSS, JavaScript, and Bootstrap** and uses a relational database to manage books, users, publishers, customers, and orders.

---

## 🌐 Live Demo

🔗 **Live Website:**  
https://onlinebookstore-joshika.kesug.com/

---

## 📌 Features

### 👤 User Management
- User registration / Sign Up
- User Login
- Username and email validation
- Session and cookie-based user handling
- Profile picture support

### 📖 Book Management
- Display latest books
- Browse available books
- View individual book details
- View book title, author, description, price, and publisher information
- Search/browse books by available categories

### 🛒 Shopping Cart
- Add books to cart
- View cart items
- Manage selected books
- Calculate total price

### 📦 Order Management
- Collect customer information
- Create orders
- Store order details in the database
- Calculate order totals
- Store shipping information

### 🏢 Publisher Management
- Display publisher information
- Associate books with publishers

### 🗄️ Database Management
The application uses MySQL to store and manage:
- Users
- Books
- Authors
- Categories
- Publishers
- Customers
- Orders
- Cart/order-related information

---

## 🛠️ Technologies Used

| Technology | Purpose |
|------------|---------|
| PHP | Server-side application logic |
| MySQL | Database management |
| HTML5 | Page structure |
| CSS3 | Styling |
| JavaScript | Client-side validation and interaction |
| Bootstrap | Responsive UI components |
| phpMyAdmin | Database administration |
| InfinityFree | Web hosting |
| Git/GitHub | Version control |

---

## 🏗️ Project Architecture

The project follows a simple server-side web application architecture.

```text
User
 │
 ▼
Web Browser
 │
 ▼
PHP Application
 │
 ├── Authentication
 │
 ├── Book Management
 │
 ├── Shopping Cart
 │
 ├── Order Processing
 │
 └── Publisher / Customer Management
 │
 ▼
MySQL Database
