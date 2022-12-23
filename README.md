# serberus
NRP 
220116867 - Anderson Soegiharto
220116870 - Daniel Gamaliel Saputra
220116876 - Ivan Linhart Jayapranata
220116890 - Mikhael Chris

1) Setup
- setting DB_DATABASE di .env
- copy code dibawah di env
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=info.serberus@gmail.com
MAIL_PASSWORD=yctjrdnngflyqrmc
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info.serberus@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
HERE_API_KEY=zfq75h81VmgMqBa9vpjkbhm27G8VKur9tPN19e1jNUg
- run php artisan migrate:fresh --seed
- run php artisan storage:link
 
2) Run
- run npm run dev pada 1 terminal
- run php artisan serve pada terminal lainya

3) Catatan 
- akun admin
email : anderson@gmail.com
password : 123
