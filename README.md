# Hospital Management System

A comprehensive hospital management system built with Laravel 12.

## Features

- Patient registration and management
- Doctor and staff management
- Appointment scheduling
- Medical records tracking
- Billing and payment processing
- Inventory management
- Reporting and analytics

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL/PostgreSQL
- Node.js and npm

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd hospital_sys_lara_12
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Configure environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Set up database:
```bash
php artisan migrate
php artisan db:seed
```

5. Build assets:
```bash
npm run build
```

## Usage

Start the development server:
```bash
php artisan serve
```

Visit `http://localhost:8000` to access the application.

## Contributing

Please read the contributing guidelines before submitting pull requests.

## License

This project is licensed under the MIT License.
