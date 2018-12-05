@echo off
cd /d "c:\php\pasport_products\"
php artisan schedule:run >> NUL 2>&1
