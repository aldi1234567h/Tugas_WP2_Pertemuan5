<?php

// Kelas Book merepresentasikan objek buku
class Book {
    // Atribut-atribut buku
    private $title;
    private $author;
    private $year;
    private $status;

    // Konstruktor untuk inisialisasi atribaut
    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->status = "Available"; // Status awal adalah tersedia
    }

    // Getter untuk mendapatkan judul buku
    public function getTitle() {
        return $this->title;
    }

    // Getter untuk mendapatkan status pinjam buku
    public function getStatus() {
        return $this->status;
    }

    // Method untuk meminjam buku
    public function borrowBook() {
        if ($this->status == "Available") {
            $this->status = "Borrowed";
            echo "Book '{$this->title}' has been borrowed.\n";
        } else {
            echo "Book '{$this->title}' is not available for borrowing.\n";
        }
    }

    // Method untuk mengembalikan buku
    public function returnBook() {
        $this->status = "Available";
        echo "Book '{$this->title}' has been returned.\n";
    }
}

// Kelas Library merepresentasikan objek perpustakaan
class Library {
    // Properti koleksi buku
    private static $books = [];

    // Method untuk menambahkan buku baru ke perpustakaan
    public static function addBook($book) {
        self::$books[] = $book;
        echo "Book '{$book->getTitle()}' has been added to the library.\n";
    }

    // Method untuk mencetak daftar buku yang tersedia
    public static function printAvailableBooks() {
        echo "Available Books:\n";
        foreach (self::$books as $book) {
            if ($book->getStatus() == "Available") {
                echo "- {$book->getTitle()}\n";
            }
        }
    }
}

// Membuat objek buku
$book1 = new Book("Harry Potter and the Philosopher's Stone", "J.K. Rowling", 1997);
$book2 = new Book("To Kill a Mockingbird", "Harper Lee", 1960);

// Menambahkan buku ke perpustakaan
Library::addBook($book1);
Library::addBook($book2);

// Meminjam buku
$book1->borrowBook();
$book2->borrowBook();

// Mencetak daftar buku yang tersedia
Library::printAvailableBooks();

// Mengembalikan buku
$book1->returnBook();

// Mencetak daftar buku yang tersedia setelah pengembalian
Library::printAvailableBooks();

?>