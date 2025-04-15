# 🛠️ Project Setup & Migration

Follow the steps below to properly set up the database and seed initial data for your Laravel project  FOR ADMIN PART .

## 1. Clone the Repository

```bash
git clone https://github.com/Demenkesh/courierplusassessmentadmin.git
```

```bash
cd your-repo-name
```

## 2. Php verdion

Use the latest php Version 8.3 upper

## 3. Install Dependencies

```bash
composer update
```

```bash
composer dump-autoload
```

## 4. Set Up Environment Configuration

Copy the .env.example file and update the necessary environment variables:, Please the env will be the same with the  
```bash
https://github.com/Demenkesh/courierplusassessment/blob/main/.env.example
```

```bash
cp .env.example .env
```

Then generate the application key:

```bash
php artisan key:generate
```

Update your .env file with your database and other environment-specific configurations.

## 5. Run Migrations

```bash
php artisan migrate
```


## 6. View the Login page

Replace {{your-app-url}} with your actual domain or local environment URL (e.g., http://localhost:8000/login).
To access the api of the project.

## 7. Login details
'email' => 'bigture123@example.com',
'password' => courierplus123123123@@@,
