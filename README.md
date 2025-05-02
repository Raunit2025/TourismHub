# TourismHub

[![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)](https://laravel.com)  
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)  
[![Build](https://img.shields.io/badge/build-passing-brightgreen.svg)](#)

TourismHub is a Laravel-based Tourism Marketplace Platform that connects travelers with local hotels, guides, transport services, and tour packages. Our goal is to simplify travel planning by offering tourists a one-stop platform to book accommodations, guides, transport, and tours.

## Features

- ✅ User Registration and Login
- ✅ Browse and Book Hotels
- ✅ Connect with Local Guides
- ✅ Reserve Transport Services
- ✅ Explore Tour Packages
- ✅ Secure Payment Integration *(coming soon)*

## Tech Stack

- **Backend**: Laravel 11
- **Database**: MySQL
- **Frontend**: Blade, Bootstrap *(or Tailwind, if used — update this)*
- **Others**: RESTful APIs, Laravel Eloquent ORM

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/Raunit2025/TourismHub.git
    cd TourismHub
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install && npm run dev
    ```

3. Create `.env` file:

    ```bash
    cp .env.example .env
    ```

4. Generate app key:

    ```bash
    php artisan key:generate
    ```

5. Configure your `.env` file (DB, Mail, etc.)

6. Run migrations:

    ```bash
    php artisan migrate
    ```

7. Start the local server:

    ```bash
    php artisan serve
    ```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

[MIT](LICENSE)

## Author

**Raunit Raj** — [LinkedIn](https://www.linkedin.com/in/raunitraj/)  
Computer Science & Engineering student, Lovely Professional University
